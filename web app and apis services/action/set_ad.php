<?php
session_start();
include_once '../controllers/Ads.php';
 	$is_on = $_POST['is_on'];
 	$display_time = $_POST['display_time'];
 	
	$adsObj = new Ads();
	//For Update
	if($adsObj->getDetail())
	{
		$update = $adsObj->updateAdSetting($is_on,$display_time);
		if($update){
			header("Location: ../ads_setting.php?action=update_success");
		}
		else{
			header("Location: ../ads_setting.php?action=update_failed");
		}
	}
	
?>