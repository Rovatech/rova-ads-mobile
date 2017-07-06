<?php
include_once('Database.php');
class Dish{
	
	function insert($restaurant_category_id, $dish_name, $dish_description,$dish_price, $dish_image, $calories_per_100_grams, 
			$dish_discount,$average_cooking_time_min, $dish_hot, $dish_unit, $dish_status){
		$db = new Database();
		
		$array = array(
				'restaurant_category_id'      	=> $restaurant_category_id,
				'dish_name'      				=> $dish_name,
				'dish_description'				=> $dish_description,
				'dish_price' 					=> $dish_price,
				'dish_image'   				    => $dish_image,
				'calories_per_100_grams'        => $calories_per_100_grams,
				'dish_discount'     			=> $dish_discount,
				'average_cooking_time_min'      => $average_cooking_time_min,
				'dish_hot'      				=> $dish_hot,
				'dish_unit'    					=> $dish_unit,
				'dish_status'      				=> $dish_status,
				'restaurant_user_id' 			=> $_SESSION['user_id'],
				'dish_created_on'     			=> date('Y-m-d')
		);
	
		
		$stmt = $db->queryWithParamsArray("insert into dish(restaurant_user_id,restaurant_category_id,dish_name, 
				dish_description,dish_price,dish_image,calories_per_100_grams,dish_discount,average_cooking_time_min,dish_hot,
				dish_unit,dish_status,dish_created_on)  values(:restaurant_user_id, :restaurant_category_id, :dish_name,
				:dish_description, :dish_price, :dish_image, :calories_per_100_grams, :dish_discount, :average_cooking_time_min,
				:dish_hot, :dish_unit, :dish_status, :dish_created_on)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function update($dish_id,$dish_status){
			$db = new Database();
	
			$array = array(
					'dish_id'		  => $dish_id,
					'dish_status'    => $dish_status
			);
	
	
			$stmt = $db->queryWithParamsArray("UPDATE dish set dish_status=:dish_status WHERE dish_id=:dish_id ",$array);
			if($stmt){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	function edit($dish_id, $restaurant_category_id, $dish_name, $dish_description,$dish_price, $dish_image, $calories_per_100_grams, 
			$dish_discount,$average_cooking_time_min, $dish_hot, $dish_unit, $dish_status){
			$db = new Database();
		
			$array = array(
				'dish_id'    					=> $dish_id,
				'restaurant_category_id'      	=> $restaurant_category_id,
				'dish_name'      				=> $dish_name,
				'dish_description'				=> $dish_description,
				'dish_price' 					=> $dish_price,
				'dish_image'   				    => $dish_image,
				'calories_per_100_grams'        => $calories_per_100_grams,
				'dish_discount'     			=> $dish_discount,
				'average_cooking_time_min'      => $average_cooking_time_min,
				'dish_hot'      				=> $dish_hot,
				'dish_unit'    					=> $dish_unit,
				'dish_status'      				=> $dish_status,
		);
	
		
			$stmt = $db->queryWithParamsArray("UPDATE dish set restaurant_category_id=:restaurant_category_id ,dish_name= :dish_name, 
				dish_description= :dish_description ,dish_price =:dish_price ,dish_image=:dish_image ,calories_per_100_grams =:calories_per_100_grams ,
					dish_discount =:dish_discount ,average_cooking_time_min =:average_cooking_time_min ,dish_hot =:dish_hot,
				dish_unit=:dish_unit ,dish_status=:dish_status WHERE dish_id=:dish_id ",$array);
			if($stmt){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		
		function delete($dish_id) {
			$db = new Database();
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
			$array = array(
					'dish_id' => $dish_id
			);
		
			$result = $db->queryWithParamsArray("DELETE FROM dish where dish_id=:dish_id", $array);
			if($result)
				return TRUE;
			else
				return FALSE;
		}
		
		function getDishDetail($dish_id){
			$db = new Database();
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
			$array = array(
					'dish_id'      => $dish_id
			);
		
			$stmt = $db->queryWithParamsArray("select * from dish where dish_id=:dish_id ",$array);
			if($stmt){
				return $stmt->fetch();
			}
			else{
				return FALSE;
			}
		}
	
	function getAllDishes(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'restaurant_user_id'	      => $_SESSION['user_id'],
				'dish_status'              => "Y"
		);
		
		$result = $db->queryWithParamsArray("SELECT * from dish where dish_status=:dish_status AND restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	
	function isDuplicate($dish_name){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'dish_name'	      			=> $dish_name,
				'restaurant_user_id'		=> $_SESSION['user_id']
		);
	
		$result = $db->queryWithParamsArray("SELECT * from dish where dish_name=:dish_name AND restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return TRUE;
		else
			return FALSE;
	}
	
}

?>