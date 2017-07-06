<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/CallWaiter.php';

// check for post data
if (!empty($_GET["restaurant_user_id"]) && !empty($_GET["resturant_table_id"]) ) 
{
		$callObj = new CallWaiter();
		
		$current_date = date('Y-m-d H:i:s');
		$call_status = 'pending';
		
		$result = $callObj->insertCall($_GET["restaurant_user_id"], $_GET["resturant_table_id"], $current_date, $call_status);
		if($result)
		{
			$response["success"] = 1;
			$response["message"] = "A waiter should be at your service in few seconds. thanks";
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "Call failed please try again.";
		}
	
}
else 
{
	$response["success"] = 0;
	$response["message"] = "Some Required information is missing.";
}

echo json_encode($response);

?>