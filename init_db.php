<?php
$host = getenv('DB_HOST') ?: 'mysql-service';
$db = 'mydb'; $user = 'root'; $pass = 'mydbpassword';
echo "<h2>RMUTI Database Initializer</h2>";
try {
    $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db`; USE `$db`;");
    $sql = file_get_contents(__DIR__ . '/schema.sql');
    $pdo->exec($sql);
    echo "<p style='color:green;'>Success! Database initialized.</p><a href='index.php'>Go Home</a>";
} catch (PDOException $e) {
    echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
}
