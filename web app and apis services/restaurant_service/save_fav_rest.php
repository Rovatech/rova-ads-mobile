<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Restaurants.php';

// check for post data
if (!empty($_GET["restaurant_user_id"]) && !empty($_GET["customer_type"]) && !empty($_GET["customer"]) ) 
{
		$restObj = new Resturants();
	if(!$restObj->isDuplicate($_GET["restaurant_user_id"], $_GET["customer_type"], $_GET["customer"]))
	{
		$result = $restObj->insertFavRest($_GET);
		if($result)
		{
			$response["success"] = 1;
			$response["message"] = "Restaurant added successfully to your favourite list.";
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "Restaurant can't be added to your favourite list at this time.";
		}
	}
	else
	{
		$response["message"] = "Restaurant Already in your favourite list.";
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