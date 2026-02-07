<?php
echo "<h1>RMUTI abc Project is Live</h1>";
echo "<p>Running on CPE RMUTI Cluster with Nginx + PHP-FPM.</p>";
echo "<hr/>";

$host = getenv('DB_HOST') ?: 'mysql-service';
$db = 'mydb'; $user = 'root'; $pass = 'mydbpassword';
echo "<h1>RMUTI abc Project - User Management</h1>";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $users = $pdo->query("SELECT username, name FROM users")->fetchAll(PDO::FETCH_ASSOC);
    echo "<table border='1'><tr><th>Username</th><th>Name</th></tr>";
    foreach ($users as $u) echo "<tr><td>" . htmlspecialchars($u['username']) . "</td><td>" . htmlspecialchars($u['name']) . "
</td></tr>";
    echo "</table>";
} catch (Exception $e) {
    echo "<p>DB not ready. <a href='init_db.php'>Click here to initialize</a></p>";
}
