<?php
session_start();
include 'dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $blood_type = $_POST['blood_type'];

    $sql = "INSERT INTO blood_requests (user_id, blood_type) VALUES ('$user_id', '$blood_type')";

    if ($conn->query($sql) === TRUE) {
        echo "Blood request submitted.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
