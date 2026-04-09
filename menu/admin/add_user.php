<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$mysqli = require __DIR__ . "../../../scripts/con_db.php";

try {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_type = $_POST['user_type'];
    
    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileName = basename($_FILES['image']['name']);
        $filePath = $uploadDir . $fileName;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
            throw new Exception("Failed to move uploaded file.");
        }

        $imagePath = 'uploads/' . $fileName; // Store relative path in the database
    } else {
        throw new Exception("Image upload failed: " . $_FILES['image']['error']);
    }

    // Prepare and bind
    if (!$stmt = $mysqli->prepare("INSERT INTO user (name, email, password_hash, user_type, image) VALUES (?, ?, ?, ?, ?)")) {
        throw new Exception("Prepare statement failed: " . $mysqli->error);
    }

    if (!$stmt->bind_param("sssss", $name, $email, $password, $user_type, $imagePath)) {
        throw new Exception("Bind parameters failed: " . $stmt->error);
    }

    if (!$stmt->execute()) {
        throw new Exception("Execute statement failed: " . $stmt->error);
    }

    echo json_encode(['status' => 'success']);

} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

if (isset($stmt) && $stmt !== false) {
    $stmt->close();
}
$mysqli->close();
?>
