<?php

$host = "localhost";
$user = "coffeeUser";
$pass = "15oBay70G2Io6MFl";
$db = "coffeeUser";

$conn = mysqli_connect($host,$user,$pass,$db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
