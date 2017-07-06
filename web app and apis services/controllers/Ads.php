<?php
include_once('Database.php');
class Ads{
	// Page Methods
	function insertPage($page_name, $page_number, $page_status){
		$db = new Database();
		
		$array = array(
				'page_name'      	=> $page_name,
				'page_number'      	=> $page_number,
				'page_status'       => $page_status,
		);
	
		
		$stmt = $db->queryWithParamsArray("insert into app_pages(page_name,page_number, page_status)  values(:page_name,:page_number, :page_status)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function updatePage($page_id,$page_status){
			$db = new Database();
	
			$array = array(
					'page_id'		  => $page_id,
					'page_status'    => $page_status
			);
	
	
			$stmt = $db->queryWithParamsArray("UPDATE app_pages set page_status=:page_status WHERE page_id=:page_id ",$array);
			if($stmt){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	function editPage($page_id, $page_name, $page_number, $page_status){
			$db = new Database();
		
			$array = array(
					'page_id'		  => $page_id,
					'page_name'    => $page_name,
					'page_number'    => $page_number,
					'page_status'    => $page_status,
			);
		
			$stmt = $db->queryWithParamsArray("UPDATE app_pages set page_name=:page_name, page_number=:page_number, page_status=:page_status WHERE page_id=:page_id ",$array);
			if($stmt){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		
		function deletePage($page_id) {
			$db = new Database();
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
			$array = array(
					'page_id' => $page_id
			);
		
			$result = $db->queryWithParamsArray("DELETE FROM app_pages where page_id=:page_id", $array);
			if($result)
				return TRUE;
			else
				return FALSE;
		}
		
		function getAllPages(){
			$db = new Database();
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
			$array = array(
					'page_status'      => "Y"
			);
		
			$stmt = $db->queryWithParamsArray("select * from app_pages where page_status=:page_status ",$array);
			if($stmt){
				return $stmt->fetchAll();
			}
			else{
				return FALSE;
			}
		}
		function getPageDetail($page_id){
			$db = new Database();
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
			$array = array(
					'page_id'      => $page_id
			);
		
			$stmt = $db->queryWithParamsArray("select * from app_pages where page_id=:page_id ",$array);
			if($stmt){
				return $stmt->fetch();
			}
			else{
				return FALSE;
			}
		}
	
	
	function isDuplicatePage($page_number){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'page_number'	      => $page_number,
		);
	
		$result = $db->queryWithParamsArray("SELECT * from app_pages where page_number=:page_number", $array);
		if($result->rowCount() > 0 )
			return TRUE;
		else
			return FALSE;
	}
	
	
	//   Ads on/off settings
	function getDetail(){
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
	function updateAdSetting($is_on,$display_time){
		$db = new Database();
	
		$array = array(
				'is_on'		  => $is_on,
				'setting_id'      => 1
		);
	
	
		$stmt = $db->queryWithParamsArray("UPDATE ads_setting set is_on=:is_on  WHERE setting_id=:setting_id ",$array);
		
		$array = array(
				'display_time'		  => $display_time,
				'setting_id'      => 2
		);
		
		
		$stmt = $db->queryWithParamsArray("UPDATE ads_setting set  value=:display_time  WHERE setting_id=:setting_id ",$array);
		
		
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	//  End Ads on/off settings
	
	
	// Manage Ads
	
	// Slides Methods
	function insertSlide($ad_banner, $ad_link, $page_id, $ad_status){
		$db = new Database();
	
		$array = array(
				'ad_banner'      	=> $ad_banner,
				'ad_link'      	=> $ad_link,
				'page_id'       => $page_id,
				'ad_status'       => $ad_status,
		);
	
	
		$stmt = $db->queryWithParamsArray("insert into banner_ads(ad_banner,ad_link, page_id,ad_status)  values(:ad_banner,:ad_link, :page_id,:ad_status)",$array);
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
	
	
		$stmt = $db->queryWithParamsArray("UPDATE banner_ads set ad_status=:ad_status WHERE ad_id=:ad_id ",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	function editSlide($ad_id, $ad_banner, $ad_link, $page_id, $ad_status){
		$db = new Database();
	
		$array = array(
				'ad_id'		  => $ad_id,
				'ad_banner'    => $ad_banner,
				'ad_link'    => $ad_link,
				'page_id'    => $page_id,
				'ad_status'    => $ad_status,
		);
	
		$stmt = $db->queryWithParamsArray("UPDATE banner_ads set ad_banner=:ad_banner, ad_link=:ad_link, page_id=:page_id,ad_status=:ad_status WHERE ad_id=:ad_id ",$array);
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
	
		$result = $db->queryWithParamsArray("DELETE FROM banner_ads where ad_id=:ad_id", $array);
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
	
		$stmt = $db->queryWithParamsArray("select * from banner_ads where ad_id=:ad_id ",$array);
		if($stmt){
			return $stmt->fetch();
		}
		else{
			return FALSE;
		}
	}
		function getVideoDetail($ad_id){
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
	
	
	function getAllSlides(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'ad_status' => 'Y'
		);
		
	
		$stmt = $db->queryWithParamsArray("select * from banner_ads where ad_status=:ad_status",$array);
		if($stmt){
			return $stmt->fetchAll();
		}
		else{
			return FALSE;
		}
	}
	
	function getAllVideos(){
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'ad_status' => 'Y'
		);
	
		$stmt = $db->queryWithParamsArray("select * from  video_ads where ad_status=:ad_status ",$array);
		if($stmt){
			return $stmt->fetchAll();
		}
		else{
			return FALSE;
		}
	}
	
	
	function insertScheduleGrid($ref_id, $des, $type,$time,$sortorder,$pageid){
		$db = new Database();
	
		$array = array(
				'ref_id'      	=> $ref_id,
				'description'      	=> $des,
				'ad_type'       => $type,
				'time_run'       => $time,
				'sort_order'       => $sortorder,
				'page_id'       => $pageid,
		);
	
	
		$stmt = $db->queryWithParamsArray("insert into ads_schedule(ref_id,description, ad_type,time_run,sort_order,page_id)  values(:ref_id,:description, :ad_type,:time_run,:sort_order,:page_id)",$array);
		if($stmt){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function deleteSchedule($ad_id) {
		$db = new Database();
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	
		$array = array(
				'ad_id' => $ad_id
		);
	
		$result = $db->queryWithParamsArray("DELETE FROM ads_schedule where ad_id=:ad_id", $array);
		if($result)
			return TRUE;
		else
			return FALSE;
	}
}

?>