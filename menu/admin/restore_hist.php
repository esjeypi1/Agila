<?php
header('Content-Type: application/json');

$mysqli = require __DIR__ . "../../../scripts/con_db.php";

if ($mysqli->connect_errno) {
    echo json_encode(['status' => 'error', 'message' => $mysqli->connect_error]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_type'];

    $sql = "UPDATE category SET is_hidden = 0 WHERE id_type = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }

    $stmt->close();
    $mysqli->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
