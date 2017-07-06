<?php
include_once('Database.php');
class Resturants{
	
	function getAllRestaurants(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'user_status'	      => "Y",
				'user_role'	      => "**"
		); 
		
		$result = $db->queryWithParamsArray("SELECT user_id,user_name,user_email,owner_name,restaurant_name,user_address,
				city,country,postal_code,user_phone,user_image,langitude,latitude,user_status
				from restaurant_user where user_status =:user_status AND user_role=:user_role", $array);
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	
	function getRestaurantDetail($restaurant_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_id'	      => $restaurant_id,
				'user_status'	      => "Y"
		);
	
		$result = $db->queryWithParamsArray("SELECT user_id,user_name,user_email,user_name,owner_name,restaurant_name,user_address,
				city,country,postal_code,user_phone,user_image,langitude,latitude,user_status
				from restaurant_user where user_status =:user_status AND user_id=:restaurant_id", $array);
		
		if($result->rowCount() > 0 )
			return $result->fetch();
		else
			return FALSE;
	}
	
	function getRestaurantUtils($restaurant_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_id'	      => $restaurant_id,
				'user_status'	      => "Y"
		);
	
		$result = $db->queryWithParamsArray("select restaurant_user.user_name ,restaurant_user.user_pass,tax_rate.tax_rate, currency.currency_sign  from restaurant_user
				 inner join tax_rate on restaurant_user.user_id =  tax_rate.restaurant_user_id inner join 
				currency on restaurant_user.user_id = currency.restaurant_user_id where restaurant_user.user_id = :restaurant_id AND restaurant_user.user_status = :user_status ", $array);
	
		if($result->rowCount() > 0 )
			return $result->fetch();
		else
			return FALSE;
	}
	/******************************* Favourite Restaurant Functions *****************************************/
	function insertFavRest($array){
		$db = new Database();
	
		$stmt = $db->queryWithParamsArray("insert into favourite_restaurant(restaurant_user_id, customer_type, customer)
				values(:restaurant_user_id, :customer_type, :customer)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function getFavRest($customer, $customer_type){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'customer'	      => $customer,
				'customer_type'	      => $customer_type
		);
	
		$result = $db->queryWithParamsArray("SELECT * from favourite_restaurant	where customer =:customer 
				AND customer_type=:customer_type", $array);
	
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	
	}
	function removeFavRest($array){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$stmt = $db->queryWithParamsArray("DELETE from favourite_restaurant WHERE restaurant_user_id =:restaurant_user_id
				AND customer_type=:customer_type AND customer=:customer",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function isDuplicate($restaurant_user_id, $customer_type, $customer){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'restaurant_user_id'	      => $restaurant_user_id,
				'customer_type'	      => $customer_type,
				'customer'	      => $customer
		);
	
		$result = $db->queryWithParamsArray("SELECT * from favourite_restaurant	where customer =:customer
				 AND customer_type=:customer_type AND restaurant_user_id=:restaurant_user_id", $array);
	
		if($result->rowCount() > 0 )
			return TRUE;
		else
			return FALSE;
	
	}
	/******************************* END Restaurants Functions *****************************************/
	
}

?>