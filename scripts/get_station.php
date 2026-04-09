<?php
  header('Content-Type: application/json');
  $mysqli = require __DIR__ . "/con_db.php";

  // SQL query to fetch data
  $sql = "SELECT id_ps, lat, lng, name, num FROM stations";
  $result = $mysqli->query($sql);

  $stations = array();

  if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
          $station = array(
              "position" => array(
                  "lat" => floatval($row["lat"]),
                  "lng" => floatval($row["lng"]),
                  "id" => intval($row["id_ps"])
              ),
              "title" => $row["name"],
              "num" => intval($row["num"])
          );
          $stations[] = $station;
      }
  } else {
      echo "0 results";
  }
  $mysqli->close();

  // Convert to JSON
  echo json_encode($stations);
?>