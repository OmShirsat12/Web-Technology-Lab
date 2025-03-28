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
        
        $stmt = $conn->prepare("UPDATE patient SET name=?, email=?, mobile=?, address=?, Cause=? WHERE P_Id=?");
        $stmt->bind_param("ssssss", $name, $email, $mobile, $address, $Cause, $P_Id);

        if ($stmt->execute()) {
            echo "<div class='success-message'>Patient updated successfully!</div>";
        } else {
            throw new Exception("Error updating record: " . $stmt->error);
        }
        
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
