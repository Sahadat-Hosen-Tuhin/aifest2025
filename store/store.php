<?php include('../includes/header.php'); ?>
<link rel="stylesheet" href="/Asmima-Project/FinalProject/aifest2026/assets/css/style.css">
<style>
body {
    font-family: Arial, sans-serif;
    background: #fff;
    margin: 0;
    padding: 0;
}

/* TITLE */
h2 {
    color: black;
    text-align: center;
    margin-top: 20px;
    font-size: 28px;
}

/* STORE GRID */
.store-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 25px;
    margin-top: 30px;
    padding: 20px;
}

/* PRODUCT CARD */
.product-card {
    width: 220px;
    background: linear-gradient(145deg, #1c1c2e, #2a2a40);
    color: white;
    border-radius: 15px;
    padding: 15px;
    text-align: center;
    box-shadow: 0 8px 20px rgba(0,0,0,0.4);
    transition: 0.3s ease;
}

.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 30px rgba(0,255,204,0.2);
}

.product-card img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 10px;
    transition: 0.3s;
}

.product-card:hover img {
    transform: scale(1.1);
}

.product-card h4 {
    font-size: 16px;
    margin: 10px 0 5px 0;
}

.product-card p {
    color: #00ffcc;
    font-weight: bold;
}

/* BUTTON */
.product-card button {
    margin-top: 10px;
    padding: 8px 12px;
    border: none;
    border-radius: 8px;
    background: linear-gradient(90deg, #00ffcc, #00aaff);
    color: black;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.product-card button:hover {
    transform: scale(1.05);
    background: linear-gradient(90deg, #00aaff, #00ffcc);
}
</style>

<h2>👕 AI Fest Store</h2>

<?php
$tshirts = [
    ["name"=>"AI Fest Black Tee", "img"=>"t1.jpg", "price"=>300],
    ["name"=>"White Code Tee", "img"=>"t2.jpg", "price"=>350],
    ["name"=>"Cyber Blue Tee", "img"=>"t3.jpg", "price"=>400],
    ["name"=>"Neon AI Tee", "img"=>"t4.jpg", "price"=>450]
];
?>

<div class="store-container">

<?php foreach($tshirts as $t) { ?>

    <div class="product-card">

        <img src="../assets/images/products/<?php echo $t['img']; ?>">

        <h4><?php echo $t['name']; ?></h4>

        <p>৳ <?php echo $t['price']; ?></p>

        <button>Add to Cart</button>

    </div>

<?php } ?>

</div>

<?php include('../includes/footer.php'); ?>