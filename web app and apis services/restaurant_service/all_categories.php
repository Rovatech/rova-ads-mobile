<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Dish.php';

		$dishObj = new Dish();
	
if (isset($_GET["restaurant_id"]))
{
		$result = $dishObj->getAllCategories($_GET["restaurant_id"]);
		if($result)
		{
			$response["data"] = array();
			foreach ($result as $cat)
			{
			array_push($response["data"], $cat);
			}
		$response["success"] = 1;
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "No Category Found";
		}
}
else
{
		$response["success"] = 0;
		$response["message"] = "Could not find the restaurant ID";
}
		echo json_encode($response);

?>