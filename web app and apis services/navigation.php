<!--=== Navigation ===-->
 <?php
        $full_name = $_SERVER['PHP_SELF'];
        $name_array = explode('/',$full_name);
        $count = count($name_array);
        $page_name = $name_array[$count-1];
    ?>
    			<?php 
    			if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "**")
    			{
    			?>
				<ul id="nav">
					<li class="<?php echo ($page_name=='dashboard.php')?'current':'';?>">
						<a href="dashboard.php">
							<i class="icon-dashboard"></i>
							Dashboard
						</a>
					</li>
			<!--		<li class="<?php echo ($page_name=='table_availability.php')?'current':'';?>">
						<a href="table_availability.php">
							<i class="icon-table"></i>
							Table Availability
						</a>
					</li>  -->
					<li class="<?php echo ($page_name=='manage_categories.php')?'current':'';?>">
						<a href="manage_categories.php">
							<i class="icon-desktop"></i>
							Manage Categories
						</a>
					</li>
					<li class="<?php echo ($page_name=='manage_dishes.php')?'current':'';?>">
						<a href="manage_dishes.php">
							<i class="icon-table"></i>
							Manage Dishes
						</a>
					</li>
					<li class="<?php echo ($page_name=='manage_ingredients.php')?'current':'';?>">
						<a href="manage_ingredients.php">
							<i class="icon-edit"></i>
							Manage Ingredients
						</a>
					</li>
						<li class="<?php echo ($page_name=='manage_games.php')?'current':'';?>">
						<a href="manage_games.php">
							<i class="icon-play"></i>
							Manage Games
						</a>
					</li>
					<li class="<?php echo ($page_name=='manage_kitchen.php')?'current':'';?>">
						<a href="manage_kitchen.php">
							<i class="icon-table"></i>
							Manage Kitchen Users
						</a>
					</li>
					<li class="<?php echo ($page_name=='manage_orders.php')?'current':'';?>">
						<a href="manage_orders.php">
							<i class="icon-table"></i>
							Manage Orders
						</a>
					</li>
<!-- 					<li class="<?php echo ($page_name=='manage_reservation.php')?'current':'';?>">
						<a href="manage_reservation.php"> -->
<!-- 							<i class="icon-table"></i> -->
<!-- 							Manage Reservation -->
<!-- 						</a> -->
<!-- 					</li> -->
					<li class="<?php echo ($page_name=='waiter_calls.php')?'current':'';?>">
						<a href="waiter_calls.php">
							<i class="icon-table"></i>
							Waiter Calls
						</a>
					</li>
					<li class="<?php echo ($page_name=='manage_feedbacks.php')?'current':'';?>">
						<a href="manage_feedbacks.php">
							<i class="icon-table"></i>
							Manage Feedbacks
						</a>
					</li>
					<li class="<?php echo ($page_name=='manage_notifications.php')?'current':'';?>">
						<a href="manage_notifications.php">
							<i class="icon-table"></i>
							Manage Notifications
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<i class="icon-folder-open-alt"></i>
							Settings
						</a>
						<ul class="sub-menu">
						<li class="<?php echo ($page_name=='game_setting.php')?'current':'';?>">
								<a href="game_setting.php">
								<i class="icon-angle-right"></i>
								Game Pay Setting
								</a>
							</li>
						
							<li class="<?php echo ($page_name=='currency_setting.php')?'current':'';?>">
								<a href="currency_setting.php">
								<i class="icon-angle-right"></i>
								Currency Setting
								</a>
							</li>
							<li class="<?php echo ($page_name=='unit_setting.php')?'current':'';?>">
								<a href="unit_setting.php">
								<i class="icon-angle-right"></i>
								Unit Setting
								</a>
							</li>
							<li class="<?php echo ($page_name=='tax_setting.php')?'current':'';?>">
								<a href="tax_setting.php">
								<i class="icon-angle-right"></i>
								Tax Setting
								</a>
							</li>
							<li class="<?php echo ($page_name=='table_setting.php')?'current':'';?>">
								<a href="table_setting.php">
								<i class="icon-angle-right"></i>
								Table Setting
								</a>
							</li>
						 </ul>
					</li>
				</ul>
				<?php 
    			}
    			else if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "*"){
    			?>
    			<ul id="nav">
<!-- 					<li class="<?php //echo ($page_name=='admin_dashboard.php')?'current':'';?>">
						<a href="admin_dashboard.php"> -->
<!-- 							<i class="icon-dashboard"></i> -->
<!-- 							Dashboard -->
<!-- 						</a> -->
<!-- 					</li> -->
					<li class="<?php echo ($page_name=='manage_restaurants.php')?'current':'';?>">
						<a href="manage_restaurants.php">
							<i class="icon-desktop"></i>
							Manage Restaurants
						</a>
					</li>
					<li class="<?php echo ($page_name=='manage_pages.php')?'current':'';?>">
						<a href="manage_pages.php">
							<i class="icon-desktop"></i>
							Manage App Pages
						</a>
					</li>
					<li class="<?php echo ($page_name=='manage_ads.php')?'current':'';?>">
						<a href="manage_ads.php">
							<i class="icon-desktop"></i>
							Manage Ads
						</a>
					</li>
					<li class="<?php echo ($page_name=='manage_video_ads.php')?'current':'';?>">
						<a href="manage_video_ads.php">
							<i class="icon-desktop"></i>
							Manage Video Ads
						</a>
					</li>
					<li class="<?php echo ($page_name=='manage_ads_schedule.php')?'current':'';?>">
						<a href="manage_ads_schedule.php">
							<i class="icon-desktop"></i>
							Manage Ads Schedule
						</a>
					</li>
					<li class="<?php echo ($page_name=='ads_setting.php')?'current':'';?>">
						<a href="ads_setting.php">
							<i class="icon-desktop"></i>
							Ads Setting
						</a>
					</li>
<!--					<li class="">
 						<a href="analytics.php"> -->
<!-- 							<i class="icon-desktop"></i> -->
<!-- 							Analytics -->
<!-- 						</a> -->
<!-- 					</li> -->
				</ul>	
    				
    			<?php }	
    			else if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "***"){
    			?>
    			<ul id="nav">
<!-- 							<li class="<?php echo ($page_name=='kitchen_dashboard.php')?'current':'';?>">
				<a href="dashboard.php"> -->
<!-- 							<i class="icon-dashboard"></i> -->
<!-- 							Dashboard -->
<!-- 						</a> -->
<!-- 					</li> -->
    				<li class="<?php echo ($page_name=='manage_orders.php')?'current':'';?>">
						<a href="manage_orders.php">
							<i class="icon-table"></i>
							Manage Orders
						</a>
					</li>
					<li class="<?php echo ($page_name=='waiter_calls.php')?'current':'';?>">
						<a href="waiter_calls.php">
							<i class="icon-table"></i>
							Waiter Calls
						</a>
					</li>
					
				</ul>	
    				
    			<?php }	?>
				<!-- /Navigation -->