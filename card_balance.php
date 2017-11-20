<?php
include "system/header.php";

header("Content-Type: text/json;");


$cardNum = $_GET['card'];
$query =  "SELECT * FROM Breezecard WHERE BreezecardNum = '{$cardNum}'";
$result = mysqli_query($database, $query) or die( mysql_error());
$cardData = fetch($result, true);

echo json_encode($cardData)

?>