<?php
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
    if (!empty($_POST['bcardno'])) {
        $cardno = $_POST['bcardno'];
    } else {
        $cardno = randomNumber(16);
        $sql = "SELECT * FROM Breezecard WHERE BreezecardNum = '{$cardno}'";
        $res = $database->query($sql);
        if($database->query($sql) === TRUE){
            $duplicate = TRUE;
            while ($duplicate === TRUE) {
                $cardno = randomNumber(16);
                if($database->query($sql) === TRUE){
                    $duplicate = TRUE;
                } else {
                    $duplicate = FALSE;
                }
            }
        }
    }
    if ($database->connect_errno) {
        printf("Connect failed: %s\n", $database->connect_error);
        exit();
    }
    //PHP에서 유효성 재확인
    //아이디 중복검사.
    $sql = "SELECT * FROM User WHERE Username = '{$username}'";
    if($database->query($sql) === TRUE){
        echo 'Username already exists.';
        exit();
    }
    $sql = "SELECT * FROM Passenger WHERE email = '{$email}'";
    if($database->query($sql) === TRUE){
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
    $sql = "SELECT * FROM Breezecard WHERE BreezecardNum = '{$cardno}' AND BelongsTo IS NOT NULL";
    $result = mysqli_query($database, $sql);
    if(mysqli_num_rows($result) >= 1){
        $duplicate = 1;
    }else{
        $duplicate = 0;        
    }

    //이제부터 넣기 시작
    $sql = "INSERT INTO User VALUES('{$username}','{$password}',0);";
    $sql .= "INSERT INTO Passenger VALUES('{$username}','{$email}');";
    if($duplicate === 1){
        $my_date = date("Y-m-d H:i:s");
        $sql .= "INSERT INTO Conflict VALUES('{$username}','{$cardno}','{$my_date}');";
    }else{
        $sql .= "INSERT INTO Breezecard (BreezecardNum, BelongsTo) VALUES('{$cardno}','{$username}');";
    }
    $database->multi_query($sql) or die(mysqli_error($database));
    location("/authentication");
?>
