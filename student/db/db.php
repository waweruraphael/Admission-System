<?php

$hostname     = "localhost"; // Enter Your Host Name
$username     = "root";      // Enter Your Table username
$password     = "1234567890";          // Enter Your Table Password
$databasename = "admissions"; // Enter Your database Name
$conn = new mysqli($hostname, $username, $password, $databasename);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>