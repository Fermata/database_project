<?php
include "system/header.php";

header("Content-Type: text/json;");


$stopid = $_GET['stopid'];
$fare = $_GET['fare'];
$query =  "UPDATE Station SET EnterFare = '{$fare}' WHERE StopID = '{$stopid}';";
$database->query($query) or die(mysqli_error($database));
$cardData = fetch($result, true);

echo json_encode($cardData)
?>