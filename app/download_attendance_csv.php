<?php
include 'db.php';

$where = "";
$filename = "Attendance_List.csv";

if (isset($_GET['date']) && !empty($_GET['date'])) {
    $date = $_GET['date'];
    $where = "WHERE attendance.date = '$date'";
    $filename = "Attendance_$date.csv";
} elseif (isset($_GET['from']) && isset($_GET['to'])) {
    $from = $_GET['from'];
    $to = $_GET['to'];
    $where = "WHERE attendance.date BETWEEN '$from' AND '$to'";
    $filename = "Attendance_{$from}_to_{$to}.csv";
}

// Fetch attendance data
$query = "SELECT attendance.date, attendance.student_name, attendance.mobile, attendance.status
          FROM attendance 
          $where
          ORDER BY attendance.date DESC";

$result = $conn->query($query);

// Set headers for CSV download
header('Content-Type: text/csv');
header("Content-Disposition: attachment; filename=\"$filename\"");

// Open output stream
$output = fopen('php://output', 'w');

// Output header row
fputcsv($output, ['Date', 'Student Name', 'Mobile', 'Status']);

// Output data rows
while ($row = $result->fetch_assoc()) {
    fputcsv($output, [$row['date'], $row['student_name'], $row['mobile'], $row['status']]);
}

fclose($output);
exit;
?>
