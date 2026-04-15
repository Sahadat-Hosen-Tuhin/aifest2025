<?php include('../config/db.php'); ?>
<?php include('../includes/header.php'); ?>
<link rel="stylesheet" href="/Asmima-Project/FinalProject/aifest2026/assets/css/style.css">
<style>
    /* =========================
    PAGE TITLE
========================= */
h2 {
    text-align: center;
    margin-top: 40px;
    font-size: 1.8rem;
    font-weight: 700;
    color: #0f172a;
}

/* =========================
    FORM WRAPPER
========================= */
form {
    width: 360px;
    margin: 30px auto;

    background: #ffffff;
    padding: 25px;

    border-radius: 12px;
    border: 1px solid #e2e8f0;

    box-shadow: 0 10px 25px rgba(0,0,0,0.08);

    text-align: center;
}

/* INPUT FIELDS */
form input {
    width: 100%;
    padding: 10px 12px;

    margin-bottom: 15px;

    border: 1px solid #cbd5e1;
    border-radius: 8px;

    outline: none;
    font-size: 0.95rem;

    transition: 0.25s;
}

/* INPUT FOCUS */
form input:focus {
    border-color: #00ffd5;
    box-shadow: 0 0 8px rgba(0, 255, 213, 0.4);
}

/* BUTTON */
form button {
    width: 100%;
    padding: 10px;

    background: #00ffd5;
    color: #0f172a;

    border: none;
    border-radius: 8px;

    font-size: 1rem;
    font-weight: 700;

    cursor: pointer;
    transition: 0.25s;
}

/* BUTTON HOVER */
form button:hover {
    background: #00e6c1;
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0,255,213,0.3);
}

/* LINK */
a {
    display: inline-block;
    margin-top: 10px;
    color: #2563eb;
    font-weight: 600;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* SUCCESS MESSAGE */
.success {
    text-align: center;
    color: green;
    font-weight: 600;
}

/* ERROR MESSAGE */
.error {
    text-align: center;
    color: red;
    font-weight: 600;
}
</style>
<h2>Group Leader Login</h2>

<form method="POST">

    <input type="text" name="student_id" placeholder="Student ID" required><br><br>

    <input type="text" name="code" placeholder="Participation Code" required><br><br>

    <button type="submit">Login</button>

</form>

<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_id = $_POST['student_id'];
    $code = $_POST['code'];

    // =========================
    // CHECK USER
    // =========================
    $sql = "SELECT * FROM users 
            WHERE student_id='$student_id' 
            AND participation_code='$code'";

    $result = $conn->query($sql);

    if($result->num_rows == 1) {

        $user = $result->fetch_assoc();

        // =========================
        // SET SESSION
        // =========================
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = 'leader';

        echo "Login Successful 🎉 <br>";
        echo "<a href='leader_panel.php'>Go to Leader Panel</a>";

    } else {
        echo "❌ Invalid Credentials";
    }
}
?>

<?php include('../includes/footer.php'); ?>