<?php
session_start();
include_once '../controllers/Dish.php';

	$dish_id 				= $_POST['dish_id'];
	$dish_image_old 		= $_POST['dish_image_old'];
 	$category_id   			= $_POST['category_id'];
 	$dish_name 				= $_POST['dish_name'];
 	$dish_description  		= $_POST['dish_description'];
 	$dish_price 			= $_POST['dish_price'];	
 	$calories_per_100_grams = $_POST['calories_per_100_grams'];
 	$dish_discount 			= $_POST['dish_discount'];
 	$average_cooking_time_min = $_POST['average_cooking_time_min'];
 	$dish_unit				= $_POST['dish_unit'];
 	$dish_status 			= $_POST['dish_status'];
 	$dish_hot				= $_POST['dish_hot'];
 	
 	$dish_image = $_FILES['dish_image']['name'];
 	
	$dish = new Dish();
	
		if(isset($category_id) && isset($dish_unit))
		{
			if($_FILES["dish_image"]["size"] > 0)
			{
				//$target_path = "../images/".$_SESSION['user_name']."/dish/";
				$target_path = dirname(__DIR__)."/images/".$_SESSION['user_name']."/dish/";
				
			
				$target_path = $target_path . basename( $_FILES['dish_image']['name']);
			
				move_uploaded_file($_FILES['dish_image']['tmp_name'], $target_path);
			}
			else
			{
				$dish_image = $dish_image_old;
			}
			
			$insert = $dish->edit($dish_id, $category_id, $dish_name, $dish_description, $dish_price, $dish_image, $calories_per_100_grams, $dish_discount, $average_cooking_time_min, $dish_hot, $dish_unit, $dish_status);
			if($insert){
				header("Location: ../manage_dishes.php?action=update_success");
			}
			else{
				header("Location: ../manage_dishes.php?action=update_failed");
			}
		}
		else
		{
			header("Location: ../manage_dishes.php?action=update_failed");
		}	
		
?>