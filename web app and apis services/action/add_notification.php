<?php
session_start();
include_once '../controllers/Notification.php';

 	$title = $_POST['title'];
 	$description = $_POST['description'];
 	$display_date = $_POST['display_date'];
 	
 	$banner = $_FILES['banner']['name'];
 	
 	if(isset($_POST['status']))
 	{
 		$status = "Y";
 	}
 	else 
 	{
 		$status = "N";
 	}
 	
	$notification = new Notification();
		
		if($_FILES["banner"]["size"] > 0)
		{
			$target_path = "../images/".$_SESSION['user_name']."/notifications/";
		
			$target_path = $target_path . basename( $_FILES['banner']['name']);
		
			move_uploaded_file($_FILES['banner']['tmp_name'], $target_path);
		}
		else
		{
			$banner = "";
		}
		
		$insert = $notification->insert($title, $description, $banner, $display_date, $status);
		if($insert){
			header("Location: ../manage_notifications.php?action=success");
		}
		else{
			header("Location: ../manage_notifications.php?action=failed");
		}
	
	
	
?>