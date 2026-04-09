<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- data table link -->
    <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href = "https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
        
    <script src="http://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdn.datatables.net/2.0.8/js/jquery.dataTables.min.js"></script>
  
    <!-- Google Fonts/Logo -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../styles/navbar_main.css"> <!-- Top Menu -->
    <link rel="stylesheet" href="../../styles/container_admin.css"> <!-- Side Menu -->
    <link rel="icon" sizes="192x192" href="../../images/logo_agila.png">

   
    <title>AGILA</title>

    <!-- data table script -->
    <script defer src = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src = "https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script defer src = "https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>

</head>
<body>
    <div class="pwet">
            <nav class="navbar navbar-expand-lg"> <!-- Navbar (START) -->
                <div class="container-fluid">
                    <a class="navbar-brand me-auto" href="index2.php"><img src="../../images/logo-full_agila.png" class="logo"></a>
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
                                    <a class="nav-link mx-lg-2" href="profile.php">Account</a>
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
                    
                    <div class="left-menu"> <!-- Side Menu (START) -->
                        
                        <div class="side-btns">
                            <a class="s-btn" href="hist.php"><i class='bx bx-book-content'></i>Contents</a>
                            <a class="s-btn" href="user.php"><i class='bx bx-user' ></i>User</a>
                            <a class="s-btn" href="crime.php"><i class='bx bxs-report'></i>Crime</a>
                            <a class="s-btn" href="dist.php"><i class='bx bx-map-alt'></i>District</a>
                            <a class="as-btn" href="audit.php"><i class='bx bx-history'></i>Audit Log</a>
                          	<a class="s-btn" href="ps.php"><span class="material-symbols-outlined">local_police</span>Stations</a>
                            
                        </div>
                        <div class = "sidenav-footer">
                            <div class="text-center ps-3">Logged In as:
                                <?php
                            // Check if admin is logged in
                            if(isset($_SESSION['name'])) {
                                // Display the admin's name
                                echo "<p class='text-start fs-6'>" . $_SESSION['name'] . "</p>";
                            } else {
                                // If no admin is logged in, display default message
                                echo "<p class='text-start m-0'>Not logged in</p>";
                            }
                            ?>
                            </div>
                        </div>

                        <div class="h-btn">
                            <a type="button" class="btn btn-primary" href="index2.php"><span class="h-btn-logo material-symbols-outlined">arrow_back_ios_new</span></a>
                        </div>
                    </div> <!-- Side Menu (END) -->
                    
                    <div class="right-menu"> <!-- Right Canvas (START) -->
                    <div class="patterns">
                            <svg width="360%" height="120%">
                                <defs>
                                    <style>
                                        @import url("https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i");
                                    </style>
                                </defs>
                                <text x="620px" y="150px" text-anchor="middle">Audit Logs</text>
                            </svg>
                        </div>
                            
                        <div class = "container">
                        <table id="table" class="table table-striped table-bordered table-hover" style="width:100%; max-height: 400px; overflow-y: auto;">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">ACTION</th>
                                        <th scope="col">ITEM TYPE</th>
                                        <th scope="col">ITEM ID</th>
                                        <th scope="col">DETAILS</th>
                                        <th scope="col">TIMESTAMP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $mysqli = require __DIR__ . "../../../scripts/con_db.php";

                                    $sql = "
                                        SELECT 
                                            id, 
                                            action, 
                                            item_type, 
                                            item_id, 
                                            details, 
                                            timestamp
                                        FROM 
                                            audit_trail
                                    ";

                                    $result = $mysqli->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr data-id='{$row['id']}'>";
                                            echo "<td>{$row['id']}</td>";
                                            echo "<td>{$row['action']}</td>";
                                            echo "<td>{$row['item_type']}</td>";
                                            echo "<td>{$row['item_id']}</td>";
                                            echo "<td>{$row['details']}</td>";
                                            echo "<td>{$row['timestamp']}</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>0 results</td></tr>";
                                    }

                                    $mysqli->close();
                                    ?>
                                </tbody>
                                
                            </table>

                        </div>
                        
                    </div> <!-- Right Canvas (END) -->
                    
            </section> <!-- Main Menu Container (END) -->
    


    <!-- Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    </div>

    <script type = "text/javascript">
        $(document).ready(
        function() {
            var table = $('#table').DataTable({
                "scrollY": "300px",
                "scrollCollapse": true,
                "paging": true,
                "lengthMenu": [8, 16, 24, 32, { label: 'All', value: -1 }]
            });
        });
    </script>

</body>
</html>