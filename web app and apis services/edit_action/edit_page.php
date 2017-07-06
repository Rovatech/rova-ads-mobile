<?php
session_start();
include_once '../controllers/Ads.php';

	$page_id = $_POST['page_id'];
	$page_name = $_POST['page_name'];
 	$page_number = $_POST['page_number'];
 	$page_status = $_POST['page_status'];
	
	$ads = new Ads();
	
		
		$edit = $ads->editPage($page_id, $page_name, $page_number, $page_status);
		if($edit){
			header("Location: ../manage_pages.php?action=update_success");
		}
		else{
			header("Location: ../manage_pages.php?action=update_failed");
		}
	
?>