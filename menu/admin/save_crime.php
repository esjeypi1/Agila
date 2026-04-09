<?php
$conn = require __DIR__ . "/../../scripts/con_db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_barangay = $_POST['barangay'];
    $lat = $_POST['latitude'];
    $lng = $_POST['longitude'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $category_name = $_POST['category'];  // Retrieve selected category name

    // Fetch id_type from category table based on category_name
    $stmt = $conn->prepare("SELECT id_type FROM category WHERE name = ?");
    $stmt->bind_param("s", $category_name);
    $stmt->execute();
    $stmt->bind_result($id_type);
    
    // If category name is found, insert into crime_data table
    if ($stmt->fetch()) {
        $stmt->close();

        $sql = "INSERT INTO crime_data (id_barangay, lat, lng, date, time, id_type) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iddssi", $id_barangay, $lat, $lng, $date, $time, $id_type);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "New record created successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Category not found"]);
    }
}

$conn->close();
?>
