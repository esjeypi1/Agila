<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if file was uploaded
    if (isset($_FILES['data_file']) && $_FILES['data_file']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['data_file'];

        // Check if file is a CSV
        $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (strtolower($file_extension) === 'csv') {
            $uploaded_file = fopen($file['tmp_name'], 'r');
            $existing_file_path = '/home/agila-agatha/htdocs/agila-agatha.com/csv/historical_statistics.csv';
            
            // Check if the existing file is writable
            if (is_writable($existing_file_path)) {
                $existing_file = fopen($existing_file_path, 'a+');

                if ($existing_file) {
                    // Ensure the file pointer is at the end of the file
                    fseek($existing_file, 0, SEEK_END);
                    
                    // Add a newline if the last character is not a newline
                    $stats = fstat($existing_file);
                    if ($stats['size'] > 0) {
                        fseek($existing_file, -1, SEEK_END);
                        $last_char = fgetc($existing_file);
                        if ($last_char !== "\n") {
                            fwrite($existing_file, "\n");
                        }
                    }
                    
                    // Get column headers from existing file
                    rewind($existing_file);
                    $existing_headers = fgetcsv($existing_file);

                    // Get column headers from uploaded file
                    $uploaded_headers = fgetcsv($uploaded_file);

                    // Check if headers match
                    if ($existing_headers === $uploaded_headers) {
                        // Move the file pointer to the end of the file again
                        fseek($existing_file, 0, SEEK_END);

                        // Append uploaded data to existing file
                        while ($row = fgetcsv($uploaded_file)) {
                            fputcsv($existing_file, $row);
                        }
                        echo "File uploaded and appended successfully.";
                    } else {
                        echo "Column headers do not match.";
                    }

                    fclose($existing_file);
                } else {
                    echo "Unable to open the existing CSV file.";
                }
            } else {
                echo "The existing CSV file is not writable.";
            }

            fclose($uploaded_file);
        } else {
            echo "Please upload a CSV file.";
        }
    } else {
        echo "No file uploaded or there was an error uploading the file.";
    }
} else {
    echo "Invalid request method.";
}
?>