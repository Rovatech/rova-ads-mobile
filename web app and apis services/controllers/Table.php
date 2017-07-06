<?php
include_once('Database.php');
class Table{
	
	function insert($table_no, $table_description){
		$db = new Database();
		
		$array = array(
				'table_no'      	      => $table_no,
				'restaurant_user_id'	  => $_SESSION['user_id'],
				'tableqr'				  => $_SESSION['user_id'].",".$table_no,
				'table_description'       => $table_description
		);
	
		
		$stmt = $db->queryWithParamsArray("insert into table_info(restaurant_user_id,table_no, tableqr, table_description)  values(:restaurant_user_id, :table_no, :tableqr, :table_description)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
		function delete($table_id) {
			$db = new Database();
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
			$array = array(
					'table_id' => $table_id
			);
		
			$result = $db->queryWithParamsArray("DELETE FROM table_info where table_id=:table_id", $array);
			if($result)
				return TRUE;
			else
				return FALSE;
		}
		
	
	function getAllTables(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'restaurant_user_id'	      => $_SESSION['user_id']
		);
		
		$result = $db->queryWithParamsArray("SELECT * from  table_info where restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	
	
	function getTablesAvailability(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'restaurant_user_id'	      => $_SESSION['user_id']
		);
	
		$result = $db->queryWithParamsArray("SELECT table_info.*,table_availability.aval_status FROM table_info left join table_availability on table_info.table_no = table_availability.table_no where table_info.restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	
	function isDuplicate($table_no){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'table_no'	      => $table_no,
				'restaurant_user_id'		=> $_SESSION['user_id']
		);
	
		$result = $db->queryWithParamsArray("SELECT * from table_info where table_no=:table_no AND restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return TRUE;
		else
			return FALSE;
	}
	
}

?>