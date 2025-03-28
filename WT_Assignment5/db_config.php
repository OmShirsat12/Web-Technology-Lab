<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DB_HOST', '127.0.0.1'); // Using IP instead of localhost
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'WT');

function getConnection() {
    try {
        // Try mysqli_connect first
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        if (!$conn) {
            throw new Exception("Connection failed: " . mysqli_connect_error());
        }
        
        return $conn;
    } catch (Exception $e) {
        die("<div class='error-message'>Connection failed: " . $e->getMessage() . 
            "<br>Please check: <br>" .
            "1. XAMPP MySQL is running<br>" .
            "2. MySQL user 'root' exists<br>" .
            "3. Database 'WT' exists</div>");
    }
}
?>
