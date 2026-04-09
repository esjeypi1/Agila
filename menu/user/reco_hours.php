<?php
$conn = require __DIR__ . "/../../scripts/con_db.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$crimeType = "Murder" ?? '';

// Prepare and execute the SQL statement to fetch the hours
$sql = "SELECT hours FROM category WHERE name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $crimeType);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data = ['hours' => $row['hours']];
} else {
    $data = ['error' => 'No results found'];
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>