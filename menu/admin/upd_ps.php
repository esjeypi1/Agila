<?php
header('Content-Type: application/json');

$mysqli = require __DIR__ . "../../../scripts/con_db.php";

if ($mysqli->connect_errno) {
    echo json_encode(['status' => 'error', 'message' => $mysqli->connect_error]);
    exit();
}

if (isset($_POST['id_ps'])) {
    // Update existing record
    $id_ps = $_POST['id_ps'];
    $num = $_POST['num'];
    $name = $_POST['name'];
    $lng = $_POST['lng'];
    $lat = $_POST['lat'];
    $sql = "UPDATE stations SET name=?, lng=?, lat=? WHERE id_ps=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssi", $name, $lng, $lat, $id_ps);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }
} else {
    // Insert new record
    $station = $_POST['station'];
    $num = $_POST['num'];
    $lng = $_POST['lng'];
    $lat = $_POST['lat'];
    $sql = "INSERT INTO stations (num, name, lng, lat) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssss", $num, $station, $lng, $lat);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'id' => $stmt->insert_id]);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }
}

?>
