<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Feedbacks.php';

// check for post data
if (!empty($_GET["restaurant_user_id"]) && !empty($_GET["customer_type"]) && !empty($_GET["customer"]) ) 
{
		$feedObj = new Feedbacks();
		
		$current_date = date('Y-m-d');
		$rating = round($_GET["rating"])*20;
		
		$result = $feedObj->insertFeedback($_GET["restaurant_user_id"] , $_GET["customer_type"], $_GET["customer"], $_GET["restaurant_order_id"], $_GET["remarks"], $rating, $current_date, $_GET["status"]);
		if($result)
		{
			$feedObj->updateOrderFeedbackStatus($_GET["restaurant_order_id"]);
			$response["success"] = 1;
			$response["message"] = "Feedback Rating posted successfully.";
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "Feedback Rating can't be posted this time please try again later.";
		}
	
}
else 
{
	$response["success"] = 0;
	$response["message"] = "Some Required information is missing.";
}

echo json_encode($response);

?>