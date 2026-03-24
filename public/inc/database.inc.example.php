<?php
$servername = "yourservername";         // Replace names with correct data and save file as "database.inc.php"
$username = "yourusername";
$password = "yourpassword";
$dbname = "yourdatabasename";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Database is connected";
} catch (PDOException $err) {
    echo "Database connection problem. " . $err->getMessage();
    exit();
}
