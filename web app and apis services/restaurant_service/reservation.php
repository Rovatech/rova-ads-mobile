<?php

/*
 * Following code will Get the reservation detail from the app and insert in the database (reservation table).
*/

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Reservation.php';

// check for post data
if (!empty($_GET["restaurant_user_id"]) && !empty($_GET["customer_type"]) && !empty($_GET["customer"])
		&& !empty($_GET["reservation_person"]) && !empty($_GET["reservation_date"]) 
		&& !empty($_GET["reservation_time"]) && !empty($_GET["reservation_status"])) {
		
		$resObj = new Reservation();
	
		$result = $resObj->insert($_GET);
		if($result)
		{
			$response["success"] = 1;
			$response["message"] = "Reservation created successfully.";
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "Reservation can't be created this time please try again later.";
		}
	
}
else 
{
	$response["success"] = 0;
	$response["message"] = "Required field(s) are missing.";
}

echo json_encode($response);

?>