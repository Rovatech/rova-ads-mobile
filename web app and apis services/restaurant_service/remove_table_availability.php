<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Table.php';

// check for post data
if (!empty($_GET["restaurant_user_id"]) && !empty($_GET["table_no"])) {
		
		$tableObj = new Table();
	if($tableObj->isDuplicate($_GET["restaurant_user_id"], $_GET["table_no"] ))
	{
		$result = $tableObj->removeTableAvailability($_GET);
		if($result)
		{
			$response["success"] = 1;
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "Table not set to unavailable.";
		}
	}
	else
	{
		$response["message"] = "No table found.";
		$response["success"] = 0;
	}
	
}
else 
{
	$response["success"] = 0;
	$response["message"] = "Some Required information is missing.";
}

echo json_encode($response);

?>