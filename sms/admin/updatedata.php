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
		$id = $_POST['ssid'];
		$query = "UPDATE `student` SET `name`='$fname',`rollno`='$rollno',`standard`='$std',`pcont`='$pno',`city`='$city',`image`='$imagename' WHERE id = '$id' ";
		
		$run = mysqli_query( $con, $query);
		if($run == true)
		{
			header('location:updatestudent.php');
		}
		else
		{
			echo "Error!";
		}
	}
?>