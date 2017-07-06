<?php
include_once('Database.php');
class Notifications{
	
	function getNotifications($restaurant_id,$customer_type,$customer){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_user_id'	      => $restaurant_id,
				'notification_status'	      => "Y",
				'customer_type'				  => $customer_type,
				'customer'				  => $customer,
				'display_date' => date('Y-m-d'),
				'done_restaurant_user_id'	=> $restaurant_id,
		);
	
		$result = $db->queryWithParamsArray("SELECT * FROM notifications WHERE restaurant_user_id=:restaurant_user_id AND 
				display_date=:display_date AND notification_status=:notification_status AND notification_id NOT IN 
				( SELECT restaurant_notification_id FROM done_notification WHERE customer_type=:customer_type AND 
				customer=:customer AND restaurant_user_id=:done_restaurant_user_id )", $array);
	
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	
	}
	
	function insertDoneNotification($restaurant_user_id, $customer_type, $customer ,$cart){
		$db = new Database();
	
			$pieces = explode(":", $cart);
			for ($var = 0; $var < count($pieces); $var++){
				
				if(!empty($pieces[$var])){
				$array_detail = array(
						'restaurant_user_id'  => $restaurant_user_id,
						'customer_type'	      => $customer_type,
						'customer'	      	  => $customer,
						'restaurant_notification_id' => $pieces[$var]
						
				);
				
				$stmt_detail = $db->queryWithParamsArray("insert into done_notification(restaurant_user_id, customer_type, customer, restaurant_notification_id)
						values(:restaurant_user_id, :customer_type, :customer, :restaurant_notification_id)",$array_detail);
				}
				
			}
			
		if($stmt_detail){
			return TRUE;
		}
		else{
			return FALSE;
		}		
	}

}

?>