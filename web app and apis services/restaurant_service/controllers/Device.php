<?php
include_once('Database.php');
class Device{
	
	function updateDevice($restaurant_user_id, $device_name, $device_uuid , $table_no){
		$db = new Database();
		
		$array = array(
				'restaurant_user_id'  => $restaurant_user_id,
				'device_name'	      => $device_name,
				'device_uuid'	      => $device_uuid,
				'table_no'	      	  => $table_no
		);
		
		$stmt = $db->queryWithParamsArray("Update table_info set device_name=:device_name,device_uuid=:device_uuid where restaurant_user_id=:restaurant_user_id
		And table_no=:table_no",$array);

		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
}

?>