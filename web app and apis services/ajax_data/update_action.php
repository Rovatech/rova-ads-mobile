<?php 
include_once('../controllers/Restaurant.php');
include_once('../controllers/Kuser.php');
include_once '../controllers/Category.php';
include_once '../controllers/Unit.php';
include_once '../controllers/Dish.php';
include_once '../controllers/Ingredient.php';
include_once '../controllers/Notification.php';
include_once '../controllers/Game.php';
include_once '../controllers/Ads.php';
include_once '../controllers/VideoAds.php';

$id = $_POST['id'];
$value = $_POST['value'];
$Row = $_POST['tableRow'];
$action = $_POST['action'];


switch ($action){
	case 'btn-restaurant-update':
		$restaurantObj = new Restaurant();
		
		$restaurantObj->update($id, $value);
		if($value == "N")
		{
			echo '<a href="javascript:void(0);" title="Enable" row="'.$id.'" value="Y" countTableRow="'.$Row.'" ><span class="label label-danger">Disable</span></a>';
		}else if($value == "Y"){
			echo '<a href="javascript:void(0);" title="Disable" row="'.$id.'" value="N" countTableRow="'.$Row.'" ><span class="label label-success">Enable</span></a>';
		}
		break;
		case 'btn-krestaurant-update':
			$kUserObj = new Kuser();
		
			$kUserObj->update($id, $value);
			if($value == "N")
			{
				echo '<a href="javascript:void(0);" title="Enable" row="'.$id.'" value="Y" countTableRow="'.$Row.'" ><span class="label label-danger">Disable</span></a>';
			}else if($value == "Y"){
				echo '<a href="javascript:void(0);" title="Disable" row="'.$id.'" value="N" countTableRow="'.$Row.'" ><span class="label label-success">Enable</span></a>';
			}
			break;
		case 'btn-category-update':
				$categoryObj = new Category();
				
				$categoryObj->update($id, $value);
				if($value == "N")
				{
					echo '<a href="javascript:void(0);" title="Enable" row="'.$id.'" value="Y" countTableRow="'.$Row.'" ><span class="label label-danger">Disable</span></a>';
				}else if($value == "Y"){
					echo '<a href="javascript:void(0);" title="Disable" row="'.$id.'" value="N" countTableRow="'.$Row.'" ><span class="label label-success">Enable</span></a>';
				}
				break;
		case 'btn-unit-update':
				$unitObj = new Unit();
				
				$unitObj->update($id, $value);
				if($value == "N")
				{
					echo '<a href="javascript:void(0);" title="Enable" row="'.$id.'" value="Y" countTableRow="'.$Row.'" ><span class="label label-danger">Disable</span></a>';
				}else if($value == "Y"){
					echo '<a href="javascript:void(0);" title="Disable" row="'.$id.'" value="N" countTableRow="'.$Row.'" ><span class="label label-success">Enable</span></a>';
				}
				break;
		case 'btn-dish-update':
				$dishObj = new Dish();
			
				$dishObj->update($id, $value);
				if($value == "N")
				{
					echo '<a href="javascript:void(0);" title="Enable" row="'.$id.'" value="Y" countTableRow="'.$Row.'" ><span class="label label-danger">Disable</span></a>';
				}else if($value == "Y"){
					echo '<a href="javascript:void(0);" title="Disable" row="'.$id.'" value="N" countTableRow="'.$Row.'" ><span class="label label-success">Enable</span></a>';
				}
				break;
		case 'btn-ingredient-update':
				$ingredientObj = new Ingredient();
					
				$ingredientObj->update($id, $value);
				if($value == "N")
				{
					echo '<a href="javascript:void(0);" title="Enable" row="'.$id.'" value="Y" countTableRow="'.$Row.'" ><span class="label label-danger">Disable</span></a>';
				}else if($value == "Y"){
					echo '<a href="javascript:void(0);" title="Disable" row="'.$id.'" value="N" countTableRow="'.$Row.'" ><span class="label label-success">Enable</span></a>';
				}
				break;
		case 'btn-notification-update':
				$notificationObj = new Notification();
						
				$notificationObj->update($id, $value);
				if($value == "N")
				{
					echo '<a href="javascript:void(0);" title="Enable" row="'.$id.'" value="Y" countTableRow="'.$Row.'" ><span class="label label-danger">Disable</span></a>';
				}else if($value == "Y"){
					echo '<a href="javascript:void(0);" title="Disable" row="'.$id.'" value="N" countTableRow="'.$Row.'" ><span class="label label-success">Enable</span></a>';
				}
				break;
		case 'btn-game-update':
					$gameObj = new Game();
				
					$gameObj->update($id, $value);
					if($value == "N")
					{
						echo '<a href="javascript:void(0);" title="Enable" row="'.$id.'" value="Y" countTableRow="'.$Row.'" ><span class="label label-danger">Disable</span></a>';
					}else if($value == "Y"){
						echo '<a href="javascript:void(0);" title="Disable" row="'.$id.'" value="N" countTableRow="'.$Row.'" ><span class="label label-success">Enable</span></a>';
					}
					break;
					
					case 'btn-page-update':
						$adsObj = new Ads();
					
						$adsObj->updatePage($id, $value);
						if($value == "N")
						{
							echo '<a href="javascript:void(0);" title="Enable" row="'.$id.'" value="Y" countTableRow="'.$Row.'" ><span class="label label-danger">Disable</span></a>';
						}else if($value == "Y"){
							echo '<a href="javascript:void(0);" title="Disable" row="'.$id.'" value="N" countTableRow="'.$Row.'" ><span class="label label-success">Enable</span></a>';
						}
						break;
						
						case 'btn-slide-update':
							$adsObj = new Ads();
								
							$adsObj->updateSlides($id, $value);
							if($value == "N")
							{
								echo '<a href="javascript:void(0);" title="Enable" row="'.$id.'" value="Y" countTableRow="'.$Row.'" ><span class="label label-danger">Disable</span></a>';
							}else if($value == "Y"){
								echo '<a href="javascript:void(0);" title="Disable" row="'.$id.'" value="N" countTableRow="'.$Row.'" ><span class="label label-success">Enable</span></a>';
							}
							break;
							case 'btn-video-update':
								$adsObj = new VideoAds();
							
								$adsObj->updateSlides($id, $value);
								if($value == "N")
								{
									echo '<a href="javascript:void(0);" title="Enable" row="'.$id.'" value="Y" countTableRow="'.$Row.'" ><span class="label label-danger">Disable</span></a>';
								}else if($value == "Y"){
									echo '<a href="javascript:void(0);" title="Disable" row="'.$id.'" value="N" countTableRow="'.$Row.'" ><span class="label label-success">Enable</span></a>';
								}
								break;
}
?>