<?php
    header('Content-Type: application/json');

    $mysqli = require __DIR__ . "/con_db.php";

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM stations WHERE id_ps = $id";
        $result = $mysqli->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode($row);
        } else {
            echo json_encode([]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'id parameter is missing']);
    }

    $mysqli->close();
?>