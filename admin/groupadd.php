<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 8/8/2017
 * Time: 4:56 PM
 */
$group = $_POST["group"];

require '../db/db.php';
try {
    $result = $conn->exec("insert into Support_Link_Groups(Group_Name) 
     values ( '".$group ."');");
    echo $result;
}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>