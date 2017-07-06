<?php
include_once('Database.php');
class Ads{
	
	function getAllSlides($page_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'page_id'	      => $page_id,
				'ad_status'	      => 'Y'
		); 
		
		$result = $db->queryWithParamsArray("SELECT * from banner_ads 
				where page_id=:page_id AND ad_status=:ad_status", $array);
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	function getAllVideo(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				
				'ad_status'	      => 'Y'
		); 
		
		$result = $db->queryWithParamsArray("SELECT * from video_ads 
				where ad_status=:ad_status", $array);
		if($result->rowCount() > 0 )
			return $result->fetchAll();
		else
			return FALSE;
	}
	function getIsOn(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'setting_id'	      => 1,
		);
	
		$result = $db->queryWithParamsArray("SELECT * from ads_setting
				where setting_id=:setting_id", $array);
		if($result->rowCount() > 0 )
			return $result->fetch();
		else
			return FALSE;
	}
	
	function updateClick($ad_id , $clicks){
		$db = new Database();
	
		$array = array(
				'ad_id'		  => $ad_id,
				'clicks'		  => $clicks
				
		);
	
	
		$stmt = $db->queryWithParamsArray("UPDATE banner_ads set clicks=:clicks WHERE ad_id=:ad_id ",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function updateImperssion($ad_id , $imperssion){
		$db = new Database();
	
		$array = array(
				'ad_id'		  => $ad_id,
				'imperssion'		  => $imperssion
	
		);
	
	
		$stmt = $db->queryWithParamsArray("UPDATE banner_ads set imperssion=:imperssion WHERE ad_id=:ad_id ",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	function getSlidesDetail($ad_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$array = array(
				'ad_id'	      => $ad_id,
		);
	
		$result = $db->queryWithParamsArray("SELECT * from banner_ads where ad_id=:ad_id", $array);
		if($result->rowCount() > 0 )
			return $result->fetch();
		else
			return FALSE;
	}

	function getIsOnDetail(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'setting_id'	      => 1
		);
	
		$result = $db->queryWithParamsArray("SELECT * from ads_setting where setting_id=:setting_id", $array);
		if($result->rowCount() > 0 )
			return $result->fetch();
		else
			return FALSE;
	}
	
	function getAdTime(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'setting_id'	      => 2
		);
	
		$result = $db->queryWithParamsArray("SELECT * from ads_setting where setting_id=:setting_id", $array);
		if($result->rowCount() > 0 )
			return $result->fetch();
		else
			return FALSE;
	}
	
}

?>