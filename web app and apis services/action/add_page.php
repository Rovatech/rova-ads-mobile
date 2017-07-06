<?php
session_start();
include_once '../controllers/Ads.php';

 	$page_name = $_POST['page_name'];
 	$page_number = $_POST['page_number'];
	
 	if(isset($_POST['status']))
 	{
 		$status = "Y";
 	}
 	else 
 	{
 		$status = "N";
 	}
 	
	$ad = new Ads();
	if(!$ad->isDuplicatePage($page_number))
	{
		
		$insert = $ad->insertPage($page_name, $page_number, $status);
		if($insert){
			header("Location: ../manage_pages.php?action=success");
		}
		else{
			header("Location: ../manage_pages.php?action=failed");
		}
	}
	else 
	{	
		header("Location: ../manage_pages.php?action=duplicate");
	}
	
	
?>