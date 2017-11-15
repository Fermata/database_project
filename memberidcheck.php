<?php
    include "system/header.php";
    $username = $_POST['$username'];
    $sql = "SELECT * FROM user WHERE username = '{$username}'";
    $res = $dbConnect->query($sql);
    if($res->num_rows >= 1){
        echo json_encode(array('res'=>'bad'));
    }else{
        echo json_encode(array('res'=>'good'));
    }
?>
