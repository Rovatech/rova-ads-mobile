<?php
include_once('Database.php');
class Currency{
	
	function insert($currency_sign){
		$db = new Database();
		
		$array = array(
				'currency_sign'      => $currency_sign,
				'restaurant_user_id'      => $_SESSION['user_id']
		);
	
		
		$stmt = $db->queryWithParamsArray("insert into currency(currency_sign, restaurant_user_id)  
				values(:currency_sign, :restaurant_user_id)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function update($currency_sign){
		$db = new Database();
	
		$array = array(
				'currency_sign'		  => $currency_sign,
				'restaurant_user_id'      => $_SESSION['user_id']
		);
	
	
		$stmt = $db->queryWithParamsArray("UPDATE currency set currency_sign=:currency_sign  WHERE restaurant_user_id=:restaurant_user_id ",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function getDetail(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'restaurant_user_id'	      => $_SESSION['user_id']
		);
		
		$result = $db->queryWithParamsArray("SELECT * from currency where restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return $result->fetch();
		else
			return FALSE;
	}
	

	
}

?>