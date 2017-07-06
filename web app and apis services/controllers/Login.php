<?php
include_once('Database.php');
class Login {
	
	function authenticate($user_name = null, $user_pass = null){
		
	$db = new Database ();
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
	$array = array(
			'user_name' => $user_name,
			'user_pass'  => $user_pass,
			'user_status'  => 'Y'
	);
	
	$stmt = $db->queryWithParamsArray("SELECT * from restaurant_user WHERE user_name=:user_name AND 
			user_pass=:user_pass AND user_status=:user_status",$array);
		if($stmt->rowCount() == 1)
		{
			$row = $stmt->fetch();
			$_SESSION['user_name'] = $row->user_name;
			$_SESSION['user_id'] = $row->user_id;
			$_SESSION['user_role'] 	   = $row->user_role;
			$_SESSION['user_image'] = $row->user_image;
				
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	
	} //FUNCTION AUTHENTICATE
	
	function authenticateKitchen($user_name = null, $user_pass = null){
	
		$db = new Database ();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'user_name' => $user_name,
				'user_pass'  => $user_pass,
				'user_status'  => 'Y'
		);
	
		$stmt = $db->queryWithParamsArray("SELECT * from kitchen_user WHERE kuser_name=:user_name AND
				kuser_pass=:user_pass AND kstatus=:user_status",$array);
		if($stmt->rowCount() == 1)
		{
			$row = $stmt->fetch();
			$_SESSION['user_name'] = $row->kuser_name;
			$_SESSION['user_id'] = $row->restaurant_user_id;
			$_SESSION['user_role'] = '***';
	
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	
	} //FUNCTION AUTHENTICATE Kitchen
	
	
	function sendEmail($to, $from, $subject, $message){
			
		$headers = "From: ". $from ." \n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\n";
		$headers .= "Reply-To: me <". $from .">\n";
		$headers .= "X-Priority: 1\n";
		$headers .= "X-MSMail-Priority: High\n";
		$headers .= "X-Mailer: My mailer";
			
		mail($to,$subject,$message,$headers);
	}
	
	function getRestaurantDetail($user_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'user_id'      => $user_id
		);
	
		$stmt = $db->queryWithParamsArray("select * from restaurant_user where user_id=:user_id ",$array);
		if($stmt){
			return $stmt->fetch();
		}
		else{
			return FALSE;
		}
	}
	
}

?>