<?php
include_once('Database.php');
class Restaurant{
	
	function insert($user_name,$user_pass, $user_email, $owner_name, $restaurant_name,
				$user_address, $city, $country, $postal_code, $langitude ,$latitude,  $user_phone, $user_image, $status){
		$db = new Database();
		
		$array = array(
				'user_name'      	  => $user_name,
				'user_pass'	      	  => $user_pass,
				'user_email'	      => $user_email,
				'owner_name'	      => $owner_name,
				'restaurant_name'	  => $restaurant_name,
				'user_address'	      => $user_address,
				'city'	      		  => $city,
				'country'	      	  => $country,
				'postal_code'	      => $postal_code,
				'langitude'	          => $langitude,
				'latitude'	          => $latitude,
				'user_phone'	      => $user_phone,
				'user_image'	      => $user_image,
				'user_created_on'	  => date('Y-m-d'),
				'user_role'	  		  => '**',
				'is_active'           => $status
		);
	
		
		$stmt = $db->queryWithParamsArray("insert into restaurant_user(user_name,user_pass, user_email, 
				owner_name, restaurant_name,user_address, city, country, postal_code, langitude, latitude, user_phone, user_image, user_created_on, user_role, user_status)
					values(:user_name, :user_pass, :user_email, :owner_name, :restaurant_name, :user_address, :city, :country, :postal_code, :langitude, :latitude, :user_phone, 
				:user_image, :user_created_on, :user_role, :is_active)",$array);
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
					'user_id'		  => $user_id,
					'user_status'      => $user_status,
			);
	
	
			$stmt = $db->queryWithParamsArray("UPDATE restaurant_user set user_status=:user_status WHERE user_id=:user_id ",$array);
			if($stmt){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	
// 	function update($category_id,$category_name,$status){
// 		$db = new Database();
	
// 		$array = array(
// 				'category_id'		  => $category_id,	
// 				'category_name'      => $category_name,
// 				'laundry_id'	      => $_SESSION['user_id'],
// 				'is_active'              => $status
// 		);
	
	
// 		$stmt = $db->queryWithParamsArray("UPDATE laundry_category set category_name=:category_name, laundry_id=:laundry_id, category_status=:is_active  WHERE category_id=:category_id ",$array);
// 		if($stmt){
// 			return TRUE;
// 		}
// 		else{
// 			return FALSE;
// 		}
// 	}
	
	function delete($user_id) {
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'user_id' => $user_id,
		);
	
		$result = $db->queryWithParamsArray("DELETE FROM restaurant_user where user_id=:user_id", $array);
		if($result)
			return TRUE;
		else
			return FALSE;
	}
	
	function getRestaurantDetail($user_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'user_id'      => $user_id
		);
	
		$stmt = $db->queryWithParamsArray("select * from restaurant_user where user_id=:user_id ",$array);
		if($stmt){
			return $stmt->fetch();
		}
		else{
			return FALSE;
		}
	}
	
	
	
	function getCategories(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'laundry_id'	      => $_SESSION['user_id'],
				'is_active'              => "Y"
		);
		
		$result = $db->queryWithParamsArray("SELECT * from laundry_category where category_status=:is_active AND laundry_id=:laundry_id", $array);
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	
	function isDuplicateUser($user_name = null){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'user_name' => $user_name
		);
		$result = $db->queryWithParamsArray("SELECT user_name from restaurant_user where user_name=:user_name", $array);
		if($result->rowCount() > 0 )
			return TRUE;
		else
			return FALSE;
	}
	
}

?>