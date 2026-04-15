<?php
include('../config/auth.php');
include('../config/db.php');

$group_id = $_POST['group_id'];
$code = $_POST['code'];

// find user
$user = $conn->query("SELECT * FROM users WHERE participation_code='$code'");

if($user->num_rows == 1) {

    $u = $user->fetch_assoc();
    $user_id = $u['id'];

    // insert
    $conn->query("INSERT INTO group_members 
    (group_id, user_id, participation_code)
    VALUES ('$group_id', '$user_id', '$code')");

    echo "Member Added ✅";
    header("Location: leader_panel.php");

} else {
    echo "Invalid Code ❌";
}
?>