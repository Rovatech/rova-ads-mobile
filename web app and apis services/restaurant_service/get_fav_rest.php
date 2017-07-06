<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Restaurants.php';

		
		
if (isset($_GET["customer"]) && isset($_GET["customer_type"]))
{
		$restObj = new Resturants();
		
		$result = $restObj->getFavRest($_GET["customer"], $_GET["customer_type"]);
		if($result)
		{
			$response["data"] = array();
			foreach ($result as $fav)
			{
			array_push($response["data"], $fav);
			}
		$response["success"] = 1;
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "No Favourite Restaurants Found";
		}
}
else
{
	$response["success"] = 0;
	$response["message"] = "Could not find the Customer";
}
		echo json_encode($response);

?>