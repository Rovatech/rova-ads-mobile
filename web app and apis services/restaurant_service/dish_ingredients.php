<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Dish.php';

		$dishObj = new Dish();
		
if (isset($_GET["dish_id"]))
{
		$result = $dishObj->getDishIng($_GET["dish_id"]);
		
		if($result)
		{	
			$response["data"] = array();
			foreach ($result as $ing)
			{
			array_push($response["data"], $ing);
			}
			$response["success"] = 1;
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "No Major Ingredients";
		}
}
else
{
	$response["success"] = 0;
	$response["message"] = "Could not find Dish Ingredients";
}
		echo json_encode($response);

?>