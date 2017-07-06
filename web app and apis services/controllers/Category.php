<?php
include_once('Database.php');
class Category{
	
	function insert($category_name, $category_image, $status, $is_drink){
		$db = new Database();
		
		$array = array(
				'category_name'      	=> $category_name,
				'category_image'      	=> $category_image,
				'restaurant_user_id'	=> $_SESSION['user_id'],
				'category_created_on' 	=> date('Y-m-d'),
				'category_status'       => $status,
				'is_drink'			    => $is_drink
		);
	
		
		$stmt = $db->queryWithParamsArray("insert into dish_category(restaurant_user_id,category_name, category_image,category_created_on,category_status, is_drink)  values(:restaurant_user_id, :category_name, :category_image, :category_created_on, :category_status,:is_drink)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function update($category_id,$category_status){
			$db = new Database();
	
			$array = array(
					'category_id'		  => $category_id,
					'category_status'    => $category_status
			);
	
	
			$stmt = $db->queryWithParamsArray("UPDATE dish_category set category_status=:category_status WHERE category_id=:category_id ",$array);
			if($stmt){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	function edit($category_id, $category_name, $category_image, $category_status, $is_drink){
			$db = new Database();
		
			$array = array(
					'category_id'		  => $category_id,
					'category_name'    => $category_name,
					'category_image'    => $category_image,
					'category_status'    => $category_status,
					'is_drink'			=> $is_drink	
			);
		
			$stmt = $db->queryWithParamsArray("UPDATE dish_category set category_name=:category_name, category_image=:category_image, category_status=:category_status, is_drink=:is_drink WHERE category_id=:category_id ",$array);
			if($stmt){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		
		function delete($category_id) {
			$db = new Database();
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
			$array = array(
					'category_id' => $category_id
			);
		
			$result = $db->queryWithParamsArray("DELETE FROM dish_category where category_id=:category_id", $array);
			if($result)
				return TRUE;
			else
				return FALSE;
		}
		
		function getCategoryDetail($category_id){
			$db = new Database();
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
			$array = array(
					'category_id'      => $category_id
			);
		
			$stmt = $db->queryWithParamsArray("select * from dish_category where category_id=:category_id ",$array);
			if($stmt){
				return $stmt->fetch();
			}
			else{
				return FALSE;
			}
		}
	
	function getAllCategories(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'restaurant_user_id'	      => $_SESSION['user_id'],
				'category_status'              => "Y"
		);
		
		$result = $db->queryWithParamsArray("SELECT * from dish_category where category_status=:category_status AND restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	
	function isDuplicate($category_name){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'category_name'	      => $category_name,
				'restaurant_user_id'		=> $_SESSION['user_id']
		);
	
		$result = $db->queryWithParamsArray("SELECT * from dish_category where category_name=:category_name AND restaurant_user_id=:restaurant_user_id", $array);
		if($result->rowCount() > 0 )
			return TRUE;
		else
			return FALSE;
	}
	
}

?>