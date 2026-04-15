<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "aifest2026";

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>