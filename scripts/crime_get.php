<?php
header('Content-Type: application/json');

$mysqli = require __DIR__ . "/con_db.php";
$endYear = $_GET['endYear'];
$endQuarter = $_GET['endQuarter'];

// Debug: Output the end year and quarter
error_log("End Year: $endYear, End Quarter: $endQuarter");

$query = $mysqli->prepare("SELECT id_area, 
                        SUM(murder) AS murder, 
                        SUM(homicide) AS homicide, 
                        SUM(physical_injuries) AS physical_injuries, 
                        SUM(rape) AS rape, 
                        SUM(robbery) AS robbery, 
                        SUM(theft) AS theft, 
                        SUM(carnapping_mv) AS carnapping_mv, 
                        SUM(carnapping_mc) AS carnapping_mc,
                        COUNT(DISTINCT station) AS station_count
                        FROM crime 
                        WHERE (year < ?) OR (year = ? AND quarter <= ?)
                        GROUP BY id_area");

$query->bind_param('iis', $endYear, $endYear, $endQuarter);
$query->execute();
$result = $query->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    // Debug: Output each row
    error_log("Row: " . print_r($row, true));

    $id_area = $row['id_area'];
    $station_count = $row['station_count'];

    $data[$id_area] = [
        'murder' => $row['murder'] / $station_count,
        'homicide' => $row['homicide'] / $station_count,
        'physical_injuries' => $row['physical_injuries'] / $station_count,
        'rape' => $row['rape'] / $station_count,
        'robbery' => $row['robbery'] / $station_count,
        'theft' => $row['theft'] / $station_count,
        'carnapping_mv' => $row['carnapping_mv'] / $station_count,
        'carnapping_mc' => $row['carnapping_mc'] / $station_count,
        'total' => ($row['murder'] + $row['homicide'] + $row['physical_injuries'] + $row['rape'] + $row['robbery'] + $row['theft'] + $row['carnapping_mv'] + $row['carnapping_mc']) / $station_count,
    ];
}

// Debug: Output the cumulative data
error_log("Cumulative Data: " . print_r($data, true));

echo json_encode($data);
?>
