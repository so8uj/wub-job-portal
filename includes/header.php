<?php
    $get_page = $_SERVER['PHP_SELF'];
    $get_page_name = explode('/',$get_page);
    $page = end($get_page_name);

    if(!isset($_SESSION)){
        session_start();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' type='image/x-icon' href='./assets/img/favicon.ico' />
    <title><?php require_once("includes/page_titles.php"); ?></title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
   
    <!-- Header Sectioon -->
    <header class="header">
        <div class="container">
            <nav class="navber flex align-center">
                <a class="logo" href="index.php">
                    <img src="./assets/img/wub-logo-new.png" alt="World University of Bangladesh">
                </a>
                <ul class="menus flex justify-center d-m-hide">
                    <li><a href="index.php" class="color-white <?= $page == 'index.php' ? ' manu-active' : ''  ?>">Home</a></li>
                    <li><a href="about.php" class="color-white <?= $page == 'about.php' ? ' manu-active' : ''  ?>">About Us</a></li>
                    <li><a href="jobs.php" class="color-white <?= $page == 'jobs.php' ? ' manu-active' : ''  ?>">Job Listings</a></li>
                    <li><a href="contact.php" class="color-white <?= $page == 'contact.php' ? ' manu-active' : ''  ?>">Contact</a></li>
                    <li class="d-m-show">
                        <a href="sign-in.php" class="button button-white-outline">Sign In</a>
                        <a href="sign-up.php" class="button button-white-outline">Sign Up</a>
                    </li>
                </ul>

                <div class="menu-butotns">
                    <?php if(isset($_SESSION['auth_id'])) { ?> 
                        <a href="my-jobs.php" class="button d-m-hide button-white-outline">Dashboard</a>
                    <?php }else{ ?>
                        <a href="sign-in.php" class="button d-m-hide button-white-outline">Sign In</a>
                        <a href="sign-up.php" class="button d-m-hide button-white-outline">Sign Up</a>
                    <?php } ?>
                    <a href="javascript:void(0)" class="button d-m-show button-white-outline" id="menu_button">- Menu</a>
                </div>
            </nav>
        </div>
    </header>