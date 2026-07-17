<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once "db.php"; 
require_once "settings.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plutonium</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="<?php echo SITEDOMAIN;?>/fontawesomelib/css/all.css" rel="stylesheet">
    <style>
        body { background-color: #000000 !important; color: #f8f9fa; padding-top: 70px; }
        .navbar-plutonium { background-color: #0a0a0d !important; border-bottom: 1px solid rgba(144, 0, 255, 0.3); }
        .nav-link { color: #ffffff !important; }
        
        /* Currency Styling */
        .currency-container { display: flex; align-items: center; margin-right: 15px; }
        .robux-val { color: #22c55e; font-weight: bold; margin-right: 10px; }
        .tix-val { color: #f59e0b; font-weight: bold; margin-right: 10px; }
        
        /* Dropdown fix */
        .dropdown-menu { background-color: #0d0d12; border: 1px solid #333; }
        .dropdown-item { color: #fff !important; }
        .dropdown-item:hover { background-color: #1f1f2e; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-plutonium fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo SITEDOMAIN;?>">Plutonium</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Left Side -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="<?php echo SITEDOMAIN; ?>">Home</a></li>
            </ul>

            <!-- Right Side -->
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): 
                    $stmt = $pdo->prepare("SELECT robux, tix FROM users WHERE id = :id");
                    $stmt->execute(['id' => $_SESSION['id']]);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                    <li class="nav-item d-flex align-items-center">
                        <span class="robux-val"><?php echo number_format($user['robux'] ?? 0); ?> R$</span>
                        <span class="tix-val"><?php echo number_format($user['tix'] ?? 0); ?> Tix</span>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo htmlspecialchars($_SESSION["username"]); ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo SITEDOMAIN;?>/settings">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo SITEDOMAIN;?>/logout.php">Logout</a>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="nav-item"><a href="<?php echo SITEDOMAIN;?>/login" class="nav-link">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
