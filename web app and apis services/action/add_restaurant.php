<?php
session_start();
include_once '../controllers/Restaurant.php';

 	$user_name = $_POST['user_name'];
 	$user_pass = $_POST['user_pass'];
 	$user_email = $_POST['user_email'];
 	$owner_name = $_POST['owner_name'];
 	$restaurant_name = $_POST['restaurant_name'];
 	$user_address = $_POST['user_address'];
 	
 	$city = $_POST['city'];
 	$country = $_POST['country'];
 	$postal_code = $_POST['postal_code'];
 	
 	$langitude = $_POST['lng'];
 	$latitude = $_POST['lat'];
 	
 	$user_phone = $_POST['user_phone'];
 	$user_image = $_FILES['user_image']['name'];
 
 	$rest = new Restaurant();
 if(!$rest->isDuplicateUser($user_name))
 {
 		
 	if($_FILES["user_image"]["size"] > 0)
 	{
 		$target_path = "../images/";
 		$newFolder = $target_path.$user_name;
 		if(is_dir($newFolder)){
 			
 		}else
 		{
 		mkdir($newFolder, 0755);
 		mkdir($newFolder."/category", 0755);
 		mkdir($newFolder."/dish", 0755);
 		mkdir($newFolder."/notifications", 0755);
 		}
 	
 		$target_path = $newFolder ."/". basename( $_FILES['user_image']['name']);
 	
 		move_uploaded_file($_FILES['user_image']['tmp_name'], $target_path);
 	}
 	else
 	{
 		$user_image = "";
 	}
 	
 	
 	if(isset($_POST['status']))
 	{
 		$status = "Y";
 	}
 	else 
 	{
 		$status = "N";
 	}
 	
	
		$insert = $rest->insert($user_name,$user_pass, $user_email, $owner_name, $restaurant_name,
				$user_address, $city, $country, $postal_code, $langitude ,$latitude,  $user_phone, $user_image, $status);
		if($insert){
			header("Location: ../manage_restaurants.php?action=success");
		}
		else{
			header("Location: ../manage_restaurants.php?action=failed");
		}
 }else{
 	header("Location: ../manage_restaurants.php?action=duplicate");
 }
?>