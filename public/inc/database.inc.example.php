<?php
$servername = "studentloket";         // Replace names with correct data and save file as "database.inc.php"
$username = "bit_academy";
$password = "bit_academy";
$dbname = "yourdatabasename";

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Database is connected";
} catch (PDOException $err) {
    echo "Database connection problem. " . $err->getMessage();
    exit();
}
