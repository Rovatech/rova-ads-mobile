<?php
session_start();
include_once '../controllers/Ads.php';

 	$ad_link = $_POST['ad_link'];
 	$ad_banner = $_FILES['ad_banner']['name'];
 	$page_id = $_POST['page_id'];
	
 	if(isset($_POST['status']))
 	{
 		$status = "Y";
 	}
 	else 
 	{
 		$status = "N";
 	}
 	
	$ads = new Ads();
	
		
		if($_FILES["ad_banner"]["size"] > 0)
		{
			$target_path = "../images/slides/";
		
			$target_path = $target_path . basename( $_FILES['ad_banner']['name']);
		
			move_uploaded_file($_FILES['ad_banner']['tmp_name'], $target_path);
		}
		else
		{
			$ad_banner = "";
		}
		
		$insert = $ads->insertSlide($ad_banner, $ad_link, $page_id, $status);
		if($insert){
			header("Location: ../manage_ads.php?action=success");
		}
		else{
			header("Location: ../manage_ads.php?action=failed");
		}

	
	
?>