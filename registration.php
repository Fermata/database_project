<?php
include "system/header.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    if (strlen($password) < 8) {
        echo 'Password should have at least 8 characters';
        exit;
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
    $sql = "SELECT * FROM user WHERE username = '{$username}'";
    $res = $database->query($sql);
    if($database->query($sql) === TRUE){
        echo 'Username already exists.';
        exit;
    }
    $sql = "SELECT * FROM PASSENGER WHERE email = '{$email}'";
    $res = $database->query($sql);
    if($database->query($sql) === TRUE){
        echo 'Email already exists.';
        exit;
    }

    //비밀번호 일치하는지 확인
    if($password !== $confirmpassword){
        echo 'Passwords do not match';
        exit;
    }else{
        //비밀번호를 암호화 처리.
        $password = password($password);
    }
    //이제부터 넣기 시작
    $sql = "INSERT INTO user VALUES('{$username}','{$password}',0);";
    $sql .= "INSERT INTO passenger VALUES('{$username}','{$email}');";
    $sql .= "INSERT INTO breezecard VALUES('{$cardno}',0,'{$username}');";

    if($database->multi_query($sql)){
        location("/authentication");
    }
?>
