<?php
session_start();
include('../config/db.php');

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM cart WHERE user_id='$user_id'";
$res = $conn->query($sql);

echo "<div class='cart-box'>";
echo "<h2>Your Cart</h2>";

while($row = $res->fetch_assoc()){

    echo "<div style='display:flex;align-items:center;gap:10px'>";
    echo "<img src='../assets/images/products/".$row['product_image']."' width='50'>";
    echo "<p>".$row['product_name']."</p>";
    echo "</div><hr>";
}

echo "</div>";
?>