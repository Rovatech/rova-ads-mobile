<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/controllers/Game.php';

		$gameObj = new Game();
	
if (isset($_GET["restaurant_id"]) && isset($_GET["tableno"]))
{
		$result = $gameObj->getAllGames($_GET["restaurant_id"], $_GET["tableno"]);
		if($result)
		{
			$response["data"] = array();
			foreach ($result as $cat)
			{
			array_push($response["data"], $cat);
			}
		$response["success"] = 1;
		$response["is_pay"] = $gameObj->getPayDetail()->is_pay;
		}
		else
		{
			$response["success"] = 0;
			$response["is_pay"] = $gameObj->getPayDetail()->is_pay;
			$response["message"] = "No Game Found";
		}
}
else
{
		$response["success"] = 0;
		$response["message"] = "Could not find the restaurant ID";
}
		echo json_encode($response);

?>