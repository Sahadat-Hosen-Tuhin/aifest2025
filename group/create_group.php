<?php include('../includes/header.php'); ?>
<?php include('../config/db.php'); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_id = $_POST['student_id'];
    $code = $_POST['participation_code'];

    $check = "SELECT * FROM users 
              WHERE student_id='$student_id' 
              AND participation_code='$code'";

    $result = $conn->query($check);

    if ($result->num_rows == 1) {

        $user = $result->fetch_assoc();
        $leader_id = $user['id'];

        $group_name = $_POST['group_name'];

        $logo = time() . "_" . $_FILES['logo']['name'];
        $tmp = $_FILES['logo']['tmp_name'];

        $folder = "../uploads/group_logos/";
        move_uploaded_file($tmp, $folder.$logo);

        $sql = "INSERT INTO groups (group_name, leader_id, group_logo)
                VALUES ('$group_name', '$leader_id', '$logo')";

        if ($conn->query($sql)) {
            echo "<p class='success'>🎉 Group Created Successfully!</p>";
        } else {
            echo "<p class='error'>❌ DB Error</p>";
        }

    } else {
        echo "<p class='error'>❌ Invalid ID or Participation Code</p>";
    }
}
?>
<link rel="stylesheet" href="/Asmima-Project/FinalProject/aifest2026/assets/css/style.css">

<style>
    /* PAGE TITLE */
.page-title {
    text-align: center;
    margin-top: 40px;
    font-size: 2rem;
    font-weight: 700;
    color: #0f172a;
}

/* FORM WRAPPER */
.form-container {
    display: flex;
    justify-content: center;
    margin-top: 30px;
}

/* FORM CARD */
.form-container form {
    width: 420px;
    background: #ffffff;

    padding: 30px;
    border-radius: 14px;

    border: 1px solid rgba(0, 255, 213, 0.4);
    box-shadow: 0 10px 30px rgba(0, 255, 213, 0.15);

    transition: all 0.3s ease;
}

/* HOVER */
.form-container form:hover {
    box-shadow: 0 15px 40px rgba(0, 255, 213, 0.25);
}

/* LABEL */
.form-container label {
    font-weight: 600;
    font-size: 0.9rem;
    color: #334155;
}

/* INPUT */
.form-container input {
    width: 100%;
    padding: 10px 12px;

    margin-top: 6px;
    margin-bottom: 15px;

    border: 1px solid #cbd5e1;
    border-radius: 8px;

    outline: none;
    transition: all 0.25s ease;
}

/* FOCUS */
.form-container input:focus {
    border-color: #00ffd5;
    box-shadow: 0 0 8px rgba(0, 255, 213, 0.5);
}

/* BUTTON */
.form-container button {
    width: 100%;
    padding: 12px;

    background: #00ffd5;
    color: #0f172a;

    border: none;
    border-radius: 8px;

    font-size: 1rem;
    font-weight: 700;

    cursor: pointer;
    transition: all 0.25s ease;
}

/* BUTTON HOVER */
.form-container button:hover {
    background: #00e6c1;
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0, 255, 213, 0.3);
}

/* SUCCESS MESSAGE */
.success {
    text-align: center;
    color: green;
    font-weight: 600;
    margin-top: 20px;
}

/* ERROR MESSAGE */
.error {
    text-align: center;
    color: red;
    font-weight: 600;
    margin-top: 20px;
}
</style>

<h2 class="page-title">👥 Create Your Group</h2>

<div class="form-container">

    <form method="POST" enctype="multipart/form-data">

        <label>Student ID</label>
        <input type="text" name="student_id" required>

        <label>Participation Code</label>
        <input type="text" name="participation_code" required>

        <label>Group Name</label>
        <input type="text" name="group_name" required>

        <label>Group Logo</label>
        <input type="file" name="logo" required>

        <button type="submit">Create Group</button>

    </form>

</div>

<?php include('../includes/footer.php'); ?>