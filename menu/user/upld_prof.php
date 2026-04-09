<?php
session_start();
$mysqli = require __DIR__ . "../../../scripts/con_db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $name = $_SESSION['name'];
    $image = $_FILES['image']['tmp_name'];
    $imgData = file_get_contents($image);
    $imgData = $mysqli->real_escape_string($imgData);

    $sql = "UPDATE user SET image='$imgData' WHERE name='$name'";

    if ($mysqli->query($sql) === TRUE) {
        echo "Profile picture updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();

    header("Location: user_prof.php");
    exit();
}
?>
