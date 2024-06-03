<?php
// Database credentials
$host = "localhost"; 
$dbname = "finalexam"; 
$username = "root"; 
$password = ""; 
// Attempt to connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Display error message if connection fails
    die("Failed to connect to the database: " . $e->getMessage());
}
?>
