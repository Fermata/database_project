<?php
include "system/header.php";

header("Content-Type: text/json;");


$username = $_GET['username'];
$cardNum = $_GET['cardno'];
$query =  "UPDATE Breezecard SET BelongsTo = '{$username}' WHERE BreezecardNum = '{$cardNum}';";
$query .= "DELETE FROM Conflict WHERE BreezecardNum = '{$cardNum}';";
$database->multi_query($query) or die(mysqli_error($database));
$cardData = fetch($result, true);

echo json_encode($cardData)
?>