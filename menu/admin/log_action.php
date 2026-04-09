<?php
session_start();

if (!isset($_SESSION['name'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit();
}

$mysqli = require __DIR__ . "../../../scripts/con_db.php";

$action = $_POST['action'];
$item_type = $_POST['item_type'];
$item_id = $_POST['item_id'];
$details = $_POST['details'];

$sql = "INSERT INTO audit_trail (action, item_type, item_id, details, timestamp) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('ssis', $action, $item_type, $item_id, $details);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to log action: ' . $stmt->error]);
}

$stmt->close();
$mysqli->close();
?>
