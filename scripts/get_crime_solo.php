<?php

header('Content-Type: application/json');
$mysqli = require __DIR__ . "/con_db.php";

$id_area = intval($_GET['polygonId']);

$fromDate = $_GET['fromDate'] ?? '';
$toDate = $_GET['toDate'] ?? '';
$fromTime = $_GET['fromTime'] ?? '';
$toTime = $_GET['toTime'] ?? '';
$categories = $_GET['categories'] ?? '';

$sql = "
    SELECT c.id_crime, c.lat, c.lng, c.date, c.time, c.id_type 
    FROM crime_data c
    INNER JOIN barangay_n b ON c.id_barangay = b.id_bar
    INNER JOIN area a ON b.id_area = a.id_area
    WHERE a.id_area = ?";

$params = [$id_area];

if ($fromDate && $toDate) {
    $sql .= " AND c.date BETWEEN ? AND ?";
    $params[] = $fromDate;
    $params[] = $toDate;
}
if ($fromTime && $toTime) {
    $sql .= " AND c.time BETWEEN ? AND ?";
    $params[] = $fromTime;
    $params[] = $toTime;
}
if ($categories) {
    $categoriesArray = explode(',', $categories);
    $placeholders = implode(',', array_fill(0, count($categoriesArray), '?'));
    $sql .= " AND c.id_type IN ($placeholders)";
    $params = array_merge($params, $categoriesArray);
}

$stmt = $mysqli->prepare($sql);
$stmt->bind_param(str_repeat('s', count($params)), ...$params);
$stmt->execute();
$result = $stmt->get_result();

$crimes = [];
while ($row = $result->fetch_assoc()) {
    $crimes[] = $row;
}

$stmt->close();
$mysqli->close();

echo json_encode($crimes);
?>