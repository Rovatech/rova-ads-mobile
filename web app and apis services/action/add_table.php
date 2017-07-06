<?php
session_start();
include_once '../controllers/Table.php';

 	$table_no = $_POST['table_no'];
 	$table_description = $_POST['table_description'];
 	
 	
	$table = new Table();
	if(!$table->isDuplicate($table_no))
	{
		$insert = $table->insert($table_no, $table_description);
		if($insert){
			header("Location: ../table_setting.php?action=success");
		}
		else{
			header("Location: ../table_setting.php?action=failed");
		}
	}
	else 
	{	
		header("Location: ../table_setting.php?action=duplicate");
	}
	
	
?>