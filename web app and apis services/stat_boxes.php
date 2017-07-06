<!--=== Statboxes ===-->
<?php include_once 'controllers/Order.php';
include_once 'controllers/Feedback.php';
include_once 'controllers/Currency.php';
$orderObj = new Order();
$feedbackObj = new Feedback();
$currencyObj = new Currency();
?>
				<div class="row row-bg"> <!-- .row-bg -->
				<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="visual blue">
									<i class="icon-bar-chart "></i>
								</div>
								<div class="title">Total Orders</div>
								<div class="value"><?=$orderObj->getTotalOrderCount(); ?></div>
								<a class="more" href="history_orders.php">View Orders <i class="pull-right icon-angle-right"></i></a>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->

					<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="visual green">
									<i class="icon-file-text-alt"></i>
								</div>
								<div class="title">Total Feedbacks</div>
								<div class="value"><?=$feedbackObj->getTotalFeedbackCount(); ?></div>
								<a class="more" href="manage_feedbacks.php">View Feedbacks <i class="pull-right icon-angle-right"></i></a>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->
					
					<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="visual yellow">
									<i class="icon-money"></i>
								</div>
								<div class="title">Today Sale</div>
								<div class="value"><?=($orderObj->getRestaurantTodayOrder()->total_amount == null ? '0':$orderObj->getRestaurantTodayOrder()->total_amount)." ".$currencyObj->getDetail()->currency_sign; ?></div>
								<a class="more" href="history_orders.php">View More <i class="pull-right icon-angle-right"></i></a>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->

					<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="visual red">
									<i class="icon-money"></i>
								</div>
								<div class="title">Total Sale</div>
								<div class="value"><?=($orderObj->getRestaurantTotalOrder()->total_amount == null ? '0':$orderObj->getRestaurantTotalOrder()->total_amount)." ".$currencyObj->getDetail()->currency_sign; ?></div>
								<a class="more" href="history_orders.php">View More <i class="pull-right icon-angle-right"></i></a>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->
				</div> <!-- /.row -->
				<!-- /Statboxes -->