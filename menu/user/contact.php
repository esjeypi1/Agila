<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"> 
    <link rel="stylesheet" href="../../styles/navbar_main.css">
    <link rel="stylesheet" href="../../styles/contact_user.css">
         <link rel="icon" sizes="192x192" href="../../images/logo_agila.png">
    <title>AGILA</title>
</head>

<body>
    <div class="box-out">
        <nav class="navbar navbar-expand-lg">
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
        </nav>
        
         <section class="hero-section">
        
            <div class = "right-menu">

                <div class="patterns">
                    <svg width="390%" height="120%">
                        <defs>
                            <style>
                                @import url("https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i");
                            </style>
                        </defs>
                        <text x="69%" y="90%" text-anchor="middle">CONTACT US</text>
                    </svg>
                </div>

            <div class="container1">
                <p class = "p1">Having a problem? Get in touch!</p>
                </div>
                    <div class="center-container">
                        <div class="paste-button">
                            <button class="button">
                                <span style="position: relative; z-index: 1;">Call Us &nbsp; ▼</span>
                            </button>
                            <div class="dropdown-content">
                                <a id="top" href="#">TNT 0985-216-0520</a>
                                <a id="bottom" href="#">Globe 0966-273-8437</a>
                            </div>
                            </div>
                            <div class="paste-button">
                            <button class="button">
                                <span style="position: relative; z-index: 1;">Email Us &nbsp; ▼</span>
                            </button>
                            <div class="dropdown-content">
                                <a id="top" href="#">agathaagila2024@gmail.com</a>
                                <a id="bottom" href="#">2021111207@fit.edu.ph</a>
                            </div>
                        </div>
                    </div>
               
                </div>  

        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
