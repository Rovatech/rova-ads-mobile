<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Orders.php';

if (isset($_GET["restaurant_user_id"]))
{
		$orderObj = new Orders();
		$result = $orderObj->getRestaurantOrdersSamba($_GET["restaurant_user_id"]);
		
		if($result)
		{
			$response["data"] = array();
			
			foreach ($result as $order)
			{
				//$detail_str = "";
				$order_detail = $orderObj->getRestaurantOrderDetailSamba($order->order_id);
				foreach ($order_detail as $detail){
					//$detail_str .= $detail->quantity ." ".$detail->dish_name.", "; 
					
					
				$array_of_orders = array(
						'order_no' => $order->order_id,
						'order_table'   => $order->order_table,
						'order_datetime'   => $order->order_datetime,
						'dish_name' =>$detail->dish_name,
						'dish_quantity' => $detail->quantity,
						'dish_price' => $detail->dish_price 
				);
				array_push($response["data"], $array_of_orders);
				}
				
				
				
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