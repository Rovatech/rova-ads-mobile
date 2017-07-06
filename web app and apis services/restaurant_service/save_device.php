<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Device.php';

// check for post data
if (!empty($_GET["restaurant_user_id"]) && !empty($_GET["table_no"]) ) 
{
		$deviceObj = new Device();
		
		$result = $deviceObj->updateDevice($_GET["restaurant_user_id"], $_GET["device_name"], $_GET["device_uuid"], $_GET["table_no"]);
		if($result)
		{
			$response["success"] = 1;
			$response["message"] = "Device Updated.";
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "Device can't be updated.";
		}
	
}
else 
{
	$response["success"] = 0;
	$response["message"] = "Some Required information is missing.";
}

echo json_encode($response);

?>