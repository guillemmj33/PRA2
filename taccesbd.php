<?php

//creem la connexió a la nostra base de dades
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "PRA2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully";
?>