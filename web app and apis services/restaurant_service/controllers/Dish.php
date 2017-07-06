<?php
include_once('Database.php');
class Dish{
	
	function getAllCategories($restaurant_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_id'	      => $restaurant_id,
				'category_status'	  => "Y",
				'is_drink'			  => "N"
		); 
		
		$result = $db->queryWithParamsArray("SELECT * from dish_category 
				where restaurant_user_id =:restaurant_id AND category_status=:category_status AND is_drink=:is_drink", $array);
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	function getAllDrinkCategories($restaurant_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_id'	      => $restaurant_id,
				'category_status'	  => "Y",
				'is_drink'			  => "Y"	
		); 
		
		$result = $db->queryWithParamsArray("SELECT * from dish_category 
				where restaurant_user_id =:restaurant_id AND category_status=:category_status AND is_drink=:is_drink", $array);
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	function getCategoryDetail($category_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'category_id'	      => $category_id,
				'category_status'	  => "Y"
		);
	
		$result = $db->queryWithParamsArray("SELECT * from dish_category 
				where category_id =:category_id AND category_status=:category_status", $array);
		
		if($result->rowCount() > 0 )
			return $result->fetch();
		else
			return FALSE;
	}
	
	function getAllDishes($restaurant_id, $category_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_user_id'	      => $restaurant_id,
				'restaurant_category_id'	  => $category_id,
				'dish_status'	  => "Y"
		);
	
		$result = $db->queryWithParamsArray("SELECT dish.*,unit_setting.unit_name from dish inner join unit_setting on dish.dish_unit=unit_setting.unit_id
				where dish.restaurant_user_id =:restaurant_user_id AND dish.restaurant_category_id=:restaurant_category_id
				AND dish.dish_status=:dish_status", $array);
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	
	function getAllHotDishes($restaurant_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_user_id'	      => $restaurant_id,
				'dish_hot'	  => 'Y',
				'dish_status'	  => "Y"
		);
	
		$result = $db->queryWithParamsArray("SELECT dish_category.is_drink, dish.*,unit_setting.unit_name from dish join dish_category on dish_category.category_id=dish.restaurant_category_id inner join unit_setting on dish.dish_unit=unit_setting.unit_id
				where dish.restaurant_user_id =:restaurant_user_id AND dish.dish_hot=:dish_hot
				AND dish.dish_status=:dish_status", $array);
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	
	function getDishDetail($dish_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'dish_id'	      => $dish_id,
				'dish_status'	  => "Y"
		);
	
		$result = $db->queryWithParamsArray("SELECT dish.dish_id,dish.restaurant_user_id,dish_name,
				dish_description,dish_price,dish_image,calories_per_100_grams,dish_discount,average_cooking_time_min,
				dish_hot,unit_name 
				from dish inner join unit_setting 
				ON dish.dish_unit=unit_setting.unit_id 
				where dish.dish_id =:dish_id AND dish.dish_status=:dish_status", $array);
	
		if($result->rowCount() > 0 )
			return $result->fetch();
		else
			return FALSE;
	}
	
	function getDishIng($dish_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'resturant_dish_id'	      => $dish_id,
				'ingredient_status'	  => "Y"
		);
	
		$result = $db->queryWithParamsArray("SELECT ingredient_name from dish_major_ingredients
				where resturant_dish_id =:resturant_dish_id AND ingredient_status=:ingredient_status", $array);
	
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	
	/******************************* Favourite Dish Functions *****************************************/
	function insertFavDishes($array){
		$db = new Database();
	
		$stmt = $db->queryWithParamsArray("insert into favourite_dishes(restaurant_user_id, customer_type,
				customer, restaurant_dish_id)
				values(:restaurant_user_id, :customer_type, :customer, :restaurant_dish_id)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function removeFavDishes($array){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
		$stmt = $db->queryWithParamsArray("DELETE from favourite_dishes WHERE customer =:customer
				AND customer_type=:customer_type AND restaurant_user_id=:restaurant_user_id AND 
				restaurant_dish_id=:restaurant_dish_id",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function getFavDishes($customer, $customer_type, $restaurant_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'customer'	      => $customer,
				'customer_type'	      => $customer_type,
				'restaurant_user_id' => $restaurant_id,
				'dish_status' => 'Y'
		);
		
		$result = $db->queryWithParamsArray("SELECT dish.*,unit_setting.unit_name from dish inner join favourite_dishes on dish.dish_id = favourite_dishes.restaurant_dish_id inner join unit_setting on dish.dish_unit = unit_setting.unit_id where favourite_dishes.customer =:customer 
				AND favourite_dishes.customer_type=:customer_type AND favourite_dishes.restaurant_user_id=:restaurant_user_id AND dish.dish_status=:dish_status ", $array);
		
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
		
	}
	
	function isDuplicate($restaurant_user_id, $customer_type, $customer, $restaurant_dish_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_user_id'	      => $restaurant_user_id,
				'restaurant_dish_id'	      => $restaurant_dish_id,
				'customer_type'	      => $customer_type,
				'customer'	      => $customer
		);
	
		$result = $db->queryWithParamsArray("SELECT * from favourite_dishes	where customer =:customer
				AND customer_type=:customer_type AND restaurant_user_id=:restaurant_user_id AND 
				restaurant_dish_id=:restaurant_dish_id", $array);
	
		if($result->rowCount() > 0 )
			return TRUE;
		else
			return FALSE;
	
	}
	/******************************* END Favourite Dish Functions *****************************************/

}

?>