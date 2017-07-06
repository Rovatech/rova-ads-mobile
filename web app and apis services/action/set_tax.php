<?php
session_start();
include_once '../controllers/Tax.php';
 	$tax_rate = $_POST['tax_rate'];
 	
	$taxObj = new Tax();
	//For Update
	if($taxObj->getDetail())
	{
		$update = $taxObj->update($tax_rate);
		if($update){
			header("Location: ../tax_setting.php?action=update_success");
		}
		else{
			header("Location: ../tax_setting.php?action=update_failed");
		}
	}
	//For insert
	else 
	{
		$insert = $taxObj->insert($tax_rate);
		if($insert){
			header("Location: ../tax_setting.php?action=success");
		}
		else{
			header("Location: ../tax_setting.php?action=failed");
		}
	}
?>