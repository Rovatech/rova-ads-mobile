<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Orders.php';

if (isset($_GET["restaurant_user_id"]) && isset($_GET["customer_type"]) && isset($_GET["customer"]) && isset($_GET["order_type"]) )
{
		$orderObj = new Orders();
		$result = $orderObj->getRestaurantOrders($_GET["restaurant_user_id"], $_GET["customer_type"], $_GET["customer"], $_GET["order_type"]);
		
		if($result)
		{
			$response["data"] = array();
			
			foreach ($result as $order)
			{
				$detail_str = "";
				$order_detail = $orderObj->getRestaurantOrderDetail($order->order_id);
				foreach ($order_detail as $detail){
					$detail_str .= $detail->quantity ." ".$detail->dish_name.", "; 
				}
				
				$rating = $orderObj->getRestaurantOrderRating($order->order_id);
				
				$array_of_orders = array(
						'order_id'   => $order->order_id,
						'restaurant_user_id'   => $order->restaurant_user_id,
						'customer_type'   => $order->customer_type,
						'customer'   => $order->customer,
						'order_table'   => $order->order_table,
						'order_type'   => $order->order_type,
						'order_datetime'   => $order->order_datetime,
						'customer_instruction'   => $order->customer_instruction,
						'estimated_time'   => $order->estimated_time,
						'order_tax'   => $order->order_tax,
						'order_amount'   => $order->order_amount,
						'order_feedback'   => $order->order_feedback,
						'order_status'   => $order->order_status,
						'detail_str'   => $detail_str,
						'order_rating' => ($rating ? $rating->rating:"0")
				);
				array_push($response["data"], $array_of_orders);
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