<?php
session_start();
include_once '../controllers/Unit.php';

 	$unit_name = $_POST['unit_name'];
 	
 	if(isset($_POST['status']))
 	{
 		$status = "Y";
 	}
 	else 
 	{
 		$status = "N";
 	}
 	
	$unit = new Unit();
	if(!$unit->isDuplicate($unit_name))
	{
				
		$insert = $unit->insert($unit_name, $status);
		if($insert){
			header("Location: ../unit_setting.php?action=success");
		}
		else{
			header("Location: ../unit_setting.php?action=failed");
		}
	}
	else 
	{	
		header("Location: ../unit_setting.php?action=duplicate");
	}
	
	
?>