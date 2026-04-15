<?php
session_start();
include('../config/db.php');

// =========================
// LOGIN CHECK
// =========================
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// =========================
// GET USER DATA
// =========================
$sql = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";
$result = $conn->query($sql);

if (!$result || $result->num_rows == 0) {
    echo "User not found ❌";
    exit();
}

$user = $result->fetch_assoc();
?>

<?php include('../includes/header.php'); ?>

<link rel="stylesheet" href="../assets/css/dashboard.css">
<link rel="stylesheet" href="/Asmima-Project/FinalProject/aifest2026/assets/css/style.css">


<style>
    /* =========================
    GLOBAL PAGE STYLE
========================= */
body {
    background: #f8fafc;
    font-family: Arial, sans-serif;
    color: #0f172a;
}

/* =========================
    TITLE
========================= */
h2 {
    text-align: center;
    margin: 25px 0;
    font-size: 1.8rem;
    font-weight: 700;
}

/* =========================
    DASHBOARD CONTAINER
========================= */
.dashboard-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

/* PROFILE CARD */
.card {
    width: 350px;
    background: #ffffff;
    padding: 20px;
    border-radius: 12px;

    border: 1px solid #e2e8f0;
    box-shadow: 0 6px 15px rgba(0,0,0,0.08);

    text-align: center;
}

/* PROFILE IMAGE */
.profile-img {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 10px;
}

/* TEXT */
.card h3 {
    margin: 10px 0;
}

.card p {
    margin: 5px 0;
    color: #475569;
}

/* HR */
.card hr {
    margin: 15px 0;
}

/* BUTTON */
.btn {
    display: inline-block;
    padding: 10px 15px;
    background: #fff;
    color: #0f172a;
    
    border: 1px solid black;
    border-radius: 8px;
    font-weight: 600;
    
    text-decoration: none;
    transition: 0.25s;
}

.btn:hover {
    background: #00e6c1;
    color: #fff;
    transform: scale(1.05);
}

/* LOGOUT */
.logout {
    display: inline-block;
    margin-top: 10px;
    color: red;
    font-weight: 600;
}

/* =========================
    PRODUCT SECTION
========================= */
.product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    margin: 20px 0;
}

.product-card {
    width: 200px;
    background: #ffffff;
    padding: 15px;
    border-radius: 10px;

    text-align: center;
    border: 1px solid #e2e8f0;

    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    transition: 0.3s;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-card img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    margin-bottom: 10px;
}

.product-card h4 {
    margin: 5px 0;
}

.product-card p {
    color: #475569;
}

/* PRODUCT BUTTON */
.product-card button {
    padding: 8px 12px;
    background: #0f172a;
    color: white;

    border: none;
    border-radius: 6px;

    cursor: pointer;
    transition: 0.2s;
}

.product-card button:hover {
    background: #1e293b;
    transform: scale(1.05);
}

/* VIEW CART BUTTON */
button {
    display: block;
    margin: 20px auto;
    padding: 10px 15px;

    background: #fff;
    border: 1px solid black;
    color: black;
    border-radius: 8px;
    font-weight: 600;

    cursor: pointer;
    transition: 0.25s;
}

button:hover {
    background: #00e6c1;
    color:#fff;
    transform: scale(1.05);
}

/* =========================
    CART MODAL
========================= */
#cartModal {
    position: fixed;
    top: 20%;
    left: 50%;
    transform: translateX(-50%);

    width: 40%;
    background: white;

    padding: 20px;
    border-radius: 10px;

    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    z-index: 999;
}
</style>
<!-- =========================
        DASHBOARD TITLE
========================= -->
<h2>User Dashboard</h2>

<!-- =========================
        USER PROFILE CARD
========================= -->
<div class="dashboard-container">

    <div class="card">

        <img src="../assets/images/users/<?php echo $user['image']; ?>" class="profile-img">

        <h3><?php echo $user['name']; ?></h3>

        <p><b>ID:</b> <?php echo $user['student_id']; ?></p>
        <p><b>Dept:</b> <?php echo $user['dept']; ?></p>
        <p><b>Section:</b> <?php echo $user['section']; ?></p>

        <hr>

        <p><b>Code:</b> <?php echo $user['participation_code']; ?></p>
        <p><b>Fee:</b> <?php echo $user['fee']; ?> Tk</p>
        <p><b>Booth:</b> <?php echo $user['booth']; ?></p>

        <br>

        <a href="../idcard/generate_id.php" class="btn">🎫 Create ID Card</a>

        <br><br>

        <a href="../logout.php" class="logout">Logout</a>

    </div>

</div>

<!-- =========================
        PRODUCTS SECTION
========================= -->
<?php
$tshirts = [
    ["name"=>"AI Fest Black Tee", "img"=>"t1.jfif", "price"=>300],
    ["name"=>"White Code Tee", "img"=>"t2.jfif", "price"=>350],
    ["name"=>"Cyber Blue Tee", "img"=>"t3.jfif", "price"=>400],
    ["name"=>"Neon AI Tee", "img"=>"t1.jfif", "price"=>450]
];
?>

<h2>👕 T-Shirts</h2>

<div class="product-container">

<?php foreach($tshirts as $t) { ?>

    <div class="product-card">

        <img src="../assets/images/products/<?php echo $t['img']; ?>" width="120">

        <h4><?php echo $t['name']; ?></h4>
        <p>৳ <?php echo $t['price']; ?></p>

        <button onclick="addToCart('<?php echo $t['name']; ?>','<?php echo $t['img']; ?>')">
            Add to Cart
        </button>

    </div>

<?php } ?>

</div>

<button onclick="viewCart()">🛒 View Cart</button>

<!-- =========================
        CART SCRIPT
========================= -->
<script>
function addToCart(name, img){

    fetch("../store/add_to_cart.php", {
        method:"POST",
        headers:{"Content-Type":"application/x-www-form-urlencoded"},
        body:`name=${name}&img=${img}`
    })
    .then(res=>res.text())
    .then(data=>{
        alert("Added to cart ✅");
    });
}

function viewCart(){

    fetch("../store/cart.php")
    .then(res=>res.text())
    .then(data=>{
        document.getElementById("cartModal").innerHTML = data;
        document.getElementById("cartModal").style.display = "block";
    });
}
</script>

<!-- =========================
        CART MODAL
========================= -->
<div id="cartModal" style="
position:fixed;
top:20%;
left:30%;
width:40%;
background:white;
padding:20px;
display:none;
box-shadow:0 0 10px gray;
z-index:999;
border-radius:10px;
">
</div>

<button onclick="document.getElementById('cartModal').style.display='none'">
Close
</button>

<?php include('../includes/footer.php'); ?>