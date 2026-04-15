<?php
include('../config/auth.php');
include('../config/db.php');

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>ID Card</title>

<style>
/* =========================
    PAGE BACKGROUND
========================= */
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;

    background: radial-gradient(circle at top, #0f172a, #020617);
    color: white;

    text-align: center;
}

/* =========================
    ID CARD
========================= */
.id-card {
    width: 340px;
    margin: 60px auto;
    padding: 25px;

    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(12px);

    border-radius: 18px;
    border: 1px solid rgba(0, 255, 213, 0.3);

    box-shadow: 0 10px 40px rgba(0, 255, 213, 0.15);

    transition: 0.3s;
}

/* HOVER EFFECT */
.id-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 50px rgba(0, 255, 213, 0.25);
}

/* =========================
    IMAGE
========================= */
.id-card img {
    width: 110px;
    height: 110px;

    border-radius: 50%;
    object-fit: cover;

    border: 3px solid #00ffd5;
    margin-bottom: 10px;
}

/* =========================
    TITLE
========================= */
.id-card h2 {
    font-size: 1.4rem;
    margin: 10px 0;
    color: #00ffd5;
    letter-spacing: 1px;
}

/* NAME */
.id-card h3 {
    margin: 8px 0;
    font-size: 1.2rem;
}

/* TEXT */
.id-card p {
    margin: 5px 0;
    font-size: 0.95rem;
    color: #cbd5e1;
}

/* HR */
.id-card hr {
    border: none;
    height: 1px;
    background: rgba(255,255,255,0.2);
    margin: 15px 0;
}

/* =========================
    BUTTON
========================= */
button {
    margin-top: 20px;
    padding: 10px 18px;

    background: #00ffd5;
    color: #0f172a;

    border: none;
    border-radius: 8px;

    font-weight: 700;
    cursor: pointer;

    transition: 0.25s;
}

button:hover {
    background: #00e6c1;
    transform: scale(1.05);
}
</style>

</head>

<body>

<div class="id-card" id="card">

    <img src="../assets/images/users/<?php echo $user['image']; ?>">

    <h2>AI FEST 2026</h2>

    <h3><?php echo $user['name']; ?></h3>

    <p><?php echo $user['student_id']; ?></p>
    <p><?php echo $user['dept']; ?> | <?php echo $user['section']; ?></p>

    <hr>

    <p>Code: <?php echo $user['participation_code']; ?></p>
    <p>Booth: <?php echo $user['booth']; ?></p>

</div>

<br>

<button onclick="downloadCard()">Download</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
function downloadCard() {
    html2canvas(document.getElementById("card")).then(canvas => {
        let link = document.createElement("a");
        link.download = "id_card.png";
        link.href = canvas.toDataURL();
        link.click();
    });
}
</script>

</body>
</html>