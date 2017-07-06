<?php
session_start();
include_once '../controllers/Ingredient.php';
	
	$ingredient_id = $_POST['ingredient_id'];
 	$dish_id = $_POST['dish_id'];
 	$ingredient_name = $_POST['ingredient_name'];
 	$ingredient_status = $_POST['ingredient_status'];
 	
	$ingredient = new Ingredient();
	
		if(isset($dish_id)){
				
			$edit = $ingredient->edit($ingredient_id, $dish_id, $ingredient_name, $ingredient_status);
			if($edit){
				header("Location: ../manage_ingredients.php?action=update_success");
			}
			else{
				header("Location: ../manage_ingredients.php?action=update_failed");
			}
		}else
		{
			header("Location: ../manage_ingredients.php?action=update_failed");
		}
	
?>