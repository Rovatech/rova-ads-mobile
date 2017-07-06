<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Notifications.php';

// check for post data
if (!empty($_GET["restaurant_user_id"]) && !empty($_GET["customer_type"]) && !empty($_GET["customer"]) && !empty($_GET["cart"])) 
{
		$notificationsObj = new Notifications();
		
		$result = $notificationsObj->insertDoneNotification($_GET["restaurant_user_id"] , $_GET["customer_type"], $_GET["customer"], $_GET["cart"]);
		if($result)
		{
			$response["success"] = 1;
		}
		else
		{
			$response["success"] = 0;
		}
	
}
else 
{
	$response["success"] = 0;
}

echo json_encode($response);

?>