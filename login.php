<?php include('includes/header.php'); ?>
<style>
    /* PAGE TITLE */
h2 {
    text-align: center;
    margin-top: 40px;
    font-size: 2rem;
    color: #1e293b;
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
    width: 350px;
    background: #ffffff;
    padding: 30px;

    border-radius: 12px;
    border: 1px solid #e2e8f0;

    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
}

/* LABEL */
.form-container label {
    font-size: 0.9rem;
    font-weight: 600;
    color: #334155;
}

/* INPUT */
.form-container input {
    width: 100%;
    padding: 10px 12px;
    margin-top: 5px;
    margin-bottom: 15px;

    border: 1px solid #cbd5e1;
    border-radius: 8px;

    font-size: 0.95rem;
    outline: none;

    transition: all 0.2s ease;
}

/* INPUT FOCUS */
.form-container input:focus {
    border-color: #00ffd5;
    box-shadow: 0 0 5px rgba(37, 99, 235, 0.3);
}

/* BUTTON */
.form-container button {
    width: 100%;
    padding: 10px;

    background: #ffff;
    color: #000000;

    border: none;
    border-radius: 8px;

    font-size: 1rem;
    font-weight: 600;

    cursor: pointer;
    transition: all 0.25s ease;
}

/* BUTTON HOVER */
.form-container button:hover {
    background: #00ffd5;
    color: #fff;
    transform: scale(1.03);
}
</style>

<h2 style="text-align:center;">Login - AI Fest 2026</h2>

<div class="form-container">

<form action="process_login.php" method="POST">

    <label>Student ID</label><br>
    <input type="text" name="student_id" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>

</form>

</div>

<?php include('includes/footer.php'); ?>