<?php
include 'dbConnection.php';

$location = $_GET['location'] ?? '';
$blood_type = $_GET['blood_type'] ?? '';

$sql = "SELECT * FROM blood_banks WHERE location LIKE '%$location%' AND blood_type LIKE '%$blood_type%'";
$result = $conn->query($sql);

$blood_banks = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $blood_banks[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Banks</title>
</head>
<body>
    <h1>Available Blood Banks</h1>
    <ul>
        <?php foreach ($blood_banks as $bank): ?>
            <li>
                <?php echo $bank['name']; ?> - <?php echo $bank['location']; ?> 
                (<?php echo $bank['blood_type']; ?>)
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
