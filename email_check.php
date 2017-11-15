<?php
include_once 'system/header.php';

if (isset($_POST['email'])){
    $email = mysqli_real_escape_string($database,$_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        echo("is a valid email address");
        exit;
    } else {
        echo("not a valid email address");
        exit;
    }
}

?>
