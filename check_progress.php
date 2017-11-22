<?php
include "system/header.php";

header("Content-Type: text/json;");

function resultToArray($result) {
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

$cardno = $_GET['cardno'];
$query = "SELECT S.StopID, S.Name, T.EndsAt FROM Trip AS T, Station AS S WHERE T.BreezecardNum = '{$cardno}' AND EndsAt IS NULL AND StartsAt = S.StopID";
$result = mysqli_query($database, $query) or die(mysqli_error($database));
$tripData = fetch($result, true);
echo json_encode($tripData)
?>