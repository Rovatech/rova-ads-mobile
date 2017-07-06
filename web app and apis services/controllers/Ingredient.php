<?php
include_once('Database.php');
class Ingredient{
	
	function insert($dish_id, $ingredient_name,$status){
		$db = new Database();
		
		$array = array(
				'resturant_dish_id'      	=> $dish_id,
				'ingredient_name'	=> $ingredient_name,
				'ingredient_status'       => $status
		);
	
		
		$stmt = $db->queryWithParamsArray("insert into  dish_major_ingredients(resturant_dish_id,ingredient_name, ingredient_status)  values(:resturant_dish_id, :ingredient_name, :ingredient_status)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function update($ingredient_id, $status){
			$db = new Database();
	
			$array = array(
				'ingredient_id'		  => $ingredient_id,
				'ingredient_status'       => $status
			);
	
	
			$stmt = $db->queryWithParamsArray("UPDATE dish_major_ingredients set ingredient_status=:ingredient_status WHERE ingredient_id=:ingredient_id ",$array);
			if($stmt){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	function edit($ingredient_id, $dish_id, $ingredient_name,$status){
			$db = new Database();
		
			$array = array(
				'ingredient_id'          => $ingredient_id,	
				'resturant_dish_id'       => $dish_id,
				'ingredient_name'		  => $ingredient_name,
				'ingredient_status'       => $status
			);
		
			$stmt = $db->queryWithParamsArray("UPDATE dish_major_ingredients set resturant_dish_id=:resturant_dish_id, ingredient_name=:ingredient_name, ingredient_status=:ingredient_status WHERE ingredient_id=:ingredient_id ",$array);
			if($stmt){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		
		function delete($ingredient_id) {
			$db = new Database();
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
			$array = array(
					'ingredient_id' => $ingredient_id
			);
		
			$result = $db->queryWithParamsArray("DELETE FROM dish_major_ingredients where ingredient_id=:ingredient_id", $array);
			if($result)
				return TRUE;
			else
				return FALSE;
		}
		
		function getIngredientDetail($ingredient_id){
			$db = new Database();
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
			$array = array(
					'ingredient_id'      => $ingredient_id
			);
		
			$stmt = $db->queryWithParamsArray("select * from dish_major_ingredients where ingredient_id=:ingredient_id ",$array);
			if($stmt){
				return $stmt->fetch();
			}
			else{
				return FALSE;
			}
		}
	
// 	function getAllUnits(){
// 		$db = new Database();
// 		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
// 		$array = array(
// 				'restaurant_user_id'	      => $_SESSION['user_id'],
// 				'unit_status'              => "Y"
// 		);
		
// 		$result = $db->queryWithParamsArray("SELECT * from  unit_setting where unit_status=:unit_status AND restaurant_user_id=:restaurant_user_id", $array);
// 		if($result->rowCount() > 0 )
// 			return $result->fetchAll();
// 		else
// 			return FALSE;
// 	}
	
	function isDuplicate($ingredient_name, $dish_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'ingredient_name'	      => $ingredient_name,
				'resturant_dish_id'		=> $dish_id
		);
	
		$result = $db->queryWithParamsArray("SELECT * from dish_major_ingredients where ingredient_name=:ingredient_name AND resturant_dish_id=:resturant_dish_id", $array);
		if($result->rowCount() > 0 )
			return TRUE;
		else
			return FALSE;
	}
	
}

?>