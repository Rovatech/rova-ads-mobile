<?php
include_once('Database.php');
class CallWaiter{
	
	function getCallCount(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'restaurant_user_id'	      => $_SESSION['user_id'],
				'status'				=> "pending"
		);
		
		$result = $db->queryWithParamsArray("SELECT * from waiter_call where restaurant_user_id =:restaurant_user_id  AND status=:status", $array);
		if($result->rowCount() > 0 )
			return $result->rowCount();
		else
			return 0;
	}
	
	
	function getRestaurantCalls(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_user_id'	=> $_SESSION['user_id']
	
		);
	
		$result = $db->queryWithParamsArray("SELECT * from waiter_call where restaurant_user_id=:restaurant_user_id order by call_id desc", $array);
	
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	
	function UpdateCalls(){
		$db = new Database();
	
		$array = array(
				'restaurant_user_id'	=> $_SESSION['user_id'],
				'status' => 'checked'
		);
	
		$result = $db->queryWithParamsArray("UPDATE waiter_call set status=:status WHERE restaurant_user_id=:restaurant_user_id", $array);
	
		if($result)
			return TRUE;
		else
			return FALSE;
	}
	
	function deleteCall($call_id) {
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'call_id' => $call_id
		);
	
		$result = $db->queryWithParamsArray("DELETE FROM waiter_call where call_id=:call_id", $array);
		if($result)
			return TRUE;
		else
			return FALSE;
	}
}

?>