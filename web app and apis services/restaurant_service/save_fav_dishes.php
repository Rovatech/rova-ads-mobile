<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Dish.php';

// check for post data
if (!empty($_GET["restaurant_user_id"]) && !empty($_GET["customer_type"]) && !empty($_GET["customer"]) && !empty($_GET["restaurant_dish_id"]) ) {
		
		$dishObj = new Dish();
	if(!$dishObj->isDuplicate($_GET["restaurant_user_id"], $_GET["customer_type"], $_GET["customer"], $_GET["restaurant_dish_id"]))
	{
		$result = $dishObj->insertFavDishes($_GET);
		if($result)
		{
			$response["success"] = 1;
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "Dish not added in your favourite list";
		}
	}
	else
	{
		$response["message"] = "Dish already in your favourite list";
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