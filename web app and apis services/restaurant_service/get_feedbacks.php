<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Feedbacks.php';

		$feedObj = new Feedbacks();
		
if (isset($_GET["customer"]) && isset($_GET["customer_type"]) && isset($_GET["restaurant_id"]) && isset($_GET["order_type"]))
{
		$result = $feedObj->getCustomerFeedbacks($_GET["customer"], $_GET["customer_type"], $_GET["restaurant_id"], $_GET["order_type"]);
		if($result)
		{
			$response["data"] = array();
			foreach ($result as $feedback)
			{
			array_push($response["data"], $feedback);
			}
		$response["success"] = 1;
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "No Feedback Found";
		}
}
else
{
	$response["success"] = 0;
	$response["message"] = "Could not find the Customer";
}
		echo json_encode($response);

?>