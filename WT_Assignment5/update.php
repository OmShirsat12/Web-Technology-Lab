<?php
require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $P_Id = $_POST['P_Id'];
    try {
        $conn = getConnection();

        $stmt = $conn->prepare("SELECT * FROM patient WHERE P_Id = ?");
        $stmt->bind_param("s", $P_Id);
        $stmt->execute();
        $result = $stmt->get_result();
        $student = $result->fetch_assoc();

        if ($student) {
            echo "<form method='post' action='update_record.php'>
                <h2>Update Patient Details</h2>
                <label>Name:</label><input type='text' name='name' value='" . ($student['name'] ?? '') . "'><br><br>
                <label>Email:</label><input type='email' name='email' value='" . ($student['email'] ?? '') . "'><br><br>
                <label>Mobile No:</label><input type='tel' name='mobile' value='" . ($student['mobile'] ?? '') . "'><br><br>
                <label>Address:</label><input type='text' name='address' value='" . ($student['address'] ?? '') . "'><br><br>
                <label>Cause:</label><input type='text' name='Cause' value='" . ($student['Cause'] ?? '') . "'><br><br>
                <input type='hidden' name='P_Id' value='" . ($student['P_Id'] ?? '') . "'>
                <input type='submit' value='Update'>
            </form>";
            echo "<a href='index.php'><button type='button'>Back to Home</button></a>";
        } else {
            echo "No record found for Roll No: $P_Id";
            echo "<a href='index.php'><button type='button'>Back to Home</button></a>";
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "<div class='error-message'>Error: " . $e->getMessage() . "</div>";
    }
}
?>
