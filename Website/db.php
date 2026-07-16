<?php
// =========================================================================
// PROJECT PLUTONIUM - Database Connection Configuration
// Optimized for Railway hosting & PHP 7.4 compatibility
// =========================================================================

// Read credentials dynamically from Railway environment variables, fallback to local XAMPP
$db_host = getenv('MYSQLHOST') ?: 'localhost';
$db_user = getenv('MYSQLUSER') ?: 'root';
$db_pass = getenv('MYSQLPASSWORD') ?: '';
$db_name = getenv('MYSQLDATABASE') ?: 'plutonium';
$db_port = getenv('MYSQLPORT') ?: '3306';

// --- 1. MySQLi CONNECTION (Used by 90% of legacy Roblox web scripts) ---
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);
$link = $conn; // Fail-safe alias
$con  = $conn; // Fail-safe alias

if (!$conn) {
    die("Database Connection failed (MySQLi): " . mysqli_connect_error());
}

// Set charset to avoid weird character encoding in catalog/forums
mysqli_set_charset($conn, "utf8mb4");


// --- 2. PDO CONNECTION (Used by modern or secure scripts in the source) ---
try {
    $dsn = "mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
    $db  = $pdo; // Fail-safe alias
} catch (\PDOException $e) {
    // If the site doesn't use PDO, we don't want to crash it, just log the error
    error_log("Database Connection failed (PDO): " . $e->getMessage());
}
?>