<?php
$Patient_Id=$_POST['t1'];
$conn=mysqli_connect('localhost','root','','patient');
$sql="select * from patient where patient_Id='$Patient_Id'";
if(mysqli_query($con,$sql))
{
    echo "Record Deleted";
}
else
{
    echo "No record for Deletion";
}
echo "<form action='patient.php' method='post'>";
echo "<input type='submit' value='Back'>";
echo "</form>";
?>