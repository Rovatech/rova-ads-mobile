<?php

/*
 * Following code will Get the data from the app and insert in the database .
*/

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Register.php';

// check for post data
if (!empty($_GET["app_user_name"]) && !empty($_GET["app_user_pass"])) {
	$userObj = new Register();
	
	if(!$userObj->isDuplicate($_GET['app_user_name']))
	{
		$result = $userObj->insert($_GET);
		if($result)
		{
			$response["success"] = 1;
			$response["message"] = "Regisration successfull.";
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "Regisration can't be completed this time please try again later.";
		}
	}
	else
	{
		$response["message"] = "username already exists please try another.";
		$response["success"] = 0;
	}
	
}
else 
{
	$response["success"] = 0;
	$response["message"] = "Required field(s) is missing";
}

echo json_encode($response);

?>