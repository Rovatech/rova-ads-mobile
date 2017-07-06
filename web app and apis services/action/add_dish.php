<?php
session_start();
include_once '../controllers/Dish.php';
	
 	$category_id   			= $_POST['category_id'];
 	$dish_name 				= $_POST['dish_name'];
 	$dish_description  		= $_POST['dish_description'];
 	$dish_price 			= $_POST['dish_price'];	
 	$calories_per_100_grams = $_POST['calories_per_100_grams'];
 	$dish_discount 			= $_POST['dish_discount'];
 	$average_cooking_time_min = $_POST['average_cooking_time_min'];
 	$dish_unit				= $_POST['dish_unit'];
 	
 	$dish_image = $_FILES['dish_image']['name'];
 	
 	if(isset($_POST['dish_status']))
 	{
 		$dish_status = "Y";
 	}
 	else 
 	{
 		$dish_status = "N";
 	}
 	
 	if(isset($_POST['dish_hot']))
 	{
 		$dish_hot = "Y";
 	}
 	else
 	{
 		$dish_hot = "N";
 	}
 	
 	
	$dish = new Dish();
	if(!$dish->isDuplicate($dish_name))
	{
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
				$dish_image = "";
			}
			
			$insert = $dish->insert($category_id, $dish_name, $dish_description, $dish_price, $dish_image, $calories_per_100_grams, $dish_discount, $average_cooking_time_min, $dish_hot, $dish_unit, $dish_status);
			if($insert){
				header("Location: ../manage_dishes.php?action=success");
			}
			else{
				header("Location: ../manage_dishes.php?action=failed");
			}
		}
		else
		{
			header("Location: ../manage_dishes.php?action=failed");
		}	
		
	}
	else 
	{	
		header("Location: ../manage_dishes.php?action=duplicate");
	}
	
	
?>