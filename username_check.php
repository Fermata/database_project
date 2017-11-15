<?php
include_once 'system/header.php';

if (isset($_POST['username'])){
    $username = mysqli_real_escape_string($database,$_POST['username']);
    if ($database->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $result = mysqli_query($database,"SELECT * FROM user WHERE username = '{$username}'");
    if(mysqli_num_rows($result) === 0) {
        echo "Username doesn't exist";
        exit;
    }else{
        echo "Username already exists";
        exit;
    }
}
?>
