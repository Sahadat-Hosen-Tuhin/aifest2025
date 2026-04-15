<?php include('includes/header.php'); ?>

<style>
    /* PAGE TITLE */
h2 {
    text-align: center;
    margin-top: 40px;
    font-size: 2rem;
    color: #0f172a;
    font-weight: 700;
}

/* FORM WRAPPER */
.form-container {
    width: 100%;
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

/* FORM HOVER */
.form-container form:hover {
    box-shadow: 0 15px 40px rgba(0, 255, 213, 0.25);
}

/* LABEL */
.form-container label {
    font-size: 0.9rem;
    font-weight: 600;
    color: #334155;
}

/* INPUT + SELECT */
.form-container input,
.form-container select {
    width: 100%;
    padding: 10px 12px;

    margin-top: 6px;
    margin-bottom: 15px;

    border: 1px solid #cbd5e1;
    border-radius: 8px;

    font-size: 0.95rem;
    outline: none;

    transition: all 0.25s ease;
}

/* FOCUS EFFECT (NEON THEME) */
.form-container input:focus,
.form-container select:focus {
    border-color: #00ffd5;
    box-shadow: 0 0 8px rgba(0, 255, 213, 0.5);
}

/* FILE INPUT */
.form-container input[type="file"] {
    padding: 6px;
}

/* BUTTON */
.form-container button {
    width: 100%;
    padding: 12px;

    background: #fff;
    color: #0f172a;

    border: .5px solid;
    border-radius: 8px;

    font-size: 1rem;
    font-weight: 700;

    cursor: pointer;
    transition: all 0.25s ease;
}

/* BUTTON HOVER */
.form-container button:hover {
    background: #00ffd5;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0, 255, 213, 0.3);
}
</style>

<h2 style="text-align:center;">🎓 AI Fest 2026 Registration</h2>

<div class="form-container">

<form action="process_register.php" method="POST" enctype="multipart/form-data">

    <label>Name</label><br>
    <input type="text" name="name" required><br><br>

    <label>Department</label><br>
    <input type="text" name="dept" required><br><br>

    <label>Section</label><br>
    <input type="text" name="section" required><br><br>

    <label>Student ID</label><br>
    <input type="text" name="student_id" required><br><br>

    <label>Gender</label><br>
    <select name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <label>Profile Image</label><br>
    <input type="file" name="image" accept="image/*" required><br><br>

    <button type="submit">🚀 Register</button>

</form>

</div>

<?php include('includes/footer.php'); ?>