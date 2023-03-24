<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db = "macrame";

$conn = new mysqli($hostname, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>