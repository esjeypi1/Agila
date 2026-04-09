<?php

header('Content-Type: application/json');
$mysqli = require __DIR__ . "/con_db.php";

// Retrieve the date range and time range from the query parameters
$fromDate = $_GET['fromDate'] ?? '';
$toDate = $_GET['toDate'] ?? '';
$fromTime = $_GET['fromTime'] ?? '';
$toTime = $_GET['toTime'] ?? '';
$categories = $_GET['categories'] ?? '';

$sql = "SELECT lat, lng FROM crime_data WHERE 1=1";

if ($fromDate && $toDate) {
    $sql .= " AND date BETWEEN '$fromDate' AND '$toDate'";
}
if ($fromTime && $toTime) {
    $sql .= " AND time BETWEEN '$fromTime' AND '$toTime'";
}
if ($categories) {
    $categoriesArray = explode(',', $categories);
    $categoriesList = implode(',', array_map('intval', $categoriesArray));
    $sql .= " AND id_type IN ($categoriesList)";
}

$result = $mysqli->query($sql);

$crime_data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $crime_data[] = array(
            "lat" => $row["lat"],
            "lng" => $row["lng"]
        );
    }
}

$mysqli->close();

echo json_encode($crime_data);

?>