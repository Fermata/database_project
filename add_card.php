<?php
include "system/header.php";

header("Content-Type: text/json;");


$cardno = $_GET['cardno'];
$sql = "SELECT * FROM Breezecard WHERE BreezecardNum = '{$cardno}'";
$result = $database->query($sql);
if(mysqli_num_rows($result) >= 1){
    $cardData = fetch($result, true);
    echo $cardData['BelongsTo'];
    echo $_USER['Username'];
    $sql = "INSERT INTO Conflict (Username, BreezecardNum) VALUES ('{$_USER['Username']}','{$cardno}')";
    $database->query($sql) or die(mysqli_error($database));
}else{
    $sql = "INSERT INTO Breezecard VALUES ('{$cardno}',0,'{$_USER['Username']}')";
    $database->query($sql) or die(mysqli_error($database));
}

?>