<?php
include_once('Database.php');
class VideoAds{
	
	
	// Manage Ads
	
	// Slides Methods
	function insertSlide( $ad_link, $ad_status){
		$db = new Database();
	
		$array = array(
				'ad_link'      	=> $ad_link,
				'ad_status'       => $ad_status,
		);
	
	
		$stmt = $db->queryWithParamsArray("insert into video_ads(ad_link,ad_status)  values(:ad_link,:ad_status)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function updateSlides($ad_id,$ad_status){
		$db = new Database();
	
		$array = array(
				'ad_id'		  => $ad_id,
				'ad_status'    => $ad_status
		);
	
	
		$stmt = $db->queryWithParamsArray("UPDATE video_ads set ad_status=:ad_status WHERE ad_id=:ad_id ",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	function editSlide($ad_id, $ad_link, $ad_status){
		$db = new Database();
	
		$array = array(
				'ad_id'		  => $ad_id,
				'ad_link'    => $ad_link,
				'ad_status'    => $ad_status,
		);
	
		$stmt = $db->queryWithParamsArray("UPDATE video_ads set ad_link=:ad_link, ad_status=:ad_status WHERE ad_id=:ad_id ",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function deleteSlide($ad_id) {
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'ad_id' => $ad_id
		);
	
		$result = $db->queryWithParamsArray("DELETE FROM video_ads where ad_id=:ad_id", $array);
		if($result)
			return TRUE;
		else
			return FALSE;
	}
	
	function getSlideDetail($ad_id){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'ad_id'      => $ad_id
		);
	
		$stmt = $db->queryWithParamsArray("select * from video_ads where ad_id=:ad_id ",$array);
		if($stmt){
			return $stmt->fetch();
		}
		else{
			return FALSE;
		}
	}
}

?>