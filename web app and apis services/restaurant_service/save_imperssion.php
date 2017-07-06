<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Ads.php';

// check for post data
if (!empty($_GET["ad_id"])) 
{
		$adsObj = new Ads();
		
		$imperssion = (int) $adsObj->getSlidesDetail($_GET["ad_id"])->imperssion;
		$imperssions = $imperssion + 1;
		$result = $adsObj->updateImperssion($_GET["ad_id"], $imperssions);
		if($result)
		{
			$response["success"] = 1;
			$response["message"] = "imperssion Updated";
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "imperssion Updated failed please try again.";
		}
	
}
else 
{
	$response["success"] = 0;
	$response["message"] = "Some Required information is missing.";
}

echo json_encode($response);

?>