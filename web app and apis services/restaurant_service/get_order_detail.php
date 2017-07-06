<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Orders.php';

if (isset($_GET["restaurant_order_id"]))
{
		$orderObj = new Orders();
		$result = $orderObj->getRestaurantOrderDetail($_GET["restaurant_order_id"]);
		
		if($result)
		{
			$response["data"] = array();
			
			foreach ($result as $detail)
			{
				array_push($response["data"], $detail);
			}
		$response["success"] = 1;
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "No Order Found";
		}
}
else
{
	$response["success"] = 0;
	$response["message"] = "Could not find the Restaurant ID or Customer or Customer Type";
}
		echo json_encode($response);

?>