<?php
include_once('Database.php');
class Unit{
	
	function insert($unit_name, $status){
		$db = new Database();
		
		$array = array(
				'unit_name'      	=> $unit_name,
				'restaurant_user_id'	=> $_SESSION['user_id'],
				'unit_status'       => $status
		);
	
		
		$stmt = $db->queryWithParamsArray("insert into unit_setting(restaurant_user_id,unit_name, unit_status)  values(:restaurant_user_id, :unit_name, :unit_status)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function update($unit_id,$unit_status){
			$db = new Database();
	
			$array = array(
					'unit_id'		  => $unit_id,
					'unit_status'    => $unit_status
			);
	
	
			$stmt = $db->queryWithParamsArray("UPDATE unit_setting set unit_status=:unit_status WHERE unit_id=:unit_id ",$array);
			if($stmt){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	function edit($unit_id, $unit_name, $unit_status){
			$db = new Database();
		
			$array = array(
					'unit_id'		  => $unit_id,
					'unit_name'    => $unit_name,
					'unit_status'    => $unit_status
			);
		
			$stmt = $db->queryWithParamsArray("UPDATE unit_setting set unit_name=:unit_name, unit_status=:unit_status WHERE unit_id=:unit_id ",$array);
			if($stmt){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		
		function delete($unit_id) {
			$db = new Database();
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
			$array = array(
					'unit_id' => $unit_id
			);
		
			$result = $db->queryWithParamsArray("DELETE FROM unit_setting where unit_id=:unit_id", $array);
			if($result)
				return TRUE;
			else
				return FALSE;
		}
		
		function getUnitDetail($unit_id){
			$db = new Database();
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
			$array = array(
					'unit_id'      => $unit_id
			);
		
			$stmt = $db->queryWithParamsArray("select * from unit_setting where unit_id=:unit_id ",$array);
			if($stmt){
				return $stmt->fetch();
			}
			else{
				return FALSE;
			}
		}
	
	function getAllUnits(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'restaurant_user_id'	      => $_SESSION['user_id'],
				'unit_status'              => "Y"
		);
		
		$result = $db->queryWithParamsArray("SELECT * from  unit_setting where unit_status=:unit_status AND restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	
	function isDuplicate($unit_name){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'unit_name'	      => $unit_name,
				'restaurant_user_id'		=> $_SESSION['user_id']
		);
	
		$result = $db->queryWithParamsArray("SELECT * from unit_setting where unit_name=:unit_name AND restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return TRUE;
		else
			return FALSE;
	}
	
}

?>