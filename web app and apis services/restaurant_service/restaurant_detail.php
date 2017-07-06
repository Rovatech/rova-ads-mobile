<?php

/*
 * Following code will Get the restaurant id from the app and provide the detail of that restaurant .
*/

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Restaurants.php';

		$restObj = new Resturants();
		
if (isset($_GET["user_id"]))
{
		$response["data"] = array();
		
		$result = $restObj->getRestaurantDetail($_GET["user_id"]);
		if($result)
		{
			array_push($response["data"], $result);
			$response["success"] = 1;
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "No Restaurant Found";
		}
}
else
{
	$response["success"] = 0;
	$response["message"] = "Could not find the restaurant ID";
}
		echo json_encode($response);

?>