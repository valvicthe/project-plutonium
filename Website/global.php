<?php 
// Ensure error reporting doesn't output database warnings, but keep notices silent 
error_reporting(0);
require_once "db.php"; 
require_once "settings.php"; 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="2013 roblox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plutonium</title>
    
    <link class="rounded" rel="icon" type="image/png" href="<?php echo SMALLLOGOPATH;?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="<?php echo SITEDOMAIN;?>/fontawesomelib/css/all.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #000000 !important;
            color: #f8f9fa;
            padding-top: 56px; /* Adjust for fixed navbar */
        }

        /* Navbar */
        .navbar-plutonium {
            background-color: #0a0a0d !important;
            border-bottom: 1px solid rgba(144, 0, 255, 0.15);
            z-index: 1050;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            width: 200px;
            position: fixed;
            top: 56px;
            left: 0;
            background-color: #0a0a0d;
            border-right: 1px solid rgba(144, 0, 255, 0.15);
            padding: 20px 10px;
        }
        .sidebar a {
            color: rgba(255, 255, 255, 0.7);
            display: block;
            padding: 10px;
            text-decoration: none;
            transition: 0.2s;
        }
        .sidebar a:hover {
            color: #a855f7;
            padding-left: 15px;
        }

        .main-content {
            margin-left: 200px;
            padding: 20px;
        }

        /* Misc */
        .dropdown-menu-dark {
            background-color: #0d0d12;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .dropdown-item { color: #fff !important; }
        .dropdown-item:hover { background-color: #a855f7; }
        .robux-display { color: #22c55e; font-weight: bold; margin-right: 15px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-plutonium navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo SITEDOMAIN;?>">
            <img src="<?php echo FULLLOGOPATH;?>" height="35" alt="Plutonium">
        </a>

        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Left Side Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="<?php echo SITEDOMAIN; ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo SITEDOMAIN;?>/games">Games</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo SITEDOMAIN;?>/forums">Forums</a></li>
            </ul>

            <!-- Right Side (Robux + User) -->
            <ul class="navbar-nav ml-auto align-items-center">
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <li class="nav-item">
                        <span class="robux-display">1,234 R$</span>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                            <?php echo htmlspecialchars($_SESSION["username"]); ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-dark">
                            <a class="dropdown-item" href="<?php echo SITEDOMAIN;?>/settings">Settings</a>
                            <a class="dropdown-item" href="<?php echo SITEDOMAIN;?>/messages">Messages</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="<?php echo SITEDOMAIN;?>/logout.php">Logout</a>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="nav-item"><a href="<?php echo SITEDOMAIN;?>/login" class="nav-link">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar">
    <a href="<?php echo SITEDOMAIN;?>/dashboard.php"><i class="fas fa-home mr-2"></i> Home</a>
    <a href="<?php echo SITEDOMAIN;?>/profile"><i class="fas fa-user mr-2"></i> Profile</a>
    <a href="<?php echo SITEDOMAIN;?>/friends"><i class="fas fa-users mr-2"></i> Friends</a>
    <a href="<?php echo SITEDOMAIN;?>/groups"><i class="fas fa-users-cog mr-2"></i> Groups</a>
</div>

<!-- Main Content wrapper start -->
<div class="main-content">