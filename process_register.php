
<?php
include('config/db.php');
include('includes/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // =========================
    // 1. FORM DATA
    // =========================
    $name = $_POST['name'];
    $dept = $_POST['dept'];
    $section = $_POST['section'];
    $student_id = $_POST['student_id'];
    $gender = $_POST['gender'];

    // ✅ PASSWORD (FIXED)
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // =========================
    // 2. IMAGE UPLOAD
    // =========================
    $image = time() . "_" . $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $folder = "assets/images/users/";

    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    $path = $folder . $image;

    if (!move_uploaded_file($tmp, $path)) {
        die("Image upload failed ❌");
    }

    // =========================
    // 3. PARTICIPATION CODE
    // =========================
    $code = "AI" . rand(1000, 9999);

    // =========================
    // 4. TASK-2 LOGIC
    // =========================
    $id_length = strlen($student_id);

    $M = intval($student_id[$id_length - 2]);
    $N = intval($student_id[$id_length - 1]);

    if ($M == 0 && $N == 0) {
        $M = 5;
        $N = 5;
    }

    // =========================
    // 5. FEE
    // =========================
    $base_fee = 500;
    $D = (($M + $N) % 10) + 5;
    $final_fee = $base_fee - (($base_fee * $D) / 100);

    // =========================
    // 6. BOOTH
    // =========================
    $booth = (($M * $N) % 7) + 1;

    // =========================
    // 7. INSERT
    // =========================
    $sql = "INSERT INTO users 
    (name, dept, section, student_id, gender, image, participation_code, password, fee, booth, role)
    VALUES 
    ('$name', '$dept', '$section', '$student_id', '$gender', '$image', '$code', '$password', '$final_fee', '$booth', 'user')";

    if ($conn->query($sql)) {
        echo "<h2>Registration Successful 🎉</h2>";
        echo "<p>Your Participation Code: <b>$code</b></p>";
        echo "<p>Final Fee: <b>$final_fee Tk</b></p>";
        echo "<p>Booth: <b>$booth</b></p>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<?php include('includes/footer.php'); ?>
