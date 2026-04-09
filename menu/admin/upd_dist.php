<?php
header('Content-Type: application/json');

$mysqli = require __DIR__ . "../../../scripts/con_db.php";

// Get the form data
$id = $_POST['id']; 
$areaName = $_POST['areaName'];
$description = $_POST['description'];
$population = $_POST['population'];
$areaSize = $_POST['areaSize'];
$numBarangays = $_POST['numBarangays'];

// Update the database
$stmt = $mysqli->prepare("UPDATE area SET name=?, info=?, population=?, area_size=?, num_bar=? WHERE id_area=?");
$stmt->bind_param("ssiiii", $areaName, $description, $population, $areaSize, $numBarangays, $id);

if ($stmt->execute()) {
    echo json_encode(array("status" => "success", "message" => "Data updated successfully."));
} else {
    echo json_encode(array("status" => "error", "message" => "Failed to update data."));
}

$stmt->close();
$mysqli->close();
?>
