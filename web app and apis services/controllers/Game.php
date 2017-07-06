<?php
include_once('Database.php');
class Game{
	
	function insert($game_bundel_id, $game_image, $game_status, $game_table){
		$db = new Database();
		
		$array = array(
				'game_bundel_id'      	=> $game_bundel_id,
				'game_image'      	=> $game_image,
				'restaurant_user_id'	=> $_SESSION['user_id'],
				'game_status'       => $game_status,
				'game_table'		=> $game_table
		);
	
		
		$stmt = $db->queryWithParamsArray("insert into games(restaurant_user_id,game_bundel_id, game_image,game_status,game_table)  values(:restaurant_user_id,:game_bundel_id, :game_image,:game_status,:game_table)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function update($game_id,$game_status){
			$db = new Database();
	
			$array = array(
					'game_id'		  => $game_id,
					'game_status'    => $game_status
			);
	
	
			$stmt = $db->queryWithParamsArray("UPDATE games set game_status=:game_status WHERE game_id=:game_id ",$array);
			if($stmt){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	function edit($game_id, $game_bundel_id, $game_image, $game_status,$game_table){
			$db = new Database();
		
			$array = array(
					'game_id'		  => $game_id,
					'game_bundel_id'    => $game_bundel_id,
					'game_image'    => $game_image,
					'game_status'    => $game_status,
					'game_table'  => $game_table
			);
		
			$stmt = $db->queryWithParamsArray("UPDATE games set game_bundel_id=:game_bundel_id, game_image=:game_image, game_status=:game_status, game_table=:game_table WHERE game_id=:game_id ",$array);
			if($stmt){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		
		function delete($game_id) {
			$db = new Database();
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
			$array = array(
					'game_id' => $game_id
			);
		
			$result = $db->queryWithParamsArray("DELETE FROM games where game_id=:game_id", $array);
			if($result)
				return TRUE;
			else
				return FALSE;
		}
		
		function getGameDetail($game_id){
			$db = new Database();
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
			$array = array(
					'game_id'      => $game_id
			);
		
			$stmt = $db->queryWithParamsArray("select * from games where game_id=:game_id ",$array);
			if($stmt){
				return $stmt->fetch();
			}
			else{
				return FALSE;
			}
		}
	
	
	function isDuplicate($game_bundel_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'game_bundel_id'	      => $game_bundel_id,
				'restaurant_user_id'		=> $_SESSION['user_id']
		);
	
		$result = $db->queryWithParamsArray("SELECT * from games where game_bundel_id=:game_bundel_id AND restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return TRUE;
		else
			return FALSE;
	}
	
	function getDetail(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'restaurant_user_id'	      => $_SESSION['user_id']
		);
	
		$result = $db->queryWithParamsArray("SELECT * from game_pay where restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return $result->fetch();
		else
			return FALSE;
	}
	
	function updateGamePay($is_pay){
		$db = new Database();
	
		$array = array(
				'is_pay'		  => $is_pay,
				'restaurant_user_id'      => $_SESSION['user_id']
		);
	
	
		$stmt = $db->queryWithParamsArray("UPDATE game_pay set is_pay=:is_pay  WHERE restaurant_user_id=:restaurant_user_id ",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
}

?>