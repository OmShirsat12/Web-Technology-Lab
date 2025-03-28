<?php
require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $P_Id = $_POST['P_Id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $Cause = $_POST['Cause'];

    try {
        $conn = getConnection();
        
        $stmt = $conn->prepare("INSERT INTO patient (P_Id, name, email, mobile, address, Cause) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        
        $stmt->bind_param("ssssss", $P_Id, $name, $email, $mobile, $address, $Cause);
        
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }
        
        echo "<div class='success-message'>Patient added successfully!</div>";
        echo "<a href='index.php'><button type='button'>Back to Home</button></a>";
        
    } catch (Exception $e) {
        echo "<div class='error-message'>Error: " . $e->getMessage() . "</div>";
        echo "<a href='index.php'><button type='button'>Back to Home</button></a>";
    } finally {
        if (isset($stmt)) $stmt->close();
        if (isset($conn)) $conn->close();
    }
}
?>
