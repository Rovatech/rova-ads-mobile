<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Dish.php';

		$dishObj = new Dish();
	
if (isset($_GET["restaurant_id"]) && isset($_GET["category_id"]))
{
		$result = $dishObj->getAllDishes($_GET["restaurant_id"], $_GET["category_id"]);
		if($result)
		{
			$response["data"] = array();
			foreach ($result as $dish)
			{
			array_push($response["data"], $dish);
			}
		$response["success"] = 1;
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "No Dish Found";
		}
}
else
{
		$response["success"] = 0;
		$response["message"] = "Could not find the restaurant ID and category ID";
}
		echo json_encode($response);

?>