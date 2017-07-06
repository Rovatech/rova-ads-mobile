<?php
session_start();
include_once '../controllers/Notification.php';

	$notification_id = $_POST['notification_id'];
	$banner_old = $_POST['banner_old'];
 	$title = $_POST['title'];
 	$description = $_POST['description'];
 	$banner = $_FILES['banner']['name'];
 	$notification_status = $_POST['notification_status'];
 	
	$notification = new Notification();
	
		
		if($_FILES["banner"]["size"] > 0)
		{
			$target_path = "../images/".$_SESSION['user_name']."/notifications/";
		
			$target_path = $target_path . basename( $_FILES['banner']['name']);
		
			move_uploaded_file($_FILES['banner']['tmp_name'], $target_path);
		}
		else
		{
			$banner = $banner_old;
		}
		
		$edit = $notification->edit($notification_id, $title, $description, $banner, $notification_status);
		if($edit){
			header("Location: ../manage_notifications.php?action=update_success");
		}
		else{
			header("Location: ../manage_notifications.php?action=update_failed");
		}
	
?>