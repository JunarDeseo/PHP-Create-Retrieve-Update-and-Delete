<?php
	session_start();

	$name = "";
	$address = "";
	$contact = "";
	$id = 0;
	$edit_state = false;

	$db = mysqli_connect('localhost','root','','crud_db');

	if(isset($_POST['save']))
	{
		$name = $_POST['name'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];

		$insert = "INSERT INTO tbl_info (Name, Address, Contact) VALUES ('$name','$address','$contact')";
		mysqli_query($db, $insert);
		$_SESSION['msg'] = "Data Saved";
		header('location: index.php');
	}

	if(isset($_POST['update']))
	{

		$name = $_POST['name'];
		$address = $_POST['address'];		 
		$contact = $_POST['contact'];
		$id = $_POST['id'];
		mysqli_query($db, "UPDATE tbl_info SET Name = '$name',  Address = '$address', Contact = '$contact' WHERE id = '$id'");
		$_SESSION['msg'] = "Data Saved";
		header("Location: index.php");

	}

	if(isset($_GET['del']))
	{
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM tbl_info WHERE id = $id");
		$_SESSION['msg'] = "Data Deleted";
		header("Location: index.php");
	}

	$result = mysqli_query($db, "SELECT * FROM tbl_info");
?>