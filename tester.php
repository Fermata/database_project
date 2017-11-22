<?php
include "system/header.php";
    $sql = "SELECT EndsAt From Trip WHERE BreezecardNum='9248324548250130'";
    $result = $database->query($sql);
    $row = mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);
    echo $num;
    echo "a".$row['EndsAt']."a";
    if($row['EndsAt'] == ""){
        echo "NULL";
    }
    echo "<br>".md5("Riyo4LIFE");
?>