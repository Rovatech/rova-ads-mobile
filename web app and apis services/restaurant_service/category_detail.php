<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Dish.php';

		$dishObj = new Dish();
		
if (isset($_GET["category_id"]))
{
		$response["data"] = array();
		
		$result = $dishObj->getCategoryDetail($_GET['category_id']);
		if($result)
		{
			array_push($response["data"], $result);
			$response["success"] = 1;
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "Cant Get Category Detail";
		}
}
else
{
	$response["success"] = 0;
	$response["message"] = "Could not find the Category ID";
}
		echo json_encode($response);

?>