<?php
// =========================================================================
// PROJECT PLUTONIUM - Direct Database Connection (No Variables)
// =========================================================================

// REPLACE THE STRINGS BELOW WITH YOUR ACTUAL RAILWAY DATABASE CREDENTIALS
$db_host = 'tokaido.proxy.rlwy.net'; 
$db_user = 'root';      
$db_pass = 'IZqgfZjyuCSECsUgszrpAXCzLnWePxal';  
$db_name = 'railway';  
$db_port = '21608';      

// --- 1. MySQLi CONNECTION ---
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);
$link = $conn; 
$con  = $conn; 

if (!$conn) {
    die("Database Connection failed (MySQLi): " . mysqli_connect_error());
}

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