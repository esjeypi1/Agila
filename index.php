<?php
$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/scripts/con_db.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    
    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"]) && $user["user_type"] == "user") {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            $_SESSION['name'] = $user["name"];
            $_SESSION['email'] = $user["email"];
        
            header("Location: menu/user/index.php");
            exit;
        }
        elseif (password_verify($_POST["password"], $user["password_hash"]) && $user["user_type"] == "admin") {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
           $_SESSION['name'] = $user["name"];

            header("Location: menu/admin/index2.php");
            exit;
        }
    }
    $is_invalid = true;
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
    <link rel="stylesheet" href="styles/container_out.css"> <!-- Side Menu -->
    <link rel="icon" sizes="192x192" href="../../images/logo_agila.png">

    <title>AGILA</title>
</head>
<body>
    <div class="out-box">
        
        <div class="left-side">

            <div class="logo-cont"><img src="images/logo-full_agila.png" class="logo"></div>

            <div class="disp-left">
                
                <h1 class="head1">WE ARE WATCHING</h1>
                <h3 class="subhead1">Crime tracking becomes more efficient using advanced technology, providing solutions to make Manila a safer place with AGILA.</h3>
            </div>

            <div class="invi"></div>
        </div>

        <div class="right-side">

            <div class="login-box">
                <h1 class="title">SIGN IN CREDENTIALS</h1>
                <form class="log-form" method="post">
                    <div class="input-box">
                        <i class='email-logo bx bxs-user-circle'></i>
                        <input class="email-input" id="email" type="email" placeholder="Email Address" 
                        name="email"  value="">
                    </div>
                    <div class="input-box">
                        <i class='pass-logo bx bxs-lock-alt'></i>
                        <input class="pass-input" id="pass" type="password" placeholder="Password" name="password">
                    </div>
                
                    <button class="login-btn">LOGIN</button>
                </form>
                <div class="inv-box">
                    <?php if ($is_invalid): ?>
                            <p class="inv">Invalid Credentials. Please Try Again.</p><br>
                    <?php endif; ?>
                </div>

                <hr class="dvr">

                <div class="grp-btn">
                    <a class="c-grp-btn" href="about_user.php"><i class='bx bx-info-circle'></i> </a>
                    <a class="c-grp-btn" href="contact_user.php"><i class='bx bxs-phone' ></i></a>
                </div>
                
                <h3 class="subtext">
                    © 2024. This website is an undergraduate thesis prototype made by group of Agatha. The assets (logos, fonts, etc.) borrowed
                    from different sources is used for educational purposes. FEU Institute of Technology, BSCSSE, 2023-2025.
                </h3>
    
            </div>
        </div>
    </div>

    <!-- Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>