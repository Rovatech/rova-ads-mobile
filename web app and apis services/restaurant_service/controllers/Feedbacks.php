<?php
include_once('Database.php');
class Feedbacks{
	
	function insertFeedback($restaurant_user_id, $customer_type, $customer ,$restaurant_order_id, $remarks, $rating, $created_on, $status){
		$db = new Database();
		
		$array = array(
				'restaurant_user_id'  => $restaurant_user_id,
				'customer_type'	      => $customer_type,
				'customer'	      	  => $customer,
				'restaurant_order_id' => $restaurant_order_id,
				'remarks'	      	  => $remarks,
				'rating'	      	  => $rating,
				'created_on'	      => $created_on,
				'status'	      	  => $status
		);
		
		$stmt = $db->queryWithParamsArray("insert into feedback_remarks(restaurant_user_id, customer_type, customer,restaurant_order_id ,
				remarks, rating, created_on, status)
				values(:restaurant_user_id, :customer_type, :customer, :restaurant_order_id, :remarks, :rating, :created_on, :status)",$array);

		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function updateOrderFeedbackStatus($restaurant_order_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_order_id' => $restaurant_order_id,
				'order_feedback'	      => "Y"
		);
		$result = $db->queryWithParamsArray("UPDATE order_main set order_feedback=:order_feedback WHERE order_id=:restaurant_order_id", $array);
		
	}
	
	function getCustomerFeedbacks($customer, $customer_type, $restaurant_id, $order_type){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'customer_type' => $customer_type,
				'customer'	      => $customer,
				'restaurant_user_id' => $restaurant_id,
				'order_type' 	=> $order_type
		);
	
		$result = $db->queryWithParamsArray("SELECT feedback_remarks.created_on,feedback_remarks.rating ,feedback_remarks.remarks  from feedback_remarks inner join order_main on feedback_remarks.restaurant_order_id = order_main.order_id	where feedback_remarks.customer_type=:customer_type AND feedback_remarks.customer =:customer AND feedback_remarks.restaurant_user_id=:restaurant_user_id AND order_main.order_type=:order_type", $array);
	
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	
	}
	
}

?>