<?php include "assets/script.php"; ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Unique Schools -  Website</title>


    <link rel="shortcut icon" href="assets/favicon.svg" type="image/svg+xml" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>

    <link rel="preload" as="image" href="assets/images/hero-banner.png" />
    <link rel="preload" as="image" href="assets/images/hero-abs-1.png" media="min-width(768px)"/>
    <link rel="preload" as="image" href="assets/images/hero-abs-2.png" media="min-width(768px)"/>
  </head>

  <body id="top">
        <!--- #HEADER -->
        <header class="header" data-header>
            <div class="container">
                <h1> <a href="#" class="logo">Unique Schools</a></h1>

                <nav class="navbar" data-navbar>
                    <div class="navbar-top">
                        <a href="#" class="logo">Unique Schools</a>

                        <button class="nav-close-btn" aria-label="Close menu" data-nav-toggler>
                            <ion-icon name="close-outline"></ion-icon>
                        </button>
                    </div>

                    <ul class="navbar-list">
                        <li class="navbar-item">
                            <a href="#home" class="navbar-link" data-nav-toggler>Home</a>
                        </li>

                        <li class="navbar-item">
                            <a href="#about" class="navbar-link" data-nav-toggler>About</a>
                        </li>

                        <li class="navbar-item">
                            <a href="#benefits" class="navbar-link" data-nav-toggler>Blog</a>
                        </li>

                        <li class="navbar-item">
                            <a href="login.php" class="navbar-link" data-nav-toggler>Login</a>
                        </li>
                    </ul>
                </nav>

                <div class="header-actions">
                    <a href="" class="header-action-btn login-btn" target="_blank">
                        <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
                        <span class="span">CONTACT US</span>
                    </a>

                    <button class="header-action-btn nav-open-btn" aria-label="Open menu" data-nav-toggler>
                        <ion-icon name="menu-outline"></ion-icon>
                    </button>
                </div>

                <div class="overlay" data-nav-toggler data-overlay></div>
            </div>
        </header>