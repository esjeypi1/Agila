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
    
    $val = $_SESSION["polygonId"];
    $query = "SELECT * FROM area WHERE id_area = '$val';";
    $mysqli->query($query);
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();

    if($val == 0){
        $table = "SELECT s.id_ps AS station_id, s.num AS station_number, s.name AS station_name, 
                s.lng AS station_lng, s.lat AS station_lat, a.name AS area_name
        		FROM stations s JOIN area a ON s.id_area = a.id_area;";
    } else if($val != 0){
        $table = "SELECT s.id_ps AS station_id, s.num AS station_number, s.name AS station_name, 
        s.lng AS station_lng, s.lat AS station_lat, a.name AS area_name
        FROM stations s JOIN area a ON s.id_area = a.id_area
        WHERE a.id_area = '$val';";
    } else {
        echo "0 results";
    }
    $res_table = $mysqli->query($table);

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
    <link rel="stylesheet" href="../../styles/container_inpage.css"> <!-- Side Menu -->
         <link rel="icon" sizes="192x192" href="../../images/logo_agila.png">

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
                    <a class="logout-btn" href="#">Logout</a>
                    <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" 
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
        </nav> <!-- Navbar (END) -->

        <section class="hero-section"> <!-- Main Menu Container (START) -->

            <div class="main-canvas">
                
                <div class="disp-box">
                    <div class="disp-left col-4">
                        <div class="side-title">
                            <h1 class="place"><?php echo strtoupper($row["name"])?></h1>
                            <h2 class="sub">Place</h2>
                        </div>
                        <div class="side-btn-grp">

                            <form class="form-btn" action="2023_stats.php" method="post">
                                <button class="side-btn-a"><i class='btn-logo bx bxs-book'></i>Information<i class='btn-logo-r bx bx-chevron-down'></i></button><br>
                            </form>

                            <div class="left-btns simple-list-example-scrollspy" id="disp-content">
                                <a class="disp-btn" href="#disp-item-1">Description</a>
                                <a class="disp-btn" href="#disp-item-2">Location</a>
                                <a class="disp-btn" href="#disp-item-3">Police Stations</a>
                            </div>

                            <form class="form-btn" action="
                            <?php if($val == 0){
                                echo "stats.php";
                            }
                            else{
                                echo "stats_area.php";
                            }
                            ?>" method="post">
                                <button class="side-btn" type="submit" name="submit" value="<?php echo $val ?>"><i class='btn-logo bx bxs-bar-chart-alt-2'></i>Statistics</button><br>
                            </form>
                          
                            <form class="form-btn" action="
                            <?php if($val == 0){
                                echo "fcast.php";
                            }
                            else{
                                echo "fcast_area.php";
                            }
                            ?>" method="post">
                                <button class="side-btn" type="submit" name="submit" value="<?php echo $val ?>"><i class='btn-logo bx bxs-timer' ></i>Forecasting</button><br>
                            </form>
                        </div>
                        

                        <form class="b-btn-in" action=
                            "<?php 
                                if($val == 0){
                                    echo "index.php";
                                } else {
                                    echo "area.php";
                                }
                            ?>"
                        method="post">
                            <a class="h-btn-in"><button class="h-btn-c-in" type="submit" name="submit" value='<?php echo $_SESSION['submit'] ?>'><i class='h-btn-logo-in bx bx-arrow-back'></i></button></a>
                        </form>
                    </div>
                    <div class="disp-right col-8">
                        <div data-bs-spy="scroll" data-bs-target="#disp-content" tabindex="0" class="disp-scroll simple-list-example-scrollspy">
                    

                        <h4 class="sub" id="#disp-item-1">Description</h4>
                            <p class="psub">
                                <?php echo $row['info']?>
                            </p>
                        <h4 class="sub" id="disp-item-2">Location</h4>
                            <div class="loc-box">
                                <div class="map-container">
                                    <iframe src="<?php echo $row['url'] ?>" 
                                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    <div class="map-overlay"></div>
                                </div>
                                
                                <div class="desc">
                                    <p class="desc-p"><label class="desc-tx"><i class='tx-icon bx bxs-map'></i>Coordinates:</label> <?php echo $row['lat']?>° N, <?php echo $row['longt']?>° E</p>
                                    <p class="desc-p"><label class="desc-tx"><i class='tx-icon bx bxs-landscape'></i>Area Size (Hectares):</label> <?php echo number_format($row['area_size'],2,".",",")?></p>
                                    <p class="desc-p"><label class="desc-tx"><i class='tx-icon bx bxs-building-house' ></i>Number of Barangays:</label> <?php echo $row['num_bar']?></p>
                                    <p class="desc-p"><label class="desc-tx"><i class='tx-icon bx bxs-universal-access' ></i>Population:</label> <?php echo number_format($row['population'], 0,",")?> (2020 Census)</p>
                                </div>
                            </div>

                        <h4 class="sub" id="disp-item-3">Police Stations</h4>
                          <table id="table" class="table table-striped table-dark table-hover" style="width:100%; max-height: 400px;">
                            <thead>
                            	<tr>
                                  <th scope="col">Station Number</th>
                                  <th scope="col">Area Name</th>
                                  <th scope="col">Station Name</th>
                                  <th scope="col">Longitude</th>
                                  <th scope="col">Latitude</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                if ($res_table->num_rows > 0) {
                                   
                            
                                    // Fetch and display each row of the result set
                                    while ($tab = $res_table->fetch_assoc()) {
                                        echo "<tr>
                                                <td>{$tab['station_number']}</td>
                                                <td>{$tab['area_name']}</td>
                                                <td>{$tab['station_name']}</td>
                                                <td>{$tab['station_lng']}</td>
                                                <td>{$tab['station_lat']}</td>
                                                
                                            </tr>";
                                    }
                            
                                    echo "</table>";
                                } else {
                                    echo "0 results";
                                }
                            ?>
                         </tbody>
						</table>
                                
                            
                        </div>
                    </div>
                </div>
                
            </div>

        </section>
    </div>
    <!-- Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>