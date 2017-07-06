<?php

/*
 * Following code will Get the data from the app and insert in the database .
*/

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Restaurants.php';

		$restObj = new Resturants();
	
		$result = $restObj->getAllRestaurants();
		if($result)
		{
			$response["data"] = array();
			foreach ($result as $rest)
			{
			array_push($response["data"], $rest);
			}
		$response["success"] = 1;
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "No Restaurant Found";
		}

		echo json_encode($response);

?>