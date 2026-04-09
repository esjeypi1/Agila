<?php
$conn = require __DIR__ . "/../../scripts/con_db.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
    SELECT 
        fc.id_area,
        fc.id_type,
        a.name AS AREA_NAME,
        c.name AS TYPE_NAME, 
        fc.count 
    FROM 
        forecasted_crimes fc
    JOIN 
        area a ON fc.id_area = a.id_area
    JOIN 
        category c ON fc.id_type = c.id_type

";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
