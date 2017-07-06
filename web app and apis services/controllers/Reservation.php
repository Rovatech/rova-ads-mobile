<?php
include_once('Database.php');
class Reservation{

	function getNewReservationCount(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'restaurant_user_id'	      => $_SESSION['user_id'],
				'reservation_status'              => "pending"
		);
	
		$result = $db->queryWithParamsArray("SELECT * from   reservation where restaurant_user_id =:restaurant_user_id  AND reservation_status=:reservation_status", $array);
		if($result->rowCount() > 0 )
			return $result->rowCount();
		else
			return 0;
	}
	
	function getRestaurantReservation($reservation_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'reservation_id'   => $reservation_id
	
		);
	
		$result = $db->queryWithParamsArray("SELECT * from reservation where reservation_id =:reservation_id", $array);
	
		if($result->rowCount() > 0 )
			return $result->fetch();
		else
			return FALSE;
	}
	
	function UpdateReservation($reservation_id, $reservation_status){
		$db = new Database();
	
		$array = array(
				'reservation_id'   => $reservation_id,
				'reservation_status' => $reservation_status
		);
	
		$result = $db->queryWithParamsArray("UPDATE reservation set reservation_status=:reservation_status WHERE reservation_id=:reservation_id", $array);
	
		if($result)
			return TRUE;
		else
			return FALSE;
	}
	
}

?>