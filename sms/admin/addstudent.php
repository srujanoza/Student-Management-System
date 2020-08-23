<?php
	session_start();
	if(isset($_SESSION['uid']))
	{
		echo "";	
	}
	else
	{
		header("location:../login.php");	
	}
?>
<?php
	include('headsection.php');
?>
	
	<table align="center" style="margin-top: 30px;">
	<form action="addstudent.php" method="POST" enctype="multipart/form-data">
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" placeholder="Enter your name"></td>
		</tr>
		<tr>
			<td>Roll No.</td>
			<td><input type="number" name="rollNo" placeholder="Enter your roll no"></td>
		</tr>
		<tr>	
			<td>Standard</td>
			<td><input type="number" name="std" placeholder="Enter your standard"></td>
		</tr>
		<tr>	
			<td>Parent's Contact No.</td>
			<td><input type="number" name="pno" placeholder="Enter parent's contact"></td>
		</tr>
		<tr>	
			<td>City</td>
			<td><input type="text" name="city" placeholder="Enter your city"></td>
		</tr>
		<tr>	
			<td>Image</td>
			<td><input type="file" name="image"></td>
		</tr>
		<tr>	
			<td colspan="2" align="center"><input type="submit" name="insert" value="Insert"></td>
		</tr>
	</form>
	</table>
</body>
</html>
<?php
	include('../dbcon.php');
	if(isset($_POST['insert']))
	{
		$fname = $_POST['name'];
		$rollno = $_POST['rollNo'];
		$std = $_POST['std'];
		$pno = $_POST['pno'];
		$city = $_POST['city'];		
		$imagename = $_FILES['image']['name'];
		$tempname = $_FILES['image']['tmp_name'];
		move_uploaded_file($tempname, "../dataimg/$imagename");
		$query = "INSERT INTO student( name, rollno, standard, pcont,city,image) VALUES('$fname','$rollno','$std','$pno','$city','$imagename')";
		$run = mysqli_query( $con, $query);
		if($run == true)
		{
			echo "Inserted Successfully";
		}
		else
		{
			echo "Error!";
		}
	}
?>