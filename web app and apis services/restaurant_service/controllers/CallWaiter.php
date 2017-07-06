<?php
include_once('Database.php');
class CallWaiter{
	
	function insertCall($restaurant_user_id, $table_no, $created_on, $status){
		$db = new Database();
		
		$array = array(
				'restaurant_user_id'  => $restaurant_user_id,
				'table_no'	      => $table_no,
				'created_on'	      => $created_on,
				'status'	      	  => $status
		);
		
		$stmt = $db->queryWithParamsArray("insert into waiter_call (restaurant_user_id, resturant_table_id, call_date ,status)
				values(:restaurant_user_id, :table_no, :created_on, :status)",$array);

		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
}

?>