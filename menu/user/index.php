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

$_SESSION["polygonId"] = $val = 0;
$query = "SELECT * FROM area WHERE id_area = '$val';";
$mysqli->query($query);
$result = $mysqli->query($query);
$row = $result->fetch_assoc();

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../../styles/navbar_main.css"> <!-- Top Menu -->
    <link rel="stylesheet" href="../../styles/container_main_index.css"> <!-- Side Menu -->

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
                <a class="logout-btn" href="../../index.php">Logout</a>
                <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" 
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav> <!-- Navbar (END) -->
        
        <section class="hero-section"> <!-- Main Menu Container (START) -->
                
                <div class="side-menu"> <!-- Side Menu (START) -->
                    <div class="side-title">
                        <h1 class="place">MANILA</h1>
                        <h2 class="coor">14.5995, 120.9842</h2>
                    </div>
                    <div class="side-btn-grp">
                        <form class="form-btn" action="info.php" method="post">
                            <button class="side-btn" type="submit" name="submit" value="0"><i class='btn-logo bx bxs-book'></i>Information</button><br>
                        </form>
                        <form class="form-btn" action="stats.php" method="post">
                            <button class="side-btn" type="submit" name="submit" value="0"><i class='btn-logo bx bxs-bar-chart-alt-2'></i>Statistics</button><br>
                        </form>
                        <form class="form-btn" action="fcast.php" method="post">
                            <button class="side-btn" type="submit" name="submit" value="0"><i class='btn-logo bx bxs-timer' ></i>Forecasting</button><br>
                        </form>
                    </div>
                    
                    <p class="side-tips">Need some tips on navigating the dashboard? Visit the Contact Us tab </p>
                </div> <!-- Side Menu (END) -->
                
                <div class="map-menu"> <!-- Map Menu (START) -->
                    <div id="map" class="map"></div>

                <!-- Hidden form for submitting polygon ID -->
                <form id="polygonForm" action="/../../scripts/process.php" method="POST" style="display:none;">
                    <input type="hidden" name="polygonId" id="polygonId">
                </form>
                    
                    <div class="bot-menu">
                        <div class="filters">
                            <h2 class="title">FILTERS: </h2>
                            <div class="btn-group dropup">
                                <button type="button" class="btn-filt" data-bs-toggle="dropdown" aria-expanded="false">
                                    TIMELINE
                                </button>
                                <ul class="dropdown-menu" style="padding: 7px;">
                                    <li>
                                        <label for="fromDate">From Date:</label>
                                        <input type="date" id="fromDate">

                                        <label for="toDate">To Date:</label>
                                        <input type="date" id="toDate">
                                    </li>
                                    <li>
                                        <label for="fromTime">From Time:</label>
                                        <input type="time" id="fromTime">

                                        <label for="toTime">To Time:</label>
                                        <input type="time" id="toTime">
                                    </li>
                                </ul>
                            </div>

                            <div class="btn-group dropup">
                                <button type="button" class="btn-filt" data-bs-toggle="dropdown" aria-expanded="false">
                                    CATEGORY
                                </button>
                                <ul class="dropdown-menu" style="padding: 7px;">
                                    <?php

                                    $cat = "SELECT * FROM category";
                                    $result = $mysqli->query($cat);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                             echo '<li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name ="category" type="checkbox" value="'. htmlspecialchars($row['id_type']).'" id="flexCheckChecked" checked>
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            ' . htmlspecialchars($row['name']) . '
                                                        </label>
                                                    </div>
                                                  </li>';
                                        }
                                    } else {
                                        echo '<li>No categories found.</li>';
                                    }

                                    $mysqli->close();
                                    ?>
                                </ul>
                            </div>
                            
                            <button id="filterButton"><span class="material-symbols-outlined">check</span></button>
                        </div>

                        <div class="legend">
                            <h2 class="title">LEGENDS: </h2>
                            <div class="color-box">
                                <div class="c1"></div>
                                <p class="desc"> LOW </p>
                            </div>
                            <div class="color-box">
                                <div class="c2"></div>
                                <p class="desc"> MODERATE </p>
                            </div>
                            <div class="color-box">
                                <div class="c3"></div>
                                <p class="desc"> HIGH </p>
                            </div>
                        </div>
                    </div>
                </div> <!-- Map Menu (END) -->
        </section> <!-- Main Menu Container (END) -->
    
        
    </div>

    <!-- Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="../../scripts/js/maps.js"></script> <!-- Maps Javascript -->

</body>
</html>