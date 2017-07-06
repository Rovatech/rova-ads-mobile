<?php
session_start();
include_once '../controllers/VideoAds.php';

	$ad_id = $_POST['ad_id'];
	$ad_link = $_POST['ad_link'];
 	$ad_status = $_POST['ad_status'];
	
	$ads = new VideoAds();
	
		$edit = $ads->editSlide($ad_id, $ad_link, $ad_status);
		if($edit){
			header("Location: ../manage_video_ads.php?action=update_success");
		}
		else{
			header("Location: ../manage_video_ads.php?action=update_failed");
		}
	
?>