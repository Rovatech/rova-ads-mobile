<?php 
session_start();
include_once('../common/functions.php');
include_once('../controllers/Restaurant.php');
include_once('../controllers/Kuser.php');
include_once('../controllers/Category.php');
include_once('../controllers/Unit.php');
include_once('../controllers/Dish.php');
include_once('../controllers/Ingredient.php');
include_once('../controllers/Table.php');
include_once('../controllers/Notification.php');
include_once('../controllers/Game.php');
include_once '../controllers/Ads.php';
include_once '../controllers/VideoAds.php';

$id = $_POST['id'];
$action = $_POST['action'];

switch ($action){
	case 'btn-restaurant-delete':
		$restaurantObj = new Restaurant();
		$userObj = $restaurantObj->getRestaurantDetail($id);
		
		$target_path = "../images/".$userObj->user_name;
		
		$res = $restaurantObj->delete($id);
		if($res){
			rrmdir($target_path);
		}
		
		break;
	case 'btn-kuser-delete':
			$kUserObj = new Kuser();
			$kUserObj->delete($id);
		break;
	case 'btn-category-delete':
			$categoryObj = new Category();
			$data = $categoryObj->getCategoryDetail($id);
			$res = $categoryObj->delete($id);
			if($res){
				$path = "../images/".$_SESSION['user_name']."/category/".$data->category_image;
				unlink($path);
			}
			break;
	case 'btn-unit-delete':
			$unitObj = new Unit();
			$res = $unitObj->delete($id);
			break;
	case 'btn-dish-delete':
			$dishObj = new Dish();
			$data = $dishObj->getDishDetail($id);
			$res = $dishObj->delete($id);
			if($res){
				$path = "../images/".$_SESSION['user_name']."/dish/".$data->dish_image;
				unlink($path);
			}
			break;
	case 'btn-ingredient-delete':
			$ingredientObj = new Ingredient();
			$res = $ingredientObj->delete($id);
			break;
	case 'btn-table-delete':
			$tableObj = new Table();
			$tableObj->delete($id);
			break;
	case 'btn-notification-delete':
			$notificationObj = new Notification();
			$data = $notificationObj->getNotificationDetail($id);
			$res = $notificationObj->delete($id);
			if($res){
				$path = "../images/".$_SESSION['user_name']."/notifications/".$data->banner;
				unlink($path);
			}
			break;
			
			case 'btn-game-delete':
				$gameObj = new Game();
				$data = $gameObj->getGameDetail($id);
				$res = $gameObj->delete($id);
				if($res){
					$path = "../images/".$_SESSION['user_name']."/game/".$data->game_image;
					unlink($path);
				}
				break;
				case 'btn-page-delete':
					$adsObj = new Ads();
					$adsObj->deletePage($id);
					break;
		case 'btn-slide-delete':
						$adsObj = new Ads();
						$data = $adsObj->getSlideDetail($id);
						$res = $adsObj->deleteSlide($id);
						if($res){
							$path = "../images/slides/".$data->ad_banner;
							unlink($path);
						}
						break;
						case 'btn-video-delete':
							$adsObj = new VideoAds();
							$res = $adsObj->deleteSlide($id);
							break;
							case 'btn-schedule-delete':
								$adsObj = new Ads();
								$res = $adsObj->deleteSchedule($id);
								break;
}
?>