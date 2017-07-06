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
		$response["success"] = 0;
	}
	else
	{
		$response["success"] = 1;
	}
	
}
else 
{
	$response["success"] = 0;
	$response["message"] = "Some Required information is missing.";
}

echo json_encode($response);

?>