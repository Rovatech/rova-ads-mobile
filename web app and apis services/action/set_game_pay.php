<?php
session_start();
include_once '../controllers/Game.php';
 	$is_pay = $_POST['is_pay'];
 	
	$gameObj = new Game();
	//For Update
	if($gameObj->getDetail())
	{
		$update = $gameObj->updateGamePay($is_pay);
		if($update){
			header("Location: ../game_setting.php?action=update_success");
		}
		else{
			header("Location: ../game_setting.php?action=update_failed");
		}
	}
	
?>