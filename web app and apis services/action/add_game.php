<?php
session_start();
include_once '../controllers/Game.php';

 	$game_bundel_id = $_POST['game_bundel_id'];
 	$game_image = $_FILES['game_image']['name'];
	$game_table = $_POST['game_table'];
	
	//echo $game_table;
	//exit;
 	if(isset($_POST['status']))
 	{
 		$status = "Y";
 	}
 	else 
 	{
 		$status = "N";
 	}
 	
	$game = new Game();
	if(!$game->isDuplicate($game_bundel_id))
	{
		
		if($_FILES["game_image"]["size"] > 0)
		{
			$target_path = "../images/".$_SESSION['user_name']."/game/";
		
			$target_path = $target_path . basename( $_FILES['game_image']['name']);
		
			move_uploaded_file($_FILES['game_image']['tmp_name'], $target_path);
		}
		else
		{
			$game_image = "";
		}
		
		$insert = $game->insert($game_bundel_id, $game_image, $status,$game_table);
		if($insert){
			header("Location: ../manage_games.php?action=success");
		}
		else{
			header("Location: ../manage_games.php?action=failed");
		}
	}
	else 
	{	
		header("Location: ../manage_games.php?action=duplicate");
	}
	
	
?>