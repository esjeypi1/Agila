<?php
$conn = require __DIR__ . "/con_db.php";

if (isset($_GET['id'])) {
    $station_id = intval($_GET['id']);
    $sql = "SELECT
                r.id_crime,
                r.focus_crimes,
                il_low.intensity_name AS low_intensity,
                il_medium.intensity_name AS medium_intensity,
                il_high.intensity_name AS high_intensity
            FROM
                recommend r
            LEFT JOIN
                intensity_levels il_low ON r.low_intensity = il_low.intensity_name
            LEFT JOIN
                intensity_levels il_medium ON r.medium_intensity = il_medium.intensity_name
            LEFT JOIN
                intensity_levels il_high ON r.high_intensity = il_high.intensity_name
            JOIN
                intensity ON intensity.STATION_ID = r.id_crime
            WHERE
                intensity.STATION_ID = $station_id";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    } else {
        echo json_encode([]);
    }
} else {
    echo json_encode(['error' => 'No station ID provided']);
}

$conn->close();
?>
