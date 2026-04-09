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
        md.id_type, 
        c.name AS TYPE_NAME, 
        md.COUNT 
    FROM 
        reduced_monthly_data md

    JOIN 
        category c ON md.id_type = c.id_type

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
