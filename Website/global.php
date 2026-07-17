<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once "db.php"; 
require_once "settings.php"; 

// --- AUTO-LOGIN COOKIE LOGIC ---
if (!isset($_SESSION['loggedin']) && isset($_COOKIE['remember_me'])) {
    $stmt = $pdo->prepare("SELECT id, username FROM users WHERE remember_token = :token");
    $stmt->execute(['token' => $_COOKIE['remember_me']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="<?php echo SITEDOMAIN;?>/fontawesomelib/css/all.css" rel="stylesheet">
    <style>
        body { background-color: #000000 !important; color: #f8f9fa; padding-top: 56px; }
        .navbar-plutonium { background-color: #0a0a0d !important; border-bottom: 1px solid rgba(144, 0, 255, 0.15); }
        .sidebar { height: 100vh; width: 200px; position: fixed; top: 56px; left: 0; background-color: #0a0a0d; border-right: 1px solid rgba(144, 0, 255, 0.15); padding: 20px 10px; }
        .has-sidebar { margin-left: 200px; padding: 20px; }
        .dropdown-menu-dark { background-color: #0d0d12; border: 1px solid rgba(255, 255, 255, 0.08); }
        .dropdown-item { color: #fff !important; }
        .dropdown-item:hover { background-color: #a855f7; }
        .robux-display { color: #22c55e; font-weight: bold; margin-right: 10px; }
        .tix-display { color: #f59e0b; font-weight: bold; margin-right: 15px; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-plutonium navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo SITEDOMAIN;?>">Plutonium</a>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ml-auto align-items-center">
                <?php if (isset($_SESSION['loggedin'])): 
                    $stmt = $pdo->prepare("SELECT robux, tix FROM users WHERE id = :id");
                    $stmt->execute(['id' => $_SESSION['id']]);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                    <li class="nav-item">
                        <span class="robux-display"><?php echo number_format($user['robux'] ?? 0); ?> R$</span>
                        <span class="tix-display"><?php echo number_format($user['tix'] ?? 0); ?> Tix</span>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo htmlspecialchars($_SESSION["username"]); ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo SITEDOMAIN;?>/settings">Settings</a>
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
