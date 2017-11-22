<?php
include "system/header.php";

header("Content-Type: text/json;");


$name = $_GET['name'];
$id = $_GET['id'];
$fare = $_GET['fare'];
$istrain = $_GET['istrain'];
$intersection = $_GET['intersection'];
$status = $_GET['status'];
if($istrain === '1'){
    $sql = "INSERT INTO Station VALUES ('{$id}','{$name}','{$fare}','{$status}','{$istrain}')";
    echo $sql;
    $database->query($sql) or die(mysqli_error($database));
}else{
    $sql = "INSERT INTO Station VALUES ('{$id}','{$name}','{$fare}','{$status}','{$istrain}');";
    $sql .= "INSERT INTO BusStationIntersection VALUES ('{$id}','{$intersection}');";
    echo $sql;
    
    $database->multi_query($sql) or die(mysqli_error($database));
}
?>