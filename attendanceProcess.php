<?php
session_start();
include("config.php");

function eventAttendance($conn, $matricNum, $eventID, $date, $status){
    $sql = "INSERT INTO attendance (eventID, matricNum, date, status) 
            VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "issi", $eventID, $matricNum, $date, $status);

    if (mysqli_stmt_execute($stmt)) {

        echo "Attendance record for $matricNum successfully inserted for event $eventID.";
    } else {

        return "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $eventID = $_POST['eventID'];
    $matricNum = $_POST['matricNum'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $result = eventAttendance($conn, $matricNum, $eventID, $date, $status);

    echo $result;
}
?>