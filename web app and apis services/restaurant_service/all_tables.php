<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Table.php';

		$tableObj = new Table();
	
if (isset($_GET["restaurant_user_id"]))
{
		$result = $tableObj->getAllTables($_GET["restaurant_user_id"]);
		if($result)
		{
			$response["data"] = array();
			foreach ($result as $cat)
			{
			array_push($response["data"], $cat);
			}
		$response["success"] = 1;
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "No Table Found";
		}
}
else
{
		$response["success"] = 0;
		$response["message"] = "Could not find the restaurant ID";
}
		echo json_encode($response);

?>