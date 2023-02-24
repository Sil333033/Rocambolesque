<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC Framework</title>
    <link rel="stylesheet" href="../../../public/scss/css/main.css">
</head>
<body>
<div class="container">
        <nav>
            <div class="row">
                <div class="topbar">
                    <div class="navbar__contact col-10">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>DRIEHARINGSTRAAT 27 3511 BH UTRECHT</p>
                        <i class="fa-solid fa-phone"></i>
                        <p>+030 - 208 09 74</p>
                        <i class="fa-regular fa-clock"></i>
                        <p>MA T/M ZON VAN 17:00 TOT 22:00, BAR TOT 24:00</p>
                    </div>
                    <div class="social__media col-2">
                        <a href=""><i class="fa-brands fa-square-facebook fa-lg"></i></a>
                        <a href=""><i class="fa-brands fa-instagram fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <a href="" class="logo">Rocambolesque</a>
                </div>
                <div class="col-8 menu-box">
                    <div class="navbar__toggle" id="mobile-menu">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                    <ul class="menu-items">
                        <li><a href="<?php echo URLROOT ?>/index">HOME</a></li>
                        <li><a href="<?php echo URLROOT ?>/menu">MENU</a></li>
                        <li><a href="<?php echo URLROOT ?>/reservation">RESERVEREN</a></li>
                        <li><a href="<?php echo URLROOT ?>/contact">CONTACT</a></li>
                        <li><a href="<?php echo URLROOT ?>/login">INLOGGEN</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
