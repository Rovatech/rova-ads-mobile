<?php
session_start();
include_once '../controllers/Currency.php';
 	$currency_sign = $_POST['currency_sign'];
 	
	$currencyObj = new Currency();
	//For Update
	if($currencyObj->getDetail())
	{
		$update = $currencyObj->update($currency_sign);
		if($update){
			header("Location: ../currency_setting.php?action=update_success");
		}
		else{
			header("Location: ../currency_setting.php?action=update_failed");
		}
	}
	//For insert
	else 
	{
		$insert = $currencyObj->insert($currency_sign);
		if($insert){
			header("Location: ../currency_setting.php?action=success");
		}
		else{
			header("Location: ../currency_setting.php?action=failed");
		}
	}
?>