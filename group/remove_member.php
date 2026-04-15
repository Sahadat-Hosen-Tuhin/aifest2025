<?php
include('../config/auth.php');
include('../config/db.php');

$id = $_GET['id'];

// soft delete (recommended)
$conn->query("UPDATE group_members SET status='removed' WHERE id='$id'");

header("Location: leader_panel.php");
?>