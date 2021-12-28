<?php session_start();
$servername = "localhost";
$username = "root";
$password = '';
$con=null;
try {
  $con = new PDO("mysql:host=$servername; port=3306; dbname=shopping", $username, $password);
  // set the PDO error mode to exception
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// Create connection
$conn = new mysqli($servername, $username, $password, 'shopping');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
}


?> 