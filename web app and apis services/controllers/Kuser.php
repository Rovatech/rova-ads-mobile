<?php
include_once('Database.php');
class Kuser{
	
	function insert($kuser_name,$kuser_pass, $kemail, $kstatus){
		$db = new Database();
		
		$array = array(
				'kuser_name'      	  => $kuser_name,
				'kuser_pass'	      	  => $kuser_pass,
				'kemail'	      => $kemail,
				'kstatus'	      => $kstatus,
				'restaurant_user_id' => $_SESSION['user_id'],
				'kuser_created_on'	  => date('Y-m-d')
		);
	
		
		$stmt = $db->queryWithParamsArray("insert into kitchen_user(kuser_name,kuser_pass, kemail, 
				kstatus, restaurant_user_id,kuser_created_on) values(:kuser_name, :kuser_pass, :kemail, :kstatus, :restaurant_user_id, :kuser_created_on)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
		function update($user_id,$user_status){
			$db = new Database();
	
			$array = array(
					'kid'		  => $user_id,
					'kstatus'      => $user_status
			);
	
			$stmt = $db->queryWithParamsArray("UPDATE kitchen_user set kstatus=:kstatus WHERE kid=:kid ",$array);
			if($stmt){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	
	function delete($user_id) {
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'user_id' => $user_id
		);
	
		$result = $db->queryWithParamsArray("DELETE FROM kitchen_user where kid=:user_id", $array);
		if($result)
			return TRUE;
		else
			return FALSE;
	}
	
	
	function isDuplicateKUser($kuser_name = null, $restaurant_user_id = null){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'kuser_name' => $kuser_name,
				'restaurant_user_id' => $restaurant_user_id,
				
		);
		$result = $db->queryWithParamsArray("SELECT kuser_name from kitchen_user where kuser_name=:kuser_name AND restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return TRUE;
		else
			return FALSE;
	}
	
}

?>