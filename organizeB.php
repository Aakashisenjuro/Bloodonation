<?php
session_start();
include 'dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $program_name = $_POST['program_name'];
    $location = $_POST['location'];
    $date = $_POST['date'];

    $sql = "INSERT INTO donation_programs (user_id, program_name, location, date) VALUES ('$user_id', '$program_name', '$location', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "Donation program organized.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
