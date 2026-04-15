<?php
include('../includes/header.php');
include('../config/auth.php');
include('../config/db.php');

$leader_id = $_SESSION['user_id'];

// =========================
// GET GROUP (SAFE)
// =========================
$group = $conn->query("SELECT * FROM groups WHERE leader_id='$leader_id'");

if(!$group || $group->num_rows == 0){
    echo "<h3>No group found ❌</h3>";
    echo "<a href='create_group.php'>Create Group</a>";
    exit();
}

$g = $group->fetch_assoc();
$group_id = $g['group_id'];
?>

<!-- =========================
        SCOPED STYLE
========================= -->
<link rel="stylesheet" href="/Asmima-Project/FinalProject/aifest2026/assets/css/style.css">

<style>
.leader-panel {
    font-family: Arial;
    color: #0f172a;
    text-align: center;
}

/* TITLE */
.leader-panel h2,
.leader-panel h3 {
    margin: 15px 0;
    font-weight: 700;
}

/* IMAGE */
.leader-panel img {
    border-radius: 10px;
    margin: 10px 0;
}

/* FORM */
.leader-panel form {
    width: 360px;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

.leader-panel form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;

    border: 1px solid #cbd5e1;
    border-radius: 8px;
    outline: none;
}

.leader-panel form input:focus {
    border-color: #00ffd5;
    box-shadow: 0 0 8px rgba(0,255,213,0.4);
}

.leader-panel form button {
    width: 100%;
    padding: 10px;
    background: #00ffd5;
    border: none;
    border-radius: 8px;
    font-weight: 700;
    cursor: pointer;
}

.leader-panel form button:hover {
    background: #00e6c1;
    transform: scale(1.03);
}

/* MEMBER LIST */
.leader-panel .member {
    width: 360px;
    margin: 10px auto;
    padding: 10px 15px;

    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;

    display: flex;
    justify-content: space-between;
}

/* REMOVE LINK */
.leader-panel .member a {
    color: red;
    text-decoration: none;
    font-weight: 600;
}
</style>

<!-- =========================
        MAIN WRAPPER
========================= -->
<div class="leader-panel">

<h2>👑 Group Leader Panel</h2>

<h3>Group: <?php echo $g['group_name']; ?></h3>

<img src="../uploads/group_logos/<?php echo $g['group_logo']; ?>" width="120">

<hr>

<!-- ADD MEMBER -->
<form action="add_member.php" method="POST">
    <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
    <input type="text" name="code" placeholder="Participation Code" required>
    <button type="submit">Add Member</button>
</form>

<hr>

<h3>Members</h3>

<?php
$sql = "SELECT gm.id, u.name, u.student_id, gm.participation_code
        FROM group_members gm
        JOIN users u ON gm.user_id = u.id
        WHERE gm.group_id='$group_id' AND gm.status='active'";

$res = $conn->query($sql);

if($res && $res->num_rows > 0){

    while($row = $res->fetch_assoc()) {
?>

    <div class="member">
        <span>
            <?php echo $row['name']; ?> (<?php echo $row['student_id']; ?>)
        </span>

        <a href="remove_member.php?id=<?php echo $row['id']; ?>">❌</a>
    </div>

<?php
    }

} else {
    echo "<p>No members yet</p>";
}
?>

</div>

<?php include('../includes/footer.php'); ?>