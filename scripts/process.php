<?php
session_start();

// Script for passing the values to display.php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["polygonId"])) {
    $polygonId = intval($_POST["polygonId"]);
    $_SESSION["polygonId"] = $polygonId;
    header("Location: /../menu/user/area.php");
    exit();
}
?>
