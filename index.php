<?php include('includes/header.php'); ?>

<!-- HERO SECTION -->
<section class="hero">
    <div class="overlay"></div>

    <div class="hero-text">
        <h1>Welcome to AI Fest 2026</h1>
        <p>Join the biggest AI competition</p>
        <a href="register.php" class="btn">Register Now</a>


<p class="deadline-text">Deadline: 20th April, 2026</p>

<div class="countdown">
    <div><span id="days">0</span> Days</div>
    <div><span id="hours">0</span> Hours</div>
    <div><span id="minutes">0</span> Minutes</div>
    <div><span id="seconds">0</span> Seconds</div>
</div>
    </div>
</section>


<!-- BANNER SLIDER (simple placeholder) -->
<section class="banner">
    <h2>AI Fest Highlights</h2>

    <div class="slider">
        <div class="slide">Innovation Challenge</div>
        <div class="slide">Robotics Contest</div>
        <div class="slide">Hackathon</div>
        <div class="slide">AI Project Showcase</div>
        <div class="slide">Machine Learning Battle</div>
        <div class="slide">Startup Pitch Competition</div>
        <div class="slide">Tech Quiz</div>
        <div class="slide">Cyber Security Challenge</div>
    </div>
</section>

<!-- GROUP SLIDER -->
<section class="group-section">

    <!-- LEFT SIDE -->
    <div class="group-left">
        <h2>About AI Fest 2026</h2>
        <p>
            AI Fest 2026 is a national level competition where students
            showcase innovation, creativity and technical skills in AI,
            robotics and software development.
        </p>
    </div>

    <!-- RIGHT SIDE -->
    <!-- <?php
include('config/db.php');

$sql = "SELECT group_name, group_logo FROM groups";
$result = $conn->query($sql);
?>

<div class="group-slider">

<?php while($row = $result->fetch_assoc()) { ?>

    <div class="group-card">
        <img src="assets/images/groups/<?php echo $row['group_logo']; ?>">
        <p><?php echo $row['group_name']; ?></p>
    </div>

<?php } ?>

</div> -->


<?php
include('config/db.php');

$sql = "SELECT group_name, group_logo FROM groups";
$result = $conn->query($sql);
?>

<div class="group-right">
    <h2>👥 Top Groups</h2>

    <div class="group-slider">
        <div class="slider-track">

            <?php while($row = $result->fetch_assoc()) { ?>

                <div class="group-card">
                    <img src="uploads/group_logos/<?php echo $row['group_logo']; ?>">   
                    <p><?php echo $row['group_name']; ?></p>
                </div>

                <!-- Loop again for smooth animation -->

                <div class="group-card">
                    <img src="uploads/group_logos/<?php echo $row['group_logo']; ?>">
                    <p><?php echo $row['group_name']; ?></p>
                </div>

            <?php } ?>

        </div>
    </div>
</div>

</section>






<section class="guest-section">

    <h2> Honourable Guests</h2>

    <div class="guest-container">

        <div class="guest-card">
            <img src="assets/images/guests/g1.jfif">
            <h3>Md. Sabur khan</h3>
            <p>Chief Guest</p>
        </div>

        <div class="guest-card">
            <img src="assets/images/guests/g2.jpg">
            <h3>Professor Dr. M. R. Kabir</h3>
            <p>Vice Chancellor, DIU</p>
        </div>

        <div class="guest-card">
            <img src="assets/images/guests/g3.jpg">
            <h3>Mohammed Masum Iqbal, Phd</h3>
            <p>Pro-Vice Chancellor, DIU</p>
        </div>

        <div class="guest-card">
            <img src="assets/images/guests/g4.jfif">
            <h3>Md. Sarwar Hossain Mollah</h3>
            <p>Head, Department of CIS, DIU</p>
        </div>

        <div class="guest-card">
            <img src="assets/images/guests/g5.jpeg">
            <h3>Dr. Mohammad Azam Khan</h3>
            <p>Associate Professor, Department of CIS, DIU</p>
        </div>

    </div>

</section>

<script src="assets/js/script.js"></script>

<?php include('includes/footer.php'); ?>








