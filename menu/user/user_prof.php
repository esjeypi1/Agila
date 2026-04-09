<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"> 
    <link rel="stylesheet" href="../../styles/navbar_main.css"> <!-- Top Menu -->
    <link rel="stylesheet" href="../../styles/container_main.css"> <!-- Side Menu -->
    <link rel="stylesheet" href="../../styles/profile.css">
         <link rel="icon" sizes="192x192" href="../../images/logo_agila.png">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/3pSDaW5W4h5c5M5e7b4G68c8m3q95o8M3B8j4" crossorigin="anonymous"></script>

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

                    <div class="h-btn">
                        <a type="button" class="btn btn-primary" href="index.php"><span class="h-btn-logo material-symbols-outlined">arrow_back_ios_new</span></a>
                    </div>
                    
                    <p class="side-tips">Need some tips on navigating the dashboard? Visit the Contact Us tab </p>
            </div> <!-- Side Menu (END) -->
            
            <div class="right-menu"> <!-- Right Canvas (START) -->
                    <svg width="400%" height="150%">
                        <defs>
                            <style>
                                @import url("https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i");
                            </style>
                        </defs>
                        <text x="64%" y="16.8%" text-anchor="middle" style="font-size: 80px;">User</text>
                        <text x="62%" y="20%" text-anchor="middle" style="font-size: 20px;">Profile</text>
                    </svg>
                
                <div class="horizontal_line"></div>

                <div class="container_recom">
                    <div class="card">
                            <div class="card__img"><svg xmlns="http://www.w3.org/2000/svg" width="100%"><rect fill="#ffffff" width="540" height="450"></rect><defs><linearGradient id="a" gradientUnits="userSpaceOnUse" x1="0" x2="0" y1="0" y2="100%" gradientTransform="rotate(222,648,379)"><stop offset="0" stop-color="#ffffff"></stop><stop offset="1" stop-color="#FC726E"></stop></linearGradient><pattern patternUnits="userSpaceOnUse" id="b" width="300" height="250" x="0" y="0" viewBox="0 0 1080 900"><g fill-opacity="0.5"><polygon fill="#444" points="90 150 0 300 180 300"></polygon><polygon points="90 150 180 0 0 0"></polygon><polygon fill="#AAA" points="270 150 360 0 180 0"></polygon><polygon fill="#DDD" points="450 150 360 300 540 300"></polygon><polygon fill="#999" points="450 150 540 0 360 0"></polygon><polygon points="630 150 540 300 720 300"></polygon><polygon fill="#DDD" points="630 150 720 0 540 0"></polygon><polygon fill="#444" points="810 150 720 300 900 300"></polygon><polygon fill="#FFF" points="810 150 900 0 720 0"></polygon><polygon fill="#DDD" points="990 150 900 300 1080 300"></polygon><polygon fill="#444" points="990 150 1080 0 900 0"></polygon><polygon fill="#DDD" points="90 450 0 600 180 600"></polygon><polygon points="90 450 180 300 0 300"></polygon><polygon fill="#666" points="270 450 180 600 360 600"></polygon><polygon fill="#AAA" points="270 450 360 300 180 300"></polygon><polygon fill="#DDD" points="450 450 360 600 540 600"></polygon><polygon fill="#999" points="450 450 540 300 360 300"></polygon><polygon fill="#999" points="630 450 540 600 720 600"></polygon><polygon fill="#FFF" points="630 450 720 300 540 300"></polygon><polygon points="810 450 720 600 900 600"></polygon><polygon fill="#DDD" points="810 450 900 300 720 300"></polygon><polygon fill="#AAA" points="990 450 900 600 1080 600"></polygon><polygon fill="#444" points="990 450 1080 300 900 300"></polygon><polygon fill="#222" points="90 750 0 900 180 900"></polygon><polygon points="270 750 180 900 360 900"></polygon><polygon fill="#DDD" points="270 750 360 600 180 600"></polygon><polygon points="450 750 540 600 360 600"></polygon><polygon points="630 750 540 900 720 900"></polygon><polygon fill="#444" points="630 750 720 600 540 600"></polygon><polygon fill="#AAA" points="810 750 720 900 900 900"></polygon><polygon fill="#666" points="810 750 900 600 720 600"></polygon><polygon fill="#999" points="990 750 900 900 1080 900"></polygon><polygon fill="#999" points="180 0 90 150 270 150"></polygon><polygon fill="#444" points="360 0 270 150 450 150"></polygon><polygon fill="#FFF" points="540 0 450 150 630 150"></polygon><polygon points="900 0 810 150 990 150"></polygon><polygon fill="#222" points="0 300 -90 450 90 450"></polygon><polygon fill="#FFF" points="0 300 90 150 -90 150"></polygon><polygon fill="#FFF" points="180 300 90 450 270 450"></polygon><polygon fill="#666" points="180 300 270 150 90 150"></polygon><polygon fill="#222" points="360 300 270 450 450 450"></polygon><polygon fill="#FFF" points="360 300 450 150 270 150"></polygon><polygon fill="#444" points="540 300 450 450 630 450"></polygon><polygon fill="#222" points="540 300 630 150 450 150"></polygon><polygon fill="#AAA" points="720 300 630 450 810 450"></polygon><polygon fill="#666" points="720 300 810 150 630 150"></polygon><polygon fill="#FFF" points="900 300 810 450 990 450"></polygon><polygon fill="#999" points="900 300 990 150 810 150"></polygon><polygon points="0 600 -90 750 90 750"></polygon><polygon fill="#666" points="0 600 90 450 -90 450"></polygon><polygon fill="#AAA" points="180 600 90 750 270 750"></polygon><polygon fill="#444" points="180 600 270 450 90 450"></polygon><polygon fill="#444" points="360 600 270 750 450 750"></polygon><polygon fill="#999" points="360 600 450 450 270 450"></polygon><polygon fill="#666" points="540 600 630 450 450 450"></polygon><polygon fill="#222" points="720 600 630 750 810 750"></polygon><polygon fill="#FFF" points="900 600 810 750 990 750"></polygon><polygon fill="#222" points="900 600 990 450 810 450"></polygon><polygon fill="#DDD" points="0 900 90 750 -90 750"></polygon><polygon fill="#444" points="180 900 270 750 90 750"></polygon><polygon fill="#FFF" points="360 900 450 750 270 750"></polygon><polygon fill="#AAA" points="540 900 630 750 450 750"></polygon><polygon fill="#FFF" points="720 900 810 750 630 750"></polygon><polygon fill="#222" points="900 900 990 750 810 750"></polygon><polygon fill="#222" points="1080 300 990 450 1170 450"></polygon><polygon fill="#FFF" points="1080 300 1170 150 990 150"></polygon><polygon points="1080 600 990 750 1170 750"></polygon><polygon fill="#666" points="1080 600 1170 450 990 450"></polygon><polygon fill="#DDD" points="1080 900 1170 750 990 750"></polygon></g></pattern></defs><rect x="0" y="0" fill="url(#a)" width="100%" height="100%"></rect><rect x="0" y="0" fill="url(#b)" width="100%" height="100%"></rect></svg></div>
                                <div class="card__avatar">
                                    <svg viewBox="0 0 128 128">
                                        <circle cx="64" cy="64" r="64" fill="url(#pattern1)"/>
                                            <defs>
                                                <?php
                                                    $mysqli = require __DIR__ . "../../../scripts/con_db.php";

                                                    $name = $_SESSION['name'];
                                                    $sql = "SELECT image FROM user WHERE name='$name'";
                                                    $result = $mysqli->query($sql);
                                                    $row = $result->fetch_assoc();
                                                    $image_data = $row['image'] ? 'data:image/jpeg;base64,' . base64_encode($row['image']) : 'https://via.placeholder.com/150';
                                                ?>
                                                <pattern id="pattern1" patternUnits="userSpaceOnUse" width="100%" height="100%">
                                                    <image href="<?php echo $image_data;?>" x="0" y="0" width="128" height="128"/> <!--placeholder -->
                                                </pattern>
                                            </defs>
                                    </svg>
                                </div> 
                                    <h2 id="card-title" class="card__title"><?php 
                                        if(isset($_SESSION['name'])) {
                                            echo $_SESSION['name'];
                                        } else {
                                            echo "Not logged in";
                                        }
                                    
                                    ?></h2>
                                    <p id="card-subtitle" class="card__description text-white">User</p>

                                    <div class="card__wrapper">
                                        <a class="btn btn-light" href="edit_usr_prof.php">Edit</a>
                                      <!--  <button class="card__btn upload-btn">Upload</button> -->
                                    </div>
                                   <!-- <form id="uploadForm" action="upld_prof.php" method="POST" enctype="multipart/form-data">
                                        <input type="file" id="fileInput" name="image" accept="image/*" style="display: none;" />
                                    </form>
                                    <script>
                                        document.querySelector('.upload-btn').addEventListener('click', function () {
                                            document.getElementById('fileInput').click();
                                        });

                                        document.getElementById('fileInput').addEventListener('change', function () {
                                            this.form.submit();
                                        });
                                    </script> -->
                    </div>
                </div> 

            </div> <!-- Right Canvas (END) -->
        </section> <!-- Main Menu Container (END) -->
    </div>
</body>
</html>