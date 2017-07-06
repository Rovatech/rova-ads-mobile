<?php
session_start();
include_once '../controllers/Unit.php';

	$unit_id = $_POST['unit_id'];
 	$unit_name = $_POST['unit_name'];
 	$unit_status = $_POST['unit_status'];
 	
	$unit = new Unit();
		
		$edit = $unit->edit($unit_id, $unit_name, $unit_status);
		if($edit){
			header("Location: ../unit_setting.php?action=update_success");
		}
		else{
			header("Location: ../unit_setting.php?action=update_failed");
		}
	
?>