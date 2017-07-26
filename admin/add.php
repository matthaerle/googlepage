<?php
 $name = $_POST["name"];
 $url = $_POST["url"];
 $group = $_POST["group"];
 
 require '../db/db.php';
 try {
     $result = $conn->exec("insert into Tech_Support_Links(Link_Text,Link_URL,Group_ID) 
     values ( '".$name ."','".$url."',".$group");");
 } 
 catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
$conn = null;

?>