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

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> <!-- Ensure this URL is correct and accessible -->

    <!-- Google Fonts/Logo -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../styles/navbar_main.css"> <!-- Top Menu -->
    <link rel="stylesheet" href="../../styles/container_main.css"> <!-- Side Menu -->
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
            
        <div class="side-menu"> <!-- Side Menu (START) -->
                    <div class="side-title">
                        <h1 class="place">MANILA</h1>
                        <h2 class="coor">14.5995, 120.9842</h2>

                    </div>
                    <div class="side-btn-grp">
                        <form class="form-btn" action="info.php" method="post">
                            <button class="side-btn" type="submit" name="submit" value="0"><i class='btn-logo bx bxs-info-square'></i>Information</button><br>
                        </form>
                        <form class="form-btn" action="stats.php" method="post">
                            <button class="side-btn" type="submit" name="submit" value="0"><i class='btn-logo bx bxs-bar-chart-alt-2'></i>Statistics</button><br>
                        </form>
                        <form class="form-btn" action="fcast.php" method="post">
                            <button class="side-btn" type="submit" name="submit" value="0"><i class='btn-logo bx bxs-timer' ></i>Forecasting</button><br>
                        </form>
                    </div>
                    
                    <div class="h-btn">
                        <a type="button" class="btn btn-primary" href="user_prof.php"><span class="h-btn-logo material-symbols-outlined">arrow_back_ios_new</span></a>
                    </div>

                    <p class="side-tips">Need some tips on navigating the dashboard? Visit the Contact Us tab </p>
                </div> <!-- Side Menu (END) -->
            
            <div class="right-menu"> <!-- Right Canvas (START) -->
                <div class="patterns">
                    <svg width="400%" height="150%">
                        <defs>
                            <style>
                                @import url("https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i");
                            </style>
                        </defs>
                        <text x="67%" y="20%" text-anchor="middle" style="font-size: 80px;">User</text>
                        <text x="65%" y="24%" text-anchor="middle" style="font-size: 20px;">Profile</text>
            
                    </svg>
                </div>
                
                <div class="horizontal_line"></div>

                <div id ="user-form" class="form">
                    <div class="title" style="text-align: center;">Edit Your Account</div>
                    <div class="subtitle text-center">Role: User</div>
                    <div class="card_load">
                    <svg height="100" width="100">
                        <circle cx="50" cy="50" r="20"  fill="url(#pattern1)"/>
                    </svg>
                                <defs>                        
                                    <?php
                                        $mysqli = require __DIR__ . "../../../scripts/con_db.php";

                                        $name = $_SESSION['name'];
                                        $sql = "SELECT image FROM user WHERE name='$name'";
                                        $result = $mysqli->query($sql);
                                        $row = $result->fetch_assoc();
                                        $imagePath = $row['image'];

                                        // Check if the image exists
                                        if (!empty($imagePath)) {
                                            // Display the  picture as a circular image
                                            echo '<img id="image-preview" class = "circular-image" src="data:image/jpeg;base64,' . base64_encode($imagePath) . '" alt="Profile Picture">';
                                        } else {
                                            // If no profile picture is found, display a default circular image
                                            echo '<img id="image-preview" class = "circular-image" src="https://via.placeholder.com/150">';
                                        }
                                    ?>
                                </defs>
                    </div>
                    <form id="uploadForm" action="upld_prof.php" method="POST" enctype="multipart/form-data">
                        <input type="file" id="fileInput" name="image" accept="image/*" style="display: none;" />
                    </form>
                    <div class="input-container ic1">
                        <input id="name" class="input" type="text" placeholder="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>" required/>
            
                    </div>
                    <div class="input-container ic2">
                        <input id="email" class="input" type="text" placeholder="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required/>
                    </div>
                    <div id="message" class="text-danger position-fixed text-center"></div>
                    <button type="button" id="save-button" class="submit">Save</button>
                    <button class="submit btn-primary upload-btn" style="margin-top:10px;">Upload</button>
                </div>


            </div> <!-- Right Canvas (END) -->
        </section> <!-- Main Menu Container (END) -->
    </div>
    <script> 
        $(document).ready(function() {
            document.querySelector('.upload-btn').addEventListener('click', function () {
                document.getElementById('fileInput').click();
            });

            document.getElementById('fileInput').addEventListener('change', function () {
                document.getElementById('uploadForm').submit();
            });
            
            $('#save-button').on('click', function() {
                // Check if name and email fields are not empty
                var name = $('#name').val().trim();
                var email = $('#email').val().trim();

                if (name === '' || email === '') {
                    $('#message').text('Name and email cannot be empty.');
                    return; // Exit function if fields are empty
                }

                var formData = new FormData(document.getElementById('uploadForm'));
                formData.append('name', name);
                formData.append('email', email);

                // AJAX request to save the data in the database
                $.ajax({
                    url: 'upd_user.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'success') {
                            alert('Data saved successfully!');
                            window.location.href = 'user_prof.php'; 
                        } else {
                            alert('Failed to save data: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        $('#message').text('Error while saving data: ' + error);
                    }
                });
            });

        });

    </script>


</body>
</html>
