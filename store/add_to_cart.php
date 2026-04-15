<?php
session_start();
include('../config/db.php');

$user_id = $_SESSION['user_id'];

$name = $_POST['name'];
$img = $_POST['img'];

$sql = "INSERT INTO cart (user_id, product_name, product_image)
        VALUES ('$user_id', '$name', '$img')";

$conn->query($sql);

echo "ok";
?>