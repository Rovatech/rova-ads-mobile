<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Ads.php';

		$adsObj = new Ads();
	

		$result = $adsObj->getAllVideo();
		if($result)
		{
			$response["data"] = array();
			foreach ($result as $slide)
			{
			array_push($response["data"], $slide);
			}
		$response["success"] = 1;
		$response["is_on"] = $adsObj->getIsOn()->is_on;
		}
		else
		{
			$response["success"] = 0;
			$response["is_on"] = $adsObj->getIsOn()->is_on;
			$response["message"] = "No Video Found";
		}

		echo json_encode($response);

?>