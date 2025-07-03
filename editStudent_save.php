<?php
require('db.php');

$id = mysqli_real_escape_string($conn, $_POST['id']);
$studentName = mysqli_real_escape_string($conn, $_POST['studentName']);
$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
$gmail = mysqli_real_escape_string($conn, $_POST['gmail']);
$join_date = mysqli_real_escape_string($conn, $_POST['join_date']);
$referBy = mysqli_real_escape_string($conn, $_POST['referBy']);
$description = mysqli_real_escape_string($conn, $_POST['description']);

$sql = "UPDATE `student` SET 
    `studentName` = '$studentName',
    `mobile` = '$mobile',
    `gmail` = '$gmail',
    `join_date` = '$join_date',
    `referBy` = '$referBy',
    `description` = '$description'
WHERE `id` = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Updated Successfully!');</script>";
    echo "<script>window.location.href = 'studentSinglePage.php?id=$id';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
