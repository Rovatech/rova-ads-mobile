<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Ads.php';

		$adsObj = new Ads();
	
if (isset($_GET["page_id"]))
{
		$result = $adsObj->getAllSlides($_GET["page_id"]);
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
			$response["message"] = "No Slides Found";
		}
}
else
{
		$response["success"] = 0;
		$response["message"] = "Could not find the Page ID";
}
		echo json_encode($response);

?>