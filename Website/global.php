<?php 
// Ensure error reporting doesn't output database warnings, but keep notices silent 
error_reporting(0);
require_once "db.php"; 
require_once "settings.php"; 

// Only start session if one hasn't been initialized already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="2013 roblox">
    <meta name="keywords" content="Roblox, Old Roblox, Old Roblox Revival, Novetus">
    <meta name="author" content="Project Plutonium">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plutonium</title>
    
    <!-- Favicon -->
    <link class="rounded" rel="icon" type="image/png" href="<?php echo SMALLLOGOPATH;?>" />

    <!-- Bootstrap 4 & FontAwesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="<?php echo SITEDOMAIN;?>/fontawesomelib/css/all.css" rel="stylesheet">
    
    <style>
        html { 
            height: 100%; 
        }
        body {
            background-color: #000000 !important;
            color: #f8f9fa;
        }

        /* Modern Dark Navbar Styling */
        .navbar-plutonium {
            background-color: #0a0a0d !important;
            border-bottom: 1px solid rgba(144, 0, 255, 0.15);
        }
        .navbar-plutonium .nav-link {
            color: rgba(255, 255, 255, 0.75) !important;
            transition: color 0.2s;
        }
        .navbar-plutonium .nav-link:hover {
            color: #a855f7 !important;
        }
        .dropdown-menu-dark {
            background-color: #0d0d12;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .dropdown-menu-dark .dropdown-item {
            color: rgba(255, 255, 255, 0.8);
        }
        .dropdown-menu-dark .dropdown-item:hover {
            background-color: #a855f7;
            color: #fff;
        }
        .dropdown-divider-dark {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }
        .btn-purple {
            background-color: #6b21a8;
            color: white;
            border: none;
        }
        .btn-purple:hover {
            background-color: #581c87;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-plutonium navbar-dark py-2">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="<?php echo SITEDOMAIN;?>">
            <img src="<?php echo FULLLOGOPATH;?>" height="35" class="d-inline-block align-top" alt="Plutonium">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Navigation Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <!-- Home goes to dashboard if logged in, otherwise landing page -->
                    <a class="nav-link" href="<?php echo (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) ? SITEDOMAIN . '/dashboard.php' : SITEDOMAIN; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITEDOMAIN;?>/games">Games</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITEDOMAIN;?>/browse">Browse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITEDOMAIN;?>/groups">Groups</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITEDOMAIN;?>/forums">Forums</a>
                </li>
                
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-user mr-1 text-purple"></i> <?php echo htmlspecialchars($_SESSION["username"]); ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo SITEDOMAIN;?>/settings">Account Settings</a>
                            <a class="dropdown-item" href="<?php echo SITEDOMAIN;?>/messages">Messages</a>
                            <a class="dropdown-item" href="<?php echo SITEDOMAIN;?>/friends">Friends</a>
                            <div class="dropdown-divider dropdown-divider-dark"></div>
                            <a class="dropdown-item" href="<?php echo SITEDOMAIN;?>/develop">Develop</a>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- Auth Actions / Profile Control -->
            <div class="d-flex align-items-center">
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <a href="<?php echo SITEDOMAIN;?>/logout.php" class="btn btn-outline-danger btn-sm px-3" role="button">Logout</a>
                <?php else: ?>
                    <a href="<?php echo SITEDOMAIN;?>/register" class="btn btn-purple btn-sm px-3 mr-2" role="button">Register</a>
                    <span class="text-muted mr-2">or</span>
                    <a href="<?php echo SITEDOMAIN;?>/login" class="btn btn-outline-light btn-sm px-3" role="button">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<!-- JavaScript Libraries (Required for Bootstrap Dropdowns to function) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>