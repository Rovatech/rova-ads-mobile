<?php
session_start();
include_once '../controllers/Ads.php';

	$ads = new Ads();

 	$type = $_POST['type'];
 	$page_id = $_POST['page_id'];
 	$time_run = $_POST['time_run'];
 	$sort_order = $_POST['sort_order'];
	
 	if(isset($_POST['slide']))
 	{
 		$slide = $_POST['slide'];
 	}
 	 if(isset($_POST['video']))
 	{
 		$video = $_POST['video'];
 	}
 	if($type == 'b'){
 		$des = $ads->getSlideDetail($slide)->ad_banner;
 	}else if($type == 'v'){
 		$des = $ads->getVideoDetail($video)->ad_link;
 	}
 	if($type == 'b'){
		$insert = $ads->insertScheduleGrid($slide, $des, $type, $time_run, $sort_order, $page_id);
 	}else if($type == 'v'){
 		$insert = $ads->insertScheduleGrid($video, $des, $type, $time_run, $sort_order, $page_id);
 	}
		if($insert){
			header("Location: ../manage_ads_schedule.php?action=success");
		}
		else{
			header("Location: ../manage_ads_schedule.php?action=failed");
		}

	
	
?>