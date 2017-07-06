<?php
include_once('Database.php');
class Feedback{
	
	function getFeedbackCount(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'restaurant_user_id'	=> $_SESSION['user_id'],
				'status'				=> "pending"
		);
		
		$result = $db->queryWithParamsArray("SELECT * from feedback_remarks where restaurant_user_id=:restaurant_user_id AND status=:status", $array);
		if($result->rowCount() > 0 )
			return $result->rowCount();
		else
			return 0;
	}
	
	function getTotalFeedbackCount(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'restaurant_user_id'	=> $_SESSION['user_id'],
		);
	
		$result = $db->queryWithParamsArray("SELECT * from feedback_remarks where restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return $result->rowCount();
		else
			return 0;
	}
	
	function getAllFeedback(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'restaurant_user_id'	=> $_SESSION['user_id']
		);
	
		$result = $db->queryWithParamsArray("SELECT * from feedback_remarks where restaurant_user_id=:restaurant_user_id order by feedback_id desc", $array);
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	
	function UpdateFeedback(){
		$db = new Database();
	
		$array = array(
				'restaurant_user_id'	=> $_SESSION['user_id'],
				'status' => 'checked'
		);
	
		$result = $db->queryWithParamsArray("UPDATE feedback_remarks set status=:status WHERE restaurant_user_id=:restaurant_user_id", $array);
	
		if($result)
			return TRUE;
		else
			return FALSE;
	}
}

?>