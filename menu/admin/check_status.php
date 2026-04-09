<?php
session_start();
if (isset($_SESSION['script_status'])) {
    echo $_SESSION['script_status'];
} else {
    echo 'not_started';
}
?>
