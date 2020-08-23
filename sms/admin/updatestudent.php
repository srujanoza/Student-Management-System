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
include('headsection.php')

?>
<table align="center">
<form action="updatestudent.php" method="POST">
	<tr>
		<td>Student Name</td>
		<td><input type="text" name="name" placeholder="Enter name"></td>
		<td>Student Std.</td>
		<td><input type="number" name="std" placeholder="Enter standard"></td>
		<td><input type="submit" name="show" value="Show Data"></td>
	</tr>
</form>
</table>
<table align="center"  cellpadding="10px;" border="2px" style="margin-top: 30px;">
	<tr>
		<th>Sr No.	</th>
		<th>Name</th>
		<th>Roll no.</th>
		<th>Std.</th>
		<th>Parent's contact no.</th>
		<th>City</th>
		<th>Image</th>
		<th>Edit</th>
	</tr>
<?php
	if(isset($_POST['show']))
	{
		include('../dbcon.php');
		
		$name = $_POST['name'];
		$std = $_POST['std'];
		$query = "SELECT * FROM `student` WHERE name like '%$name%' and standard = '$std'";
		$run = mysqli_query($con,$query);
		$row = mysqli_num_rows($run);
		if($row < 1)
		{
			echo "<tr><td colspan = '7' align = 'center'>No records found</td></tr>";
		}
		else
		{
			$count = 0;
			while($data = mysqli_fetch_assoc($run))
			{	
				?>
					<tr>
					<td><?php echo ++$count; ?></td>
					<td><?php echo $data['name'] ?></td>
					<td><?php echo $data['rollno'] ?></td>
					<td><?php echo $data['standard'] ?></td>
					<td><?php echo $data['pcont'] ?></td>
					<td><?php echo $data['city'] ?></td>
					<td><img src="../dataimg/<?php echo $data['image']; ?>" style = "width: 100px; max-height: 80px;" ></td>
					<td><a href="updateform.php?sid=<?php echo $data['id']; ?>">Edit</td>
					</tr>
				<?php
			}
		}

	}
?>
</table>

