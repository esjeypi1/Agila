<?php
session_start();
$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $mysqli = require __DIR__ . "../../../scripts/con_db.php";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $uploadedFile = $_FILES['image']['name'];

    // Handle file upload
    if ($uploadedFile) {
        $targetDir = "uploads/";
        $targetFilePath = $targetDir . basename($uploadedFile);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            // Update user information in the database
            $sql = "UPDATE image='$targetFilePath' WHERE name='{$_SESSION['name']}'";
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to upload file.';
            echo json_encode($response);
            exit();
        }
    } else {
        // Update user information without file upload
        $sql = "UPDATE user SET name='$name', email='$email' WHERE name='{$_SESSION['name']}'";
    }

    if ($mysqli->query($sql) === TRUE) {
        $response['status'] = 'success';
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error updating record: ' . $mysqli->error;
    }

    $mysqli->close();
    echo json_encode($response);

    
}
?>
