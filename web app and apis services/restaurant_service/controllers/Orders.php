<?php
include_once('Database.php');
class Orders{

	function insertServingOrder($cart, $restaurant_user_id,$customer_type ,$customer, $order_table ,$order_type, $order_datetime, $customer_instruction,
		$estimated_time, $order_feedback, $order_status, $order_tax, $order_amount){
		$db = new Database();
		
		$array = array(
			'restaurant_user_id' => $restaurant_user_id,
		 	'customer_type' => $customer_type,
		 	'customer' => $customer,
			'order_table' => $order_table,
			'order_type' => $order_type,
			'order_datetime' => $order_datetime,
			'customer_instruction' => $customer_instruction,
			'estimated_time' => $estimated_time,
			'order_feedback' => $order_feedback,
			'order_status' => $order_status,
			'order_tax' => $order_tax,
			'order_amount'  => $order_amount
		);
		
		$stmt = $db->queryWithParamsArray("insert into order_main(restaurant_user_id, customer_type, customer,
				order_table, order_type, order_datetime, customer_instruction, estimated_time, order_feedback, order_status, order_tax, order_amount)
				values(:restaurant_user_id, :customer_type, :customer, :order_table, :order_type, :order_datetime, :customer_instruction, :estimated_time, :order_feedback, :order_status, :order_tax, :order_amount)",$array);
				
		if($stmt){
			$order_main_id = $db->lastInsertId();
			$pieces = explode(",", $cart);
			for ($var = 0; $var < count($pieces); $var++){
				
				if(!empty($pieces[$var])){
				$childSplit = explode(":", $pieces[$var]);
				
				$array_detail = array(
						'restaurant_order_id' => $order_main_id,
						'restaurant_dish_id' => $childSplit[0],
						'quantity' => $childSplit[1]
				);
				
				$stmt_detail = $db->queryWithParamsArray("insert into order_detail(restaurant_order_id, restaurant_dish_id, quantity)
						values(:restaurant_order_id, :restaurant_dish_id, :quantity)",$array_detail);
				}
				
			}
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function insertDeliveryOrder($cart, $restaurant_user_id,$customer_type ,$customer, $order_table ,$order_type, $order_datetime, $customer_instruction,
			$estimated_time, $order_feedback, $order_status, $customer_name, $customer_address, $customer_phone, $order_tax, $order_amount){
		$db = new Database();
	
		$array = array(
				'restaurant_user_id' => $restaurant_user_id,
				'customer_type' => $customer_type,
				'customer' => $customer,
				'order_table' => $order_table,
				'order_type' => $order_type,
				'order_datetime' => $order_datetime,
				'customer_instruction' => $customer_instruction,
				'estimated_time' => $estimated_time,
				'order_feedback' => $order_feedback,
				'order_status' => $order_status,
				'customer_name' => $customer_name,
				'customer_address' => $customer_address,
				'customer_phone' => $customer_phone,
				'order_tax' => 	$order_tax,
				'order_amount' => $order_amount
		);
	
		$stmt = $db->queryWithParamsArray("insert into order_main(restaurant_user_id, customer_type, customer,
				order_table, order_type, order_datetime, customer_instruction, estimated_time, order_feedback, order_status, customer_name, customer_address, customer_phone, order_tax, order_amount)
				values(:restaurant_user_id, :customer_type, :customer, :order_table, :order_type, :order_datetime, :customer_instruction, :estimated_time, :order_feedback, :order_status, :customer_name, :customer_address, :customer_phone, :order_tax, :order_amount)",$array);
	
		if($stmt){
			$order_main_id = $db->lastInsertId();
			$pieces = explode(",", $cart);
			for ($var = 0; $var < count($pieces); $var++){
	
				if(!empty($pieces[$var])){
					$childSplit = explode(":", $pieces[$var]);
	
					$array_detail = array(
							'restaurant_order_id' => $order_main_id,
							'restaurant_dish_id' => $childSplit[0],
							'quantity' => $childSplit[1]
					);
	
					$stmt_detail = $db->queryWithParamsArray("insert into order_detail(restaurant_order_id, restaurant_dish_id, quantity)
							values(:restaurant_order_id, :restaurant_dish_id, :quantity)",$array_detail);
				}
	
			}
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	
	
	function getRestaurantOrders($restaurant_user_id, $customer_type, $customer, $order_type){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_user_id'	      => $restaurant_user_id,
				'customer_type'	      => $customer_type,
				'customer'	      => $customer,
				'order_type'	      => $order_type
				
		);
	
		$result = $db->queryWithParamsArray("SELECT * from order_main where restaurant_user_id =:restaurant_user_id 
				AND customer_type=:customer_type AND customer=:customer AND order_type=:order_type", $array);
	
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	function getRestaurantOrdersSamba($restaurant_user_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_user_id'	      => $restaurant_user_id,
				'order_type'	      => 'serving'
				
		);
	
		$result = $db->queryWithParamsArray("SELECT * from order_main where restaurant_user_id =:restaurant_user_id 
				AND order_type=:order_type", $array);
	
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	
		function getRestaurantOrderDetailSamba($restaurant_order_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_order_id'   => $restaurant_order_id
		);
	
		$result = $db->queryWithParamsArray("SELECT order_detail.quantity, dish.dish_name, dish.dish_price  from order_detail inner join dish on order_detail.restaurant_dish_id = dish.dish_id
				where order_detail.restaurant_order_id =:restaurant_order_id", $array);
	
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	
	function getRestaurantOrderDetail($restaurant_order_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_order_id'   => $restaurant_order_id
		);
	
		$result = $db->queryWithParamsArray("SELECT order_detail.quantity, dish.dish_name from order_detail inner join dish on order_detail.restaurant_dish_id = dish.dish_id
				where order_detail.restaurant_order_id =:restaurant_order_id", $array);
	
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	
		function getRestaurantOrderRating($restaurant_order_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_order_id'   => $restaurant_order_id
		);
	
		$result = $db->queryWithParamsArray("SELECT rating from feedback_remarks WHERE restaurant_order_id =:restaurant_order_id", $array);
	
		if($result->rowCount() > 0 )
			return $result->fetch();
		else
			return FALSE;
	}
	
}

?>