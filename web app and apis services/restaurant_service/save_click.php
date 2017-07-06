<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Ads.php';

// check for post data
if (!empty($_GET["ad_id"])) 
{
		$adsObj = new Ads();
		
		$click = (int) $adsObj->getSlidesDetail($_GET["ad_id"])->clicks;
		$clicks = $click + 1;
		$result = $adsObj->updateClick($_GET["ad_id"], $clicks);
		if($result)
		{
			$response["success"] = 1;
			$response["message"] = "Click Updated";
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "Click Updated failed please try again.";
		}
	
}
else 
{
	$response["success"] = 0;
	$response["message"] = "Some Required information is missing.";
}

echo json_encode($response);

?>