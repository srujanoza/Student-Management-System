<?php
	session_start();

	if(isset($_SESSION['uid']))
	{
		header("location:admin/admindash.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
</head>
<body>
		<form action = "login.php" method = "POST">
		<table align = "center">
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" placeholder="Enter your username"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password" placeholder="Enter your password"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Login"></td>
			</tr>
		</table>
</body>
</html>

<?php 
     include('dbcon.php');
	if(isset($_POST['submit']))
	{
		$name = $_POST['username'];
		$password = $_POST['password'];
		$query = "SELECT * FROM `admin` WHERE `username` = '$name' AND `password` = '$password';";
		$run = mysqli_query($con,$query);
		$row = mysqli_num_rows($run);
		if($row < 1)
		{
			?> <script>alert('Username or password does not match.')
			windows.open('index.php','_self');
				</script>
			
			<?php
		}
		else
		{
			$data= mysqli_fetch_assoc($run);
			$id = $data['id'];
			$_SESSION['uid'] = $id;
			header('location: admin/admindash.php');
		}
		
	}
?>