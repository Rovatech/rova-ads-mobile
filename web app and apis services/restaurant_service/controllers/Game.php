<?php
include_once('Database.php');
class Game{
	
	function getAllGames($restaurant_id, $tableno){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_id'	      => $restaurant_id,
				'game_table'	      => $tableno,
				'game_status'	  => "Y"
		); 
		
		$result = $db->queryWithParamsArray("SELECT * from games 
				where restaurant_user_id =:restaurant_id AND game_status=:game_status AND game_table=:game_table", $array);
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	
	function getPayDetail(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'restaurant_user_id'	      => 1
		);
	
		$result = $db->queryWithParamsArray("SELECT * from game_pay where restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return $result->fetch();
		else
			return FALSE;
	}

}

?>