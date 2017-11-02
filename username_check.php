<?php
include_once 'system/header.php';

if (isset($_POST['username'])){
    $username = mysqli_real_escape_string($database,$_POST['username']);

    if (!empty($username)){
        $username_query = mysqli_query($database,"SELECT * FROM user WHERE username = '{$username}'");
        $count=mysqli_num_rows($username_query);
        if($count == 0){
            echo "Username doesn't exist";
            exit;
        }else{
            echo "Username already exists";
            exit;
        }
    }
}

?>
