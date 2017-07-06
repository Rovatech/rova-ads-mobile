<?php
session_start();
include_once '../controllers/VideoAds.php';

 	$ad_link = $_POST['ad_link'];
 	if(isset($_POST['status']))
 	{
 		$status = "Y";
 	}
 	else 
 	{
 		$status = "N";
 	}
 	
	$ads = new VideoAds();
		
		$insert = $ads->insertSlide($ad_link, $status);
		if($insert){
			header("Location: ../manage_video_ads.php?action=success");
		}
		else{
			header("Location: ../manage_video_ads.php?action=failed");
		}

	
	
?>