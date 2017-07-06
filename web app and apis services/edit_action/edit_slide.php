<?php
session_start();
include_once '../controllers/Ads.php';

	$ad_id = $_POST['ad_id'];
	$banner_image_old = $_POST['banner_image_old'];
	$ad_link = $_POST['ad_link'];
 	$ad_banner = $_FILES['ad_banner']['name'];
 	$page_id = $_POST['page_id'];
 	$ad_status = $_POST['ad_status'];
	
	$ads = new Ads();
	
		
		if($_FILES["ad_banner"]["size"] > 0)
		{
			$target_path = "../images/slides/";
		
			$target_path = $target_path . basename( $_FILES['ad_banner']['name']);
		
			move_uploaded_file($_FILES['ad_banner']['tmp_name'], $target_path);
		}
		else
		{
			$ad_banner = $banner_image_old;
		}
		
		$edit = $ads->editSlide($ad_id, $ad_banner, $ad_link, $page_id, $ad_status);
		if($edit){
			header("Location: ../manage_ads.php?action=update_success");
		}
		else{
			header("Location: ../manage_ads.php?action=update_failed");
		}
	
?>