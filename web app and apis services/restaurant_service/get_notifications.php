<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Notifications.php';

if (isset($_GET["restaurant_user_id"]) && isset($_GET["customer"]) && isset($_GET["customer_type"]))
{
		$notObj = new Notifications();
		$result = $notObj->getNotifications($_GET["restaurant_user_id"],$_GET["customer_type"] , $_GET["customer"]);
		if($result)
		{
			$response["data"] = array();
			foreach ($result as $not)
			{
			array_push($response["data"], $not);
			}
		$response["success"] = 1;
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "No Notification Found";
		}
}
else
{
	$response["success"] = 0;
	$response["message"] = "Could not find the Restaurant ID";
}
		echo json_encode($response);

?>