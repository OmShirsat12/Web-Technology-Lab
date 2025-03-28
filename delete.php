<?php
require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $P_Id = $_POST['P_Id'];
    try {
        $conn = getConnection();

        $stmt = $conn->prepare("DELETE FROM patient WHERE P_Id = ?");
        $stmt->bind_param("s", $P_Id);

        if ($stmt->execute()) {
            echo "Patient deleted successfully!";
            echo "<a href='index.php'><button type='button'>Back to Home</button></a>";
        } else {
            echo "Error: " . $stmt->error;
            echo "<a href='index.php'><button type='button'>Back to Home</button></a>";
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "<div class='error-message'>Error: " . $e->getMessage() . "</div>";
    }
}
?>
