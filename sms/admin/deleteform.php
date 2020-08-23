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
		$query = "DELETE FROM `student` WHERE id = '$id' ";
		$run = mysqli_query($con,$query);
		if($run==true)
		{
			header('location:deletestudent.php');	
		}

?>