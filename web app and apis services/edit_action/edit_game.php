<?php
session_start();
include_once '../controllers/Game.php';

	$game_id = $_POST['game_id'];
	$game_image_old = $_POST['game_image_old'];
 	$game_bundel_id = $_POST['game_bundel_id'];
 	$game_image = $_FILES['game_image']['name'];
 	$game_status = $_POST['game_status'];
	$game_table = $_POST['game_table'];
	
	$game = new Game();
	
		
		if($_FILES["game_image"]["size"] > 0)
		{
			$target_path = "../images/".$_SESSION['user_name']."/game/";
		
			$target_path = $target_path . basename( $_FILES['game_image']['name']);
		
			move_uploaded_file($_FILES['game_image']['tmp_name'], $target_path);
		}
		else
		{
			$game_image = $game_image_old;
		}
		
		$edit = $game->edit($game_id, $game_bundel_id, $game_image, $game_status,$game_table);
		if($edit){
			header("Location: ../manage_games.php?action=update_success");
		}
		else{
			header("Location: ../manage_games.php?action=update_failed");
		}
	
?>