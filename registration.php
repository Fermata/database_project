<?php
include "system/header.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $email = $_POST['email'];
    $cardno = $_POST['bcardno'];

    //PHP에서 유효성 재확인
    //아이디 중복검사.
    $sql = "SELECT * FROM user WHERE username = '{$username}'";
    $res = $database->query($sql);
    if($res->num_rows >= 1){
        echo '이미 존재하는 아이디가 있습니다.';
        exit;
    }
    $sql = "SELECT * FROM PASSENGER WHERE email = '{$email}'";
    $res = $database->query($sql);
    if($res->num_rows >= 1){
        echo '이미 존재하는 이메일이 있습니다.';
        exit;
    }
    $sql = "SELECT * FROM Breezecard WHERE Bnumber = '{$cardno}'";
    $res = $database->query($sql);
    if($res->num_rows >= 1){
        echo '이미 존재하는 카드입니다.';
        exit;
    }

    //비밀번호 일치하는지 확인
    if($password !== $confirmpassword){
        echo '비밀번호가 일치하지 않습니다.';
        exit;
    }else{
        //비밀번호를 암호화 처리.
        $password = password($password);;
    }

    //이메일 주소가 올바른지
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if($email != true){
        echo "올바른 이메일 주소가 아닙니다.";
        exit;
    }

    //이제부터 넣기 시작
    $sql = "INSERT INTO user VALUES('{$username}','{$password}',0,1);";
    $sql .= "INSERT INTO passenger VALUES('{$username}','{$email}');";
    $sql .= "INSERT INTO breezecard VALUES('{$cardno}',0,'{$username}');";

    if($database->multi_query($sql)){
        location("/authentication");
    }
?>
