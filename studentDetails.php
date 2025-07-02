<?php
session_start();
require 'db.php';
$username = $_SESSION["username"];
$company_name = "Skill Fort";

if (!isset($_SESSION['username'])) // If session is not set then redirect to Login Page
{
    header("Location:index.php");
    exit();
}

?>
<?php include('header.php') ?>

<?php $id = $_GET['id']; ?>
<?php
$slno = 0;
$result = mysqli_query($conn, "SELECT * FROM `products` WHERE id='$id'");

while ($row_result = mysqli_fetch_array($result)) {
    $slno++;
    $item_id = $row_result['id'];
    $course = $row_result['course'];
    $batch_number = $row_result['batch_number'];
    $class_name = $row_result['class_name'];
    $class_time = $row_result['class_time'];
    $start_date = $row_result['start_date'];
    $whatsappLink = $row_result['whatsappLink'];
    $end_date = $row_result['end_date'];
    $description = $row_result['description'];
?>
    <div class="content-wrapper">
        <div class="studentDetailsContainer">
            <h2 style="text-align:center;">Student Details - <?php echo $class_name; ?></h2>
            <br>
            <div class="tile-container">
                <a href="addStudents.php?id=<?php echo $item_id; ?>">
                    <div class="tile"> Add Students </div>
                </a>
                <a href="viewStudents.php">
                    <div class="tile"> View Students </div>
                </a>
                <a href="takeAttendance.php">
                    <div class="tile"> Take Attendance</div>
                </a>
                <a href="viewAttendance.php">
                    <div class="tile"> View Attendance</div>
                </a>
            </div>
        </div>
    </div>
<?php
}
?>
<?php include('footer.php') ?>