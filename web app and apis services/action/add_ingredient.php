<?php
session_start();
include_once '../controllers/Ingredient.php';

 	$dish_id = $_POST['dish_id'];
 	$ingredient_name = $_POST['ingredient_name'];
 	
 	if(isset($_POST['status']))
 	{
 		$status = "Y";
 	}
 	else 
 	{
 		$status = "N";
 	}
 	
	$ingredient = new Ingredient();
	if(!$ingredient->isDuplicate($ingredient_name, $dish_id))
	{
		if(isset($dish_id)){
				
			$insert = $ingredient->insert($dish_id, $ingredient_name, $status);
			if($insert){
				header("Location: ../manage_ingredients.php?action=success");
			}
			else{
				header("Location: ../manage_ingredients.php?action=failed");
			}
		}else
		{
			header("Location: ../manage_ingredients.php?action=failed");
		}
	
	}
	else 
	{	
		header("Location: ../manage_ingredients.php?action=duplicate");
	}
	
	
?>