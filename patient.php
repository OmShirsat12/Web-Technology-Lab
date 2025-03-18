<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$con = new mysqli('localhost', 'root', 'root', 'patient');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      

    if (isset($_POST['b1'])) { 
        $id = $_POST['t1'];
        $name = $_POST['t2'];
        $email = $_POST['t3'];
        $address = $_POST['t4'];
        $reason = $_POST['t5'];
        $contact = $_POST['t6'];

        $sql = "INSERT INTO patientinfo (Patient_Id, Name, Email, Address, Reason, Contact) 
                VALUES ('$id', '$name', '$email', '$address', '$reason', '$contact')";
        
        if (mysqli_query($con,$sql)) {
            echo "<script>alert('Record Inserted Successfully');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }

    if (isset($_POST['b2'])) { 
        $sql = "UPDATE `patientinfo` SET 
                `name`='$name', `email`='$email', `address`='$address', 
                `reason`='$reason', `contact`='$contact' 
                WHERE `id`='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Record Updated Successfully');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }

    if (isset($_POST['b3'])) { 
        $sql = "DELETE FROM `patientinfo` WHERE `id`='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Record Deleted Successfully');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }

    if (isset($_POST['b4'])) {
        $sql = "SELECT * FROM `patientinfo`";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo "<table border='1' style='width:100%; margin-top:20px; border-collapse:collapse;'>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Reason</th>
                        <th>Contact</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["name"]."</td>
                        <td>".$row["email"]."</td>
                        <td>".$row["address"]."</td>
                        <td>".$row["reason"]."</td>
                        <td>".$row["contact"]."</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No results found</p>";
        }
    }
}

$conn->close();
?>

<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.27);
            width: 400px;
            box-sizing: border-box;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="number"],
        input[type="email"],
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        input[type="submit"] {
            width: 48%;
            padding: 10px;
            margin: 5px 1%;
            background-color: #4CAF50;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[type="submit"]:active {
            background-color: #3e8e41;
        }
        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 90%;
            max-width: 800px;
            border: 1px solid #ccc;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
        }
        .form-section {
            margin-bottom: 15px;
        }
    </style>
    <script>
        function validate() { 
            if (document.f1.t1.value == "") {
                alert("Please Enter Your Patient ID");
                document.f1.t1.focus();
                return false;
            }
            if (document.f1.t2.value == "") {
                alert("Please Enter Your Name");
                document.f1.t2.focus();
                return false;
            }
            if (document.f1.t3.value == "") {
                alert("Please Enter Your Email");
                document.f1.t3.focus();
                return false;
            }
            if (document.f1.t4.value == "") {
                alert("Please Enter Your Address");
                document.f1.t4.focus();
                return false;
            }
            if (document.f1.t5.value == "") {
                alert("Please Select a Reason");
                document.f1.t5.focus();
                return false;
            }
            if (document.f1.t6.value == "") {
                alert("Please Enter Your Contact");
                document.f1.t6.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <form name="f1" method="post" onSubmit="return validate()">
        <h2>Patient Information System</h2>
        
        <div class="form-section">
            <label>Patient ID:</label>
            <input type="number" name="t1" placeholder="Enter Patient ID">
        </div>

        <div class="form-section">
            <label>Patient Name:</label>
            <input type="text" name="t2" placeholder="Enter Name">
        </div>

        <div class="form-section">
            <label>Patient Email:</label>
            <input type="email" name="t3" placeholder="Enter Email">
        </div>

        <div class="form-section">
            <label>Patient Address:</label>
            <input type="text" name="t4" placeholder="Enter Address">
        </div>

        <div class="form-section">
            <label>Reason for Visit:</label>
            <select name="t5">
                <option value="">Select Reason</option>
                <option value="blood pressure">Blood Pressure</option>
                <option value="headache">Headache</option>
                <option value="fever">Fever</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="form-section">
            <label>Contact Number:</label>
            <input type="number" name="t6" placeholder="Enter Contact Number">
        </div>

        <input type="submit" name="b1" value="Add">
        <input type="submit" name="b2" value="Update">
        <input type="submit" name="b3" value="Delete">
        <input type="submit" name="b4" value="Display">
    </form>
</body>
</html>
