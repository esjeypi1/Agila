<?php
$conn = require __DIR__ . "/../../scripts/con_db.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
    SELECT 
        md.YEAR, 
        md.MONTH,  
        md.TYPE_ID,
        md.AREA_ID,
        a.name AS AREA_NAME,
        c.name AS TYPE_NAME, 
        md.COUNT 
    FROM 
        monthly_data md
    JOIN 
        area a ON md.AREA_ID = a.id_area
    JOIN 
        category c ON md.TYPE_ID = c.id_type

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
