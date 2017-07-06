<?php
include_once('Database.php');
class Reservation{
	
	function insert($array){
		$db = new Database();
	
		$stmt = $db->queryWithParamsArray("insert into reservation(restaurant_user_id,customer, customer_type,
				reservation_customer_name, reservation_customer_email, reservation_person, reservation_date, reservation_time, reservation_phone, reservation_status)
				values(:restaurant_user_id, :customer, :customer_type, :reservation_customer_name,
				:reservation_customer_email, :reservation_person, :reservation_date, :reservation_time, :reservation_phone, :reservation_status)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
}

?>