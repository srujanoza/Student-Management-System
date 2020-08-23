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

		include('../dbcon.php');
		$id = $_GET['sid'];
		$query = "SELECT * FROM `student` WHERE id = '$id' ";
		$run = mysqli_query($con,$query);
		$data = mysqli_fetch_assoc($run);
?>
<table align="center" style="margin-top: 30px;">
	<form action="updatedata.php" method="POST" enctype="multipart/form-data">
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" value="<?php echo $data['name'];?>"></td>
		</tr>
		<tr>
			<td>Roll No.</td>
			<td><input type="number" name="rollNo" value="<?php echo $data['rollno'];?>"></td>
		</tr>
		<tr>	
			<td>Standard</td>
			<td><input type="number" name="std" value="<?php echo $data['standard'];?>"></td>
		</tr>
		<tr>	
			<td>Parent's Contact No.</td>
			<td><input type="number" name="pno" value="<?php echo $data['pcont'];?>"></td>
		</tr>
		<tr>	
			<td>City</td>
			<td><input type="text" name="city" value="<?php echo $data['city'];?>"></td>
		</tr>
		<tr>	
			<td>Image</td>
			<td><input type="file" name="image" value="<?php echo $data['image'];?>"></td>
		</tr>
		<tr>	
			<input type="hidden" name="ssid" value="<?php echo $data['id'];?>">
			<td colspan="2" align="center"><input type="submit" name="insert" value="Update"></td>
		</tr>
	</form>
	</table>
</body>
</html>
