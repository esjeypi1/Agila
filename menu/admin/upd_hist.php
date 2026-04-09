<?php
header('Content-Type: application/json');

$mysqli = require __DIR__ . "../../../scripts/con_db.php";

if ($mysqli->connect_errno) {
    echo json_encode(['status' => 'error', 'message' => $mysqli->connect_error]);
    exit();
}

if (isset($_POST['id_type'])) {
    // Update existing record
    $id_type = $_POST['id_type'];
    $name = $_POST['name'];
    $categ = $_POST['categ'];
    $sql = "UPDATE category SET name=?, categ=? WHERE id_type=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssi", $name, $categ, $id_type);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }
} else {
    // Insert new record
    $crime_type = $_POST['crime_type'];
    $categ = $_POST['categ'];
    $sql = "INSERT INTO category (name, categ) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $crime_type, $categ);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'id' => $stmt->insert_id]);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }
}

?>
