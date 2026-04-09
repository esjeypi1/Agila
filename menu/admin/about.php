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
    <link rel="stylesheet" href="../../styles/navbar_main.css">
    <link rel="stylesheet" href="../../styles/about.css">
    <link rel="icon" sizes="192x192" href="../../images/logo_agila.png">

    <title>AGILA</title>
</head>

<body>
    <div class="pwet">
        <nav class="navbar navbar-expand-lg">
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
        </nav>
        
        <section class="hero-section">
            <div class="left-menu">
                <div class="side-btns">
                    <a class="s-btn" href="hist.php"><i class='bx bx-book-content'></i>Contents</a>
                    <a class="s-btn" href="user.php"><i class='bx bx-user' ></i>User</a>
                    <a class="s-btn" href="crime.php"><i class='bx bxs-report'></i>Crime</a>
                    <a class="s-btn" href="dist.php"><i class='bx bx-map-alt'></i>District</a>
                    <a class="s-btn" href="audit.php"><i class='bx bx-history'></i>Audit Log</a>
                </div>
                <div class = "sidenav-footer">
                            <div class="text-center ps-3">Logged In as:
                                <!--admin variable --><p class = "text-start m-0"><?php
                            // Check if admin is logged in
                            if(isset($_SESSION['name'])) {
                                // Display the admin's name
                                echo "<p class='text-start fs-6'>" . $_SESSION['name'] . "</p>";
                            } else {
                                // If no admin is logged in, display default message
                                echo "<p class='text-start m-0'>Not logged in</p>";
                            }
                            ?></p>
                            </div>
                        </div>

                <div class="h-btn">
                    <a type="button" class="btn btn-primary" href="index2.php"><span class="h-btn-logo material-symbols-outlined">arrow_back_ios_new</span></a>
                </div>
            </div>
            
            <!--right -->
            <div class = "right-menu">
                <div class="patterns">
                    <svg width="360%" height="120%">
                        <defs>
                            <style>
                                @import url("https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i");
                            </style>
                        </defs>
                        <text x="59.8%" y="155px" text-anchor="middle">Agila</text>
                    </svg>
                </div>
    
                <div class="container1">
    
                    <div id="light">
                        <div id="lineh1"></div>
                    </div>
    
                </div>
    
                 <div class="container_card2">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                              <h1 class="text-shadow"> Specification </h1>
                                    <div class="tags"></div>
                            </svg>
                            </div>
                            <div class="flip-card-back" style="border: 1px solid; border-color: #6cd2f4";>
                            <p class="text fw-bold" style="margin-left: 10px; margin-right:10px; color: #37a0cf;";>Employing Knowledge-Based Recommendations in Crime Mapping for Manila City with ARIMA Forecasting Algorithm Integration</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="container_card1">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                            <h1 class="text-shadow"> Description </h1>
                                    <div class="tags"></div>
                            </svg>
                            </div>
                            <div class="flip-card-back" style="border: 1px solid; border-color: #6cd2f4";>
                            <p class="text fw-bold" style="margin-left: 10px; margin-right:10px; color: #37a0cf;";>Agila seeks to address Manila City's crime challenges by providing a proactive, data-driven approach to crime mapping and prevention, aligning with global trends and research findings.</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="container_card3">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                            <h1 class="text-shadow"> Background </h1>
                                    <div class="tags"></div>
                            </svg>
                            </div>
                            <div class="flip-card-back" style="border: 1px solid; border-color: #6cd2f4";>
                            <p class="text fw-bold" style="margin-left: 10px; margin-right:10px; color: #37a0cf;";>Agila was originally a system created by the students of FEU - Institute of technology as partial requirement for completion, in partnership with the Directorate for Investigation and Detective Management of the Philippines</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="container_right">
                    <div class="btn-conteiner">
                        <a href="agatha.php" class="btn-content">
                            <span class="icon-arrow">
                                <svg
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    xmlns="http://www.w3.org/2000/svg"
                                    version="1.1"
                                    viewBox="0 0 66 43"
                                    height="30px"
                                    width="30px"
                                >
                                    <g
                                    fill-rule="evenodd"
                                    fill="none"
                                    stroke-width="1"
                                    stroke="none"
                                    id="arrow"
                                    >
                                    <path
                                        fill="#9ee5fa"
                                        d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z"
                                        id="arrow-icon-one"
                                    ></path>
                                    <path
                                        fill="#9ee5fa"
                                        d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z"
                                        id="arrow-icon-two"
                                    ></path>
                                    <path
                                        fill="#9ee5fa"
                                        d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z"
                                        id="arrow-icon-three"
                                    ></path>
                                    </g>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
    
                <div class="container_left">
                    <div class="btn-conteiner">
                        <a href="didm.php" class="btn-content">
                            <span class="icon-arrow">
                                <svg
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    xmlns="http://www.w3.org/2000/svg"
                                    version="1.1"
                                    viewBox="0 0 66 43"
                                    height="30px"
                                    width="30px"
                                >
                                    <g
                                    fill-rule="evenodd"
                                    fill="none"
                                    stroke-width="1"
                                    stroke="none"
                                    id="arrow"
                                    >
                                    <path
                                        fill="#9ee5fa"
                                        d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z"
                                        id="arrow-icon-one"
                                    ></path>
                                    <path
                                        fill="#9ee5fa"
                                        d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z"
                                        id="arrow-icon-two"
                                    ></path>
                                    <path
                                        fill="#9ee5fa"
                                        d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z"
                                        id="arrow-icon-three"
                                    ></path>
                                    </g>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
   
    
                <div class="container_tip">
                    <h4 class="wordCarousel">
                        <div>
                            <ul class="flip3">
                                <li>Hover your cursor across the card to flip!</li>
                                <li>Tip:</li>
                            </ul>
                        </div>
                    </h4>
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