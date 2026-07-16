<?php
// =========================================================================
// PROJECT PLUTONIUM - Database Connection Configuration
// Optimized for Railway hosting & PHP 7.4 compatibility
// =========================================================================

// Read credentials dynamically from Railway environment variables
// CHANGED: Fallback changed from 'localhost' to '127.0.0.1' to prevent Unix socket errors
$db_host = getenv('MYSQLHOST') ?: '127.0.0.1';
$db_user = getenv('MYSQLUSER') ?: 'root';
$db_pass = getenv('MYSQLPASSWORD') ?: '';
$db_name = getenv('MYSQLDATABASE') ?: 'plutonium';
$db_port = getenv('MYSQLPORT') ?: '3306';

// --- 1. MySQLi CONNECTION ---
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);
$link = $conn; 
$con  = $conn; 

if (!$conn) {
    die("Database Connection failed (MySQLi): " . mysqli_connect_error());
}

// Set charset
mysqli_set_charset($conn, "utf8mb4");

// --- 2. PDO CONNECTION ---
try {
    $dsn = "mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
    $db  = $pdo; 
} catch (\PDOException $e) {
    error_log("Database Connection failed (PDO): " . $e->getMessage());
}
?>