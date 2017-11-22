<?php
include "system/header.php";

header("Content-Type: text/json;");


$cardno = $_GET['cardno'];
$value = $_GET['value'];
$sql = "SELECT * FROM Breezecard WHERE BreezecardNum = '{$cardno}'";
$result = $database->query($sql) or die(mysqli_error($database));
$cardData = fetch($result, true);
if(($cardData['Value'] + $value) > 1000){
$error = "The total value of the card cannot exceed $1000.00";
echo json_encode($error);
exit;
}
$value = $cardData['Value'] + $value;
$query =  "UPDATE Breezecard SET Value = '{$value}' WHERE BreezecardNum = '{$cardno}';";
$database->query($query) or die(mysqli_error($database));

?>