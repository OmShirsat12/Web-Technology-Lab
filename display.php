<?php
require_once 'db_config.php';

try {
    $conn = getConnection();
    
    echo "<link rel='stylesheet' type='text/css' href='style.css'>";
    echo "<div class='container'>";
    echo "<h2>All Patient</h2>";
    echo "<table>
        <tr>
            <th>Patient ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Cause</th>
        </tr>";

    $result = $conn->query("SELECT P_Id, name, email, mobile, address, Cause FROM patient");
    
    if (!$result) {
        throw new Exception("Query failed: " . $conn->error);
    }

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['P_Id'] ?? '') . "</td>";
        echo "<td>" . htmlspecialchars($row['name'] ?? '') . "</td>";
        echo "<td>" . htmlspecialchars($row['email'] ?? '') . "</td>";
        echo "<td>" . htmlspecialchars($row['mobile'] ?? '') . "</td>";
        echo "<td>" . htmlspecialchars($row['address'] ?? '') . "</td>";
        echo "<td>" . htmlspecialchars($row['Cause'] ?? '') . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<a href='index.php'><button type='button'>Back to Home</button></a>";
    echo "</div>";

} catch (Exception $e) {
    echo "<div class='error-message'>Error: " . $e->getMessage() . "</div>";
    echo "<a href='index.php'><button type='button'>Back to Home</button></a>";
} finally {
    if (isset($conn)) $conn->close();
}
?>
