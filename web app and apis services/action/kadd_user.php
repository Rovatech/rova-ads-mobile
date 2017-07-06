<?php
session_start();
include_once '../controllers/Kuser.php';

$user_name = $_POST['kuser_name'];
$kuser_name = strtolower($_SESSION['user_name'])."_".$user_name;
$kuser_pass = $_POST['kuser_pass'];
$kemail = $_POST['kemail'];

	$kUser = new Kuser(); 
	
	if(!$kUser->isDuplicateKUser($kuser_name, $_SESSION['user_id']))
	{
		if(isset($_POST['status']))
		{
			$status = "Y";
		}
		else
		{
			$status = "N";
		}
		
		$insert = $kUser->insert($kuser_name, $kuser_pass, $kemail, $status);
		if($insert){
			header("Location: ../manage_kitchen.php?action=success");
		}
		else{
			header("Location: ../manage_kitchen.php?action=failed");
		}
				
	}
	else{
		header("Location: ../manage_kitchen.php?action=duplicate");
	}

?>