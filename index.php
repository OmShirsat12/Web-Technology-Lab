<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <script type="text/javascript">
        function validateForm() {
            let fields = ["P_Id", "name", "email", "mobile", "address", "certificates"];
            for (let field of fields) {
                let value = document.forms["f1"][field].value.trim();
                if (value === "") {
                    alert("Please enter " + field.replace("_", " ").toUpperCase());
                    document.forms["f1"][field].focus();
                    return false;
                }
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>Patient Management System</h1>

    <form name="f1" method="post" action="add.php" onsubmit="return validateForm()">
        <h2>Add Patient</h2>
        <table>
            <tr><td>Roll No:</td><td><input type="number" name="P_Id"></td></tr>
            <tr><td>Name:</td><td><input type="text" name="name"></td></tr>
            <tr><td>Email:</td><td><input type="email" name="email"></td></tr>
            <tr><td>Mobile No:</td><td><input type="tel" name="mobile"></td></tr>
            <tr><td>Address:</td><td><input type="text" name="address"></td></tr>
            <tr><td>Cause:</td><td><input type="text" name="Cause"></td></tr>
        </table>
        <input type="submit" value="Add Patient">
    </form>

    <form name="f2" method="post" action="update.php">
        <h2>Update Patient</h2>
        <label for="P+Id_update">Enter Roll No to Update:</label>
        <input type="number" name="P_Id" id="P_Id_update">
        <input type="submit" value="Update Patient">
    </form>

    <form name="f3" method="post" action="delete.php">
        <h2>Delete Patient</h2>
        <label for="P_Id_delete">Enter Roll No to Delete:</label>
        <input type="number" name="P_Id" id="P_Id_delete">
        <input type="submit" value="Delete Patient">
    </form>

    <form name="f4" method="post" action="display.php">
        <h2>Display Patient</h2>
        <input type="submit" value="Display All Patient">
    </form>

</body>
</html>
