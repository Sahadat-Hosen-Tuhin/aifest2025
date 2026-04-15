<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>AI Fest 2026</title>
    <link rel="stylesheet" href="/Asmima-Project/FinalProject/aifest2026/assets/css/style.css">

</head>

<body>

<header>
    <div class="logo">
        <h2>AI Fest 2026</h2>
    </div>

    <nav>
        <!-- <a href="/aifest2026/index.php">Home</a> -->
        <a href="http://localhost/Asmima-Project/FinalProject/aifest2026/">Home</a>

        <a href="http://localhost/Asmima-Project/FinalProject/aifest2026/register.php">Register</a>
        <a href="http://localhost/Asmima-Project/FinalProject/aifest2026/login.php">Login</a>
        <a href="http://localhost/Asmima-Project/FinalProject/aifest2026/store/store.php">Store</a>
        <a href="http://localhost/Asmima-Project/FinalProject/aifest2026/events/view_events.php">Events</a>
        <a href="http://localhost/Asmima-Project/FinalProject/aifest2026/group/create_group.php">Groups</a>
        <a href="http://localhost/Asmima-Project/FinalProject/aifest2026/group/leader_login.php">Group Profile</a>
    </nav>

    <div class="auth">
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="/aifest2026/dashboard/user_dashboard.php">Dashboard</a>
            <a href="http://localhost/Asmima-Project/FinalProject/aifest2026/logout.php">Logout</a>
        <?php else: ?>
            <span>Guest</span>
        <?php endif; ?>
    </div>
</header>

