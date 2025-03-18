<html>
    <body>
<?php
$Patient_Id=$_POST['t1'];
$conn=mysqli_connect('localhost','root','','patient');
$sql="delete from patient where Patient_Id='$Patient_Id'";
$rs=mysqli_query($conn,$sql);
?>

<form action="save.php" method="post">
<input type="text" name="t1" value="<?php echo $rs['Patient_Id'];?>"><br>
<input type="text" name="t2" value="<?php echo $rs['Name'];?>"><br>
<input type="text" name="t3" value="<?php echo $rs['Email'];?>"><br>
<input type="text" name="t4" value="<?php echo $rs['Address'];?>"><br>
<input type="text" name="t5" value="<?php echo $rs['Reason'];?>"><br>
<input type="text" name="t6" value="<?php echo $rs['Contact'];?>">

<?php
echo "<form action='patient.php' method='post'>";
echo "<input type='submit' value='Back'>";
echo "</form>";
?>
</body>
</html>
