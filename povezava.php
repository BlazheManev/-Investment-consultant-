<?php
$dbServername = "localhost";
$dbUsername="blazhe";
$dbPassword ="blazhemanev";
$dbName ="dsr_proekt";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword,$dbName);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>