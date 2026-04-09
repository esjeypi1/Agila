<?php
    session_start();
    
    if (isset($_SESSION["user_id"])) {
        
        $mysqli = require __DIR__ . "/../../scripts/con_db.php";
        
        $sql = "SELECT * FROM user
                WHERE id = {$_SESSION["user_id"]}";
                
        $result = $mysqli->query($sql);
        
        $user = $result->fetch_assoc();
    } else {
        header("Location: /../../index.php");
    }

    if (isset($_SESSION["polygonId"])) {
        $polygonId = $_SESSION["polygonId"];
    } else {
        // Handle the error appropriately, e.g., redirect back to the index page
        header("Location: index.php");
        exit;
    }
    
    $val = $_SESSION["polygonId"];
    $query = "
        SELECT area.name AS area_name, area.lat, area.longt 
        FROM area
        WHERE area.id_area = '$val';
    ";
    
    $result = $mysqli->query($query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Now check the stations table
        $stationQuery = "SELECT * FROM stations WHERE id_area = '$val';";
        $stationResult = $mysqli->query($stationQuery);
        
        if ($stationResult->num_rows > 0) {
            $stationRow = $stationResult->fetch_assoc();
        } else {
            // id_area does not exist in stations table
            echo "id_area does not exist in stations table.";
        }
    } else {
        // Handle the case where the area does not exist
        echo "No area found with id_area = $val.";
    }

    $mysqli->close();

?>

<?php
    $var1 = "Murder/Homicide"; $num1 = 6;
    $var2 = "Rape"; $num2 = 2;
    $var3 = "Physical Harm"; $num3 = 4;
    $var4 = "Robbery"; $num4 = 3;
    $var5 = "Theft"; $num5 = 1;
    $var6 = "Kidnapping/Car Jacking";$num6 = 7;
    $var7 = "Cattle Rustling"; $num7 = 4; 

    if($val=="Manila") {
        $num1 = 2;
        $num2 = 1;
        $num3 = 1;
        $num4 = 0;
        $num5 = 4;
        $num6 = 2;
        $num7 = 0;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../styles/navbar_main.css"> <!-- Top Menu -->
    <link rel="stylesheet" href="../../styles/container_page.css"> <!-- Side Menu -->
    <link rel="stylesheet" href="../../styles/fcast_area.css"> <!-- Side Menu -->
         <link rel="icon" sizes="192x192" href="../../images/logo_agila.png">

  
   	<!-- jquery -->
    <script src="http://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>


    <title>AGILA</title>

</head>
<body>
    <div class="box-out">
        <nav class="navbar navbar-expand-lg"> <!-- Navbar (START) -->
            <div class="container-fluid">
                <a class="navbar-brand me-auto" href="../user/index.php"><img src="../../images/logo-full_agila.png" class="logo"></a>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">AGILA</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="about.php">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="contact.php">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="user_prof.php">Account</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="logout-btn" href="../../scripts/logout.php">Logout</a>
                <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" 
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav> <!-- Navbar (END) -->
        
        <section class="hero-section"> <!-- Main Menu Container (START) -->
                
                <div class="side-menu"> <!-- Side Menu (START) -->
                    <div class="side-title">
                        <h1 class="place"><?php echo strtoupper($row['area_name'])?></h1>
                        <h2 class="coor"><?php echo $row['lat']?>, <?php echo $row['longt']?></h2>
                    </div>

                    <div class="side-btn-grp">
                        <form class="form-btn" action="info.php" method="post">
                            <button class="side-btn btn-primary" type="submit" name="submit" >
                            <i class='btn-logo bx bxs-book'></i>Information</button></form>
                      
                      <form class="form-btn" action="stats_area.php" method="post">
                            <button class="side-btn btn-primary" type="submit" name="submit" >
                            <i class='btn-logo bx bxs-timer'></i>Statistics</button></form>
         
                        <form class="form-btn" action="fcast_area.php" method="post">
                            <button class="side-btn btn-primary" type="submit" name="submit" >
                            <i class='btn-logo bx bxs-timer'></i>Forecasting</button></form>
                    </div>

                    <div class="f-btn-grp">
                        
                    </div>

                    <a href="area.php" class="h-btn"><button class="h-btn-c"><i class='h-btn-logo bx bx-arrow-back'></i></button></a>
                    
                    <p class="side-tips">Need some tips on navigating the dashboard? Visit the Contact Us tab </p>
                </div> <!-- Side Menu (END) -->
                
                <div class="map-menu" style = "overflow-x: hidden;"> <!-- Map Menu (START) -->
                   <h3 class="text-shadow" style = "position: relative; top:29px; left: 30px;">Forecasted Data for <?php echo ($stationRow['name']); ?></h3>
                  
                  <!-- Modal HTML -->
                  <div class="modal fade" id="recommendationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" >Recommendation</h5>
                        </div>
                        <div class="modal-body" id="modalBody">

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                                                </div>
                      </div>
                    </div>
                  </div>
                  
                  <p style = "position: relative; top:22px; left: 40%; font-family: 'Arial', sans-serif; font-style: italic; color: black;">Click the graph to view the recommendation strategy. </p>
                  <div class="container_recom">
                    	<div class = "row"> <!--row 1 -->
                           		<div class="flip-cardstats">
                                	<div class="flip-card-inner">
                                    	<div class="flip-card-front">
                                          <div id="chartContainer" style = "overflow-x: hidden;">
                                            <canvas id="crimeChart"></canvas>
                                        </div>
                                         <script>
                                         (async function() {
                                           async function fetchData() {
                                             const response = await fetch('fetch_fcastarea.php'); // Path to your PHP file
                                             if (!response.ok) {
                                               throw new Error('Network response was not ok ' + response.statusText);
                                             }
                                             const jsonData = await response.json();
                                             console.log("Raw JSON data:", jsonData); // Log the raw JSON data

                                             if (!jsonData.length) {
                                               console.error('No data found');
                                               return { labels: [], datasets: [] };
                                             }

                                             const targetArea = <?php echo json_encode($row['area_name']); ?>;
                                             console.log("Target area:", targetArea);

                                             const filteredData = jsonData.filter(row => row.AREA_NAME === targetArea);
                                             console.log("Filtered data (target area):", filteredData);

                                             const crimeCounts = {};

                                             // Collect all unique crime types and initialize crimeCounts
                                             filteredData.forEach(row => {
                                               const typeName = row.TYPE_NAME;
                                               if (!crimeCounts[typeName]) {
                                                 crimeCounts[typeName] = 0;
                                               }
                                               crimeCounts[typeName] += parseInt(row.count, 10);
                                             });

                                             const data = {
                                               labels: Object.keys(crimeCounts),
                                               datasets: [{
                                                 label: 'Crime Types', // This is where the crime types are indicated
                                                 data: Object.values(crimeCounts),
                                                 backgroundColor: Object.keys(crimeCounts).map(() => getRandomColor()),
                                                 borderColor: Object.keys(crimeCounts).map(() => getRandomColor()),
                                                 borderWidth: 1,
                                                 barThickness: 20,
                                                 maxBarThickness: 20
                                               }]
                                             };

                                             console.log("Final data for the chart:", data); // Log final data for the chart

                                             return data;
                                           }

                                           // Function to generate random colors
                                           function getRandomColor() {
                                             const letters = '0123456789ABCDEF';
                                             let color = '#';
                                             for (let i = 0; i < 6; i++) {
                                               color += letters[Math.floor(Math.random() * 16)];
                                             }
                                             return color;
                                           }

                                           // Main function to draw the chart
                                           async function drawChart() {
                                             const data = await fetchData();

                                             const ctx = document.getElementById('crimeChart').getContext('2d');
                                             const crimeChart = new Chart(ctx, {
                                               type: 'bar', // You can change this to 'line', 'pie', etc.
                                               data: {
                                                 labels: data.labels,
                                                 datasets: data.datasets
                                               },
                                               options: {
                                                 responsive: true,
                                                 plugins: {
                                                   legend: {
                                                     labels: {
                                                       font: {
                                                         size: 12 // Adjust font size here
                                                       },
                                                       color: '#000000'
                                                     }
                                                   }
                                                 },
                                                 scales: {
                                                   y: {
                                                     beginAtZero: true,
                                                     ticks: {
                                                       font: {
                                                         size: 11
                                                       },
                                                       color: '#000000'
                                                     }
                                                   },
                                                   x: {
                                                     ticks: {
                                                       font: {
                                                         size: 12
                                                       },
                                                       color: '#000000'
                                                     }
                                                   }
                                                 },
                                                 onClick: (evt, item) => {
                                                   if (item.length > 0) {
                                                     const index = item[0].index;
                                                     const crimeType = data.labels[index];
                                                     const count = data.datasets[0].data[index];
                                                     console.log('Clicked: ', crimeType, count);
                                                     openModal(crimeType);
                                                   }
                                                 }
                                               }
                                             });
                                           }

                                           async function openModal(crimeType) {
                                             const targetArea = <?php echo json_encode($row['area_name']); ?>;
                                             const response = await fetch(`reco.php?targetArea=${encodeURIComponent(targetArea)}&crimeType=${encodeURIComponent(crimeType)}`);
                                             const response2= await fetch(`reco_hours.php?crimeType=${encodeURIComponent(crimeType)}`);
                                             const data = await response.json();
                                             const data2 = await response2.json();
                                             const recommendation = data.recommendation;
                                             const recommendation2 = data.recommendation2;
                                             const hours = data2.hours;

                                             const modalBody = document.getElementById('modalBody');
                                             modalBody.innerText = `Crime Type: ${crimeType}\n
                                                                    Recommendation (Regular Hours): ${recommendation}\n
                                                                    Recommendation (Peak Hours): ${recommendation2}
																	${hours}`;

                                             const recommendationModal = new bootstrap.Modal(document.getElementById('recommendationModal'));
                                             recommendationModal.show();
                                           }

                                           drawChart();
                                         })();

                                          </script>
                                      	</div>
                                    </div>
                                </div>
                        </div>
                	</div>

                </div> <!-- Map Menu (END) -->
          
        </section> <!-- Main Menu Container (END) -->
    


    <!-- Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="../../scripts/js/maps_solo.js" defer></script>
    </div>
</body>
</html>