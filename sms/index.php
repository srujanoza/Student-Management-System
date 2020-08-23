<!DOCTYPE html>
<html>
<head>
	<title>Student Management System</title>
</head>
<body>
	<h3 align="right" style="margin-right: 20px;"><a href="login.php">Admin login</a></h3>
	<h1 align = "center">Student Management System</h1>
	<br><br>
	<form action = index.php method="POST" enctype="multipart/form-data">
		<table align="center" cellspacing="10" cellpadding="10">
			<tr>
				<td colspan="2" align="center">Student Information</td>
			</tr>
			<tr>
				<td>Roll No:</td>
				<td><input type="number" name="rollno" placeholder="Enter your roll no."></td>
			</tr>
			<tr>
				<td>Std:</td>
				<td><input type="number" name="std" placeholder="Enter your Standard"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="show" value="Show Info"></td>
			</tr>
		</table>
		
	</form>
</body>
</html>
<?php
	if(isset($_POST['show']))
	{
		include('dbcon.php');
		$std = $_POST['std'];
		$rollno = $_POST['rollno'];
		$query = "SELECT * FROM STUDENT where standard = '$std' and rollno = '$rollno'";
		$run = mysqli_query($con,$query);
		if($run==true)
		{
			if(mysqli_num_rows($run)>0)
			{
				$data = mysqli_fetch_assoc($run);
				?>
				<table align="center" border="2" cellpadding="10"style = "margin-top: 50px;" >
					<tr>
						<th colspan="6">Student Details</th>
					</tr>
					<tr>
						<th>Name</th>
						<th>Roll no.</th>
						<th>Std.</th>
						<th>Parent's contact no.</th>
						<th>City</th>
						<th>Image</th>
					</tr>
					<tr>
						<td><?php echo $data['name'];?></td>
						<td><?php echo $data['rollno'];?></td>
						<td><?php echo $data['standard'];?></td>
						<td><?php echo $data['pcont'];?></td>
						<td><?php echo $data['city'];?></td>
						<td><img src ="dataimg/<?php echo $data['image'];?>" style = "max-width = 30px; max-height = 10px;"></td>
					</tr>
				</table>
				<?php
			}
			else
			{
				echo "No records found";
			}	
		}
	}

?>

	