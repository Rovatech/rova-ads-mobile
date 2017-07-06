<?php
session_start();
include_once '../controllers/Login.php';

	$user_name = $_POST['user_name'];
	$user_password = $_POST['user_pass'];
	$user_type = $_POST['user_type'];
	
	$login = new Login();
	if($user_type == "admin")
	{
		$auth = $login->authenticate($user_name,$user_password);
		if($auth)
		{
			if($_SESSION['user_role'] == "**")
			{
				header("Location: ../dashboard.php");
			}
			else if($_SESSION['user_role'] == "*")
			{
				header("Location: ../admin_dashboard.php");
			}
		}
		else
		{
			header("Location: ../index.php?auth=false");
		}
		
	}
	else if($user_type == "kitchen")
	{
		$auth = $login->authenticateKitchen($user_name,$user_password);
		if($auth)
		{
			header("Location: ../manage_orders.php");
		}
		else
		{
			header("Location: ../index.php?auth=false");
		}
	}
	
?>