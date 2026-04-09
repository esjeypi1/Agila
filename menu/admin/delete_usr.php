<?php
header('Content-Type: application/json');

$mysqli = require __DIR__ . "../../../scripts/con_db.php";


// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Prepare the SQL statement
        $sql = "DELETE FROM user WHERE id = ?";
        $stmt = $mysqli->prepare($sql);

        // Check if preparation is successful
        if ($stmt) {
            $stmt->bind_param("i", $id);

            // Execute the statement
            if ($stmt->execute()) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => $stmt->error]);
            }

            // Close the statement
            $stmt->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => $mysqli->error]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'ID not provided']);
    }

    // Close the connection
    $mysqli->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
