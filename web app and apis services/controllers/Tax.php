<?php
include_once('Database.php');
class Tax{
	
	function insert($tax_rate){
		$db = new Database();
		
		$array = array(
				'tax_rate'      => $tax_rate,
				'restaurant_user_id'      => $_SESSION['user_id']
		);
	
		
		$stmt = $db->queryWithParamsArray("insert into  tax_rate(tax_rate, restaurant_user_id)  
				values(:tax_rate, :restaurant_user_id)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function update($tax_rate){
		$db = new Database();
	
		$array = array(
				'tax_rate'		  => $tax_rate,
				'restaurant_user_id'      => $_SESSION['user_id']
		);
	
	
		$stmt = $db->queryWithParamsArray("UPDATE  tax_rate set tax_rate=:tax_rate  WHERE restaurant_user_id=:restaurant_user_id ",$array);
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
		
		$result = $db->queryWithParamsArray("SELECT * from tax_rate where restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return $result->fetch();
		else
			return FALSE;
	}
	

	
}

?>