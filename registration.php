<?php
    function randomNumber($length) {
	    $result = '';

	    for($i = 0; $i < $length; $i++) {
	        $result .= mt_rand(0, 9);
	    }

	    return $result;
    }
    
    function location ($location){
		header("Location: $location");
		exit();
	}
    $database = mysqli_connect('localhost','root','111111', 'cs4400_Group_112');

    $username = $_POST['username'];
    $password = $_POST['password'];
    if (strlen($password) < 8) {
        echo 'Password should have at least 8 characters';
        exit();
    }
    $confirmpassword = $_POST['confirmpassword'];
    $email = $_POST['email'];
    
    if ($database->connect_errno) {
        printf("Connect failed: %s\n", $database->connect_error);
        exit();
    }
    //PHP에서 유효성 재확인
    //아이디 중복검사.
    $sql = "SELECT * FROM User WHERE Username = '{$username}'";
    $row = mysqli_num_rows(mysqli_query($database,$sql));
    if($row >= 1){
        echo 'Username already exists.';
        exit();
    }
    $sql = "SELECT * FROM Passenger WHERE email = '{$email}'";
    $row = mysqli_num_rows(mysqli_query($database,$sql));
    if($row >= 1){
        echo 'Email already exists.';
        exit();
    }

    //비밀번호 일치하는지 확인
    if($password !== $confirmpassword){
        echo 'Passwords do not match';
        exit();
    }else{
        //비밀번호를 암호화 처리.
        $password = md5($password);
    }

    

    //이제부터 넣기 시작
    $sql = "INSERT INTO User VALUES('{$username}','{$password}',0);";
    $sql .= "INSERT INTO Passenger VALUES('{$username}','{$email}');";

    $database->multi_query($sql) or die(mysqli_error($database));
    while ($database->next_result()) {;}
    
    if (!empty($_POST['bcardno'])) {
        $cardno = $_POST['bcardno'];
        $sql = "SELECT * FROM Breezecard WHERE BreezecardNum = '{$cardno}' AND BelongsTo IS NOT NULL";
        $row = mysqli_num_rows(mysqli_query($database,$sql));
        $sql2 = "SELECT * FROM Breezecard WHERE BreezecardNum = '{$cardno}' AND BelongsTo IS NULL";
        $row2 = mysqli_num_rows(mysqli_query($database,$sql2));
        if($row >= 1){
            $database->query("INSERT INTO Conflict (Username, BreezecardNum) VALUES('{$username}','{$cardno}')");
            while ($database->query("INSERT INTO Breezecard VALUES('".randomNumber(16)."','0','{$username}')") === FALSE) {
            }
        }elseif($row2 >= 1){
            $database->query("UPDATE Breezecard SET BelongsTo = '{$username}' WHERE BreezecardNum='{$cardno}'");
            
        }
    } else {
        $cardno = randomNumber(16);
        
        $query = "INSERT INTO Breezecard VALUES('{$cardno}', 0,'{$username}')";
        if(mysqli_query($database, $query)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($database);
        }
        $sql = "SELECT * FROM Breezecard WHERE BelongsTo = '{$username}'";
        $row = mysqli_num_rows(mysqli_query($database,$sql));
        echo "<br>".$row;
        exit;        
    }

    location("/authentication");
?>
