<?php
include_once 'system/header.php';

if (isset($_POST['email'])){
    $email = mysqli_real_escape_string($database,$_POST['email']);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if($email != true){
        echo "Invalid Email Format.";
        exit;
    }
    if (!empty($email)){
        $email_query = mysqli_query($database,"SELECT * FROM PASSENGER WHERE email = '{$email}'");
        $count=mysqli_num_rows($email_query);
        if($count == 0){
            echo "Email doesn't exist";
            exit;
        }else{
            echo "Email already exists";
            exit;
        }
    }
}

?>
