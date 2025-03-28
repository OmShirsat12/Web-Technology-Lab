<?php
require_once 'db_config.php';

try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS);
    
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Create database
    if (!$conn->query("CREATE DATABASE IF NOT EXISTS WT")) {
        throw new Exception("Error creating database: " . $conn->error);
    }
    echo "Database created/verified successfully<br>";

    // Select database
    if (!$conn->select_db("WT")) {
        throw new Exception("Error selecting database: " . $conn->error);
    }

    // Create table
    $sql = "CREATE TABLE IF NOT EXISTS patient (
        P_Id VARCHAR(20) PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100),
        mobile VARCHAR(20),
        address TEXT,
        Cause TEXT
    )";

    if (!$conn->query($sql)) {
        throw new Exception("Error creating table: " . $conn->error);
    }
    echo "Table created/verified successfully";

} catch (Exception $e) {
    die("Setup failed: " . $e->getMessage());
} finally {
    if (isset($conn)) $conn->close();
}
?>
