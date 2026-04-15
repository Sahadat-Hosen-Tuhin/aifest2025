<?php include('../includes/header.php'); ?>

<link rel="stylesheet" href="../assets/css/style.css">

<h2 style="text-align:center;margin-top:20px;">📅 AI Fest Events</h2>

<?php
$events = [
    ["title"=>"AI Workshop", "date"=>"2026-04-18", "desc"=>"Learn basics of Artificial Intelligence with hands-on session."],
    ["title"=>"Coding Competition", "date"=>"2026-04-19", "desc"=>"Battle of coders to test your algorithm skills."],
    ["title"=>"Robotics Expo", "date"=>"2026-04-20", "desc"=>"Showcase of innovative robotics projects."],
    ["title"=>"Tech Talk Session", "date"=>"2026-04-21", "desc"=>"Industry experts share future tech trends."],
    ["title"=>"Hackathon 24H", "date"=>"2026-04-22", "desc"=>"24-hour nonstop coding challenge."],
    ["title"=>"Startup Pitch", "date"=>"2026-04-23", "desc"=>"Present your startup idea to judges."],
    ["title"=>"Gaming Tournament", "date"=>"2026-04-24", "desc"=>"E-sports battle between teams."],
    ["title"=>"AI Quiz Contest", "date"=>"2026-04-25", "desc"=>"Test your AI knowledge."],
    ["title"=>"Project Exhibition", "date"=>"2026-04-26", "desc"=>"Final project showcase of participants."],
    ["title"=>"Closing Ceremony", "date"=>"2026-04-27", "desc"=>"Award distribution and closing event."]
];
?>

<div style="
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:20px;
padding:30px;
">

<?php foreach($events as $e) { ?>

<div style="
background:linear-gradient(135deg,#1e1e2f,#2b2b45);
color:white;
padding:20px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,0.3);
transition:0.3s;
">

    <h3>📌 <?php echo $e['title']; ?></h3>

    <p style="color:#00ffcc;"><b>📅 <?php echo $e['date']; ?></b></p>

    <p><?php echo $e['desc']; ?></p>

</div>

<?php } ?>

</div>

<?php include('../includes/footer.php'); ?>