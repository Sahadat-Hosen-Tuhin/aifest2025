<?php
session_start();
include('config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // =========================
    // 1. GET DATA
    // =========================
    $student_id = trim($_POST['student_id']);
    $password = $_POST['password'];

    // =========================
    // 2. CHECK USER
    // =========================
    $sql = "SELECT * FROM users WHERE student_id = '$student_id' LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {

        $user = $result->fetch_assoc();

        // =========================
        // DEBUG (optional - remove later)
        // =========================
        // echo $user['password'];

        // =========================
        // 3. VERIFY PASSWORD
        // =========================
        if (!empty($user['password']) && password_verify($password, $user['password'])) {

            // =========================
            // 4. SET SESSION
            // =========================
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['student_id'] = $user['student_id'];
            $_SESSION['role'] = $user['role'];

            // =========================
            // 5. REDIRECT
            // =========================
            if ($user['role'] == 'leader') {
                header("Location: dashboard/group_dashboard.php");
            } 
            elseif ($user['role'] == 'volunteer') {
                header("Location: dashboard/volunteer_dashboard.php");
            } 
            else {
                header("Location: dashboard/user_dashboard.php");
            }

            exit();

        } else {
            echo "<h3 style='color:red;'>❌ Wrong Password or Password Not Set</h3>";
        }

    } else {
        echo "<h3 style='color:red;'>❌ User not found</h3>";
    }

} else {
    header("Location: login.php");
    exit();
}
?>