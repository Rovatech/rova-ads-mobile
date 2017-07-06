<?php
include_once('Database.php');
class Notification{
	
	function insert($title, $description, $banner, $display_date, $status){
		$db = new Database();
		
		$array = array(
				'title'      			=> $title,
				'description'      		=> $description,
				'banner'				=> $banner,
				'display_date'			=> $display_date,
				'restaurant_user_id'	=> $_SESSION['user_id'],
				'notification_status'   => $status
		);
	
		
		$stmt = $db->queryWithParamsArray("insert into notifications(restaurant_user_id,title, description,banner,display_date,notification_status)  values(:restaurant_user_id, :title, :description, :banner, :display_date, :notification_status)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function update($notification_id,$notification_status){
			$db = new Database();
	
			$array = array(
					'notification_id'		  => $notification_id,
					'notification_status'    => $notification_status
			);
	
	
			$stmt = $db->queryWithParamsArray("UPDATE notifications set notification_status=:notification_status WHERE notification_id=:notification_id ",$array);
			if($stmt){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	function edit($notification_id, $title, $description, $banner, $status){
			$db = new Database();
		
			$array = array(
				'notification_id'		=> $notification_id,
				'title'      			=> $title,
				'description'      		=> $description,
				'banner'				=> $banner,
				'notification_status'   => $status
			);
		
			$stmt = $db->queryWithParamsArray("UPDATE notifications set title=:title, description=:description, banner=:banner, notification_status=:notification_status WHERE notification_id=:notification_id ",$array);
			if($stmt){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		
		function delete($notification_id) {
			$db = new Database();
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
			$array = array(
					'notification_id' => $notification_id
			);
		
			$result = $db->queryWithParamsArray("DELETE FROM notifications where notification_id=:notification_id", $array);
			if($result)
				return TRUE;
			else
				return FALSE;
		}
		
		function getNotificationDetail($notification_id){
			$db = new Database();
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
			$array = array(
					'notification_id'      => $notification_id
			);
		
			$stmt = $db->queryWithParamsArray("select * from notifications where notification_id=:notification_id ",$array);
			if($stmt){
				return $stmt->fetch();
			}
			else{
				return FALSE;
			}
		}
	
}

?>