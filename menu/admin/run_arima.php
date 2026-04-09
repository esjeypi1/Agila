<?php
session_start();
// Set the script to continue running even if the user closes the browser
ignore_user_abort(true);

// Set the time limit to unlimited
set_time_limit(0);

// Indicate that the script is running
$_SESSION['script_status'] = 'running';

$pythonScript = '/home/agila-agatha/htdocs/agila-agatha.com/scripts/arimaModel_revision.py';
$output = shell_exec("python3 $pythonScript");

// Check if the script ran successfully
if ($output === null) {
    $_SESSION['script_status'] = 'error';
    echo "There was an error running the forecast. Please try again.";
} else {
    $_SESSION['script_status'] = 'completed';
    echo "The forecasting has been completed successfully.";
}
?>
