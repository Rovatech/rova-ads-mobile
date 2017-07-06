<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Orders.php';

// check for post data
if (!empty($_GET["restaurant_user_id"]) && !empty($_GET["customer_type"]) && !empty($_GET["customer"]) && !empty($_GET["cart"]) ) {
		
		$orderObj = new Orders();
		
		$cart = $_GET["cart"];
		$restaurant_user_id = $_GET["restaurant_user_id"];
		$customer_type = $_GET["customer_type"];
		$customer = $_GET["customer"];
		$order_table = $_GET["order_table"];
		$order_type = $_GET["order_type"];
		$order_datetime = date('Y-m-d H:i:s');
		$customer_instruction = urldecode($_GET["customer_instruction"]);
		$estimated_time = $_GET["estimated_time"];
		$order_feedback = $_GET["order_feedback"];
		$order_status = $_GET["order_status"];
		$order_tax = $_GET["order_tax"];
		$order_amount = $_GET["order_amount"];
		
		$result = $orderObj->insertServingOrder($cart, $restaurant_user_id, $customer_type, $customer, $order_table, $order_type, $order_datetime, $customer_instruction, $estimated_time, $order_feedback, $order_status, $order_tax, $order_amount);
		if($result)
		{
			$response["success"] = 1;
			$response["message"] = "Order Successfull your order estimated cooking time is ".$_GET["estimated_time"]." minutes.";			
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "Order can't be completed at this time please try again later.";
		}
}
else 
{
	$response["success"] = 0;
	$response["message"] = "Some Required information is missing.";
}

echo json_encode($response);

?>