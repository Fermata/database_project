<?php
include "system/header.php";

header("Content-Type: text/json;");


$stopid = $_GET['stopid'];
$cardno = $_GET['cardno'];
$sql="INSERT INTO Trip (BreezecardNum, StartsAt) SET ('{$cardno}','{$stopid}')";
$result = mysqli_query($database, $query) or die( mysql_error());
$cardData = fetch($result, true);

echo json_encode($cardData)

?>