<?php
include "system/header.php";

header("Content-Type: text/json;");


$stopid = $_GET['stopid'];
$checked = $_GET['checked'];
$query =  "UPDATE Station SET ClosedStatus = '{$checked}' WHERE StopID = '{$stopid}';";
mysqli_query($database, $query);

?>