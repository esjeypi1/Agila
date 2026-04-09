<?php
$conn = require __DIR__ . "/../../scripts/con_db.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$targetArea = $_GET['targetArea'] ?? '';
$crimeType = $_GET['crimeType'] ?? '';

// Map crime types to columns in the intensity table
$crimeTypeMapping = [
    'Murder' => 'MURDER',
    'Homicide' => 'HOMICIDE',
    'Theft' => 'THEFT',
    'Robbery' => 'ROBBERY',
    'Rape' => 'RAPE',
    'Carnapping (Vehicle)' => 'CARNAPPING_MV',
    'Carnapping (Motorcycle)' => 'CARNAPPING_MC',
    'Physical Injury' => 'PHYSICAL_INJURIES'
];

// Get the corresponding column name for the crime type
$crimeTypeColumn = $crimeTypeMapping[$crimeType] ?? '';

if ($crimeType) {
    $sql = "
        SELECT 
            CASE 
                WHEN i.$crimeTypeColumn = 1 THEN r.low_intensity
                WHEN i.$crimeTypeColumn = 2 THEN r.medium_intensity
                WHEN i.$crimeTypeColumn = 3 THEN r.high_intensity
            END AS recommendation
        FROM 
            intensity i
        JOIN 
            area a ON i.id_area = a.id_area
        JOIN 
            recommend r ON r.focus_crimes = ?
        WHERE 
            a.name = ?
    ";
  
    $sql2 = "
        SELECT 
            CASE 
                WHEN i.$crimeTypeColumn = 1 THEN r.medium_intensity
                WHEN i.$crimeTypeColumn = 2 THEN r.high_intensity
                WHEN i.$crimeTypeColumn = 3 THEN r.high_intensity
            END AS recommendation2
        FROM 
            intensity i
        JOIN 
            area a ON i.id_area = a.id_area
        JOIN 
            recommend r ON r.focus_crimes = ?
        WHERE 
            a.name = ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $crimeType, $targetArea); 
    $stmt->execute();
    $result = $stmt->get_result();
  
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param('ss', $crimeType, $targetArea); 
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    $data = [];
    if ($result->num_rows > 0 && $result2->num_rows > 0) {
        $row1 = $result->fetch_assoc();
        $row2 = $result2->fetch_assoc();
        $data = [
            'recommendation' => $row1['recommendation'],
            'recommendation2' => $row2['recommendation2']
        ];
    } else {
        echo json_encode(["error" => "No results found"]);
        exit;
    }
    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo json_encode(["error" => "Invalid crime type"]);
}

?>
