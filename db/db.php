<?php
$servername = "35.192.94.21";
$username = "homepage";
$password = "hy9$@AKd88n@8";

// Create connection
$conn = new pdo('mysql:unix_socket=/cloudsql/homepagematt:us-central1:homepage;dbname=homepage',
  $username,  // username
  $password       // password
  );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>