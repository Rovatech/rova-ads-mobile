<?php
include_once('Database.php');
class Table{
	
function getAllTables($restaurant_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_user_id'	      => $restaurant_id
		); 
		
		$result = $db->queryWithParamsArray("SELECT * from  table_info where restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	function insertTableAvailability($array){
		$db = new Database();
	
		$stmt = $db->queryWithParamsArray("insert into table_availability(restaurant_user_id, aval_status,
				table_no)
				values(:restaurant_user_id, :aval_status, :table_no)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function removeTableAvailability($array){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
		$stmt = $db->queryWithParamsArray("DELETE from table_availability WHERE restaurant_user_id =:restaurant_user_id
				AND table_no=:table_no",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	
	function isDuplicate($restaurant_user_id, $table_no){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_user_id'	      => $restaurant_user_id,
				'table_no'	      => $table_no
		);
	
		$result = $db->queryWithParamsArray("SELECT * from table_availability where restaurant_user_id =:restaurant_user_id
				AND table_no=:table_no", $array);
	
		if($result->rowCount() > 0 )
			return TRUE;
		else
			return FALSE;
	
	}

}

?>