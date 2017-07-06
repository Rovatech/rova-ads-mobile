<?php include('head.php'); ?>
<body>
<?php 
if($_SESSION['user_role'] == "**")
{
?>
	<?php include('header.php'); ?>
	

	<div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">
				<?php include('navigation.php'); ?>

			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->

		<div id="content">
			<div class="container">

				<?php include('page_header.php'); ?>

				<!--=== Page Content ===-->
				<?php include('stat_boxes.php'); ?>
					
					<?php include_once 'showerrors.php'; ?>
					
								    <div class="row">
       <div class="cpanel">
       <div class="icon-wrapper">
    <div class="icon"><a href="manage_categories.php"><img src="assets/img/imgicons/categories.png" alt=""><span>Category Management</span></a></div>
  </div>
  <div class="icon-wrapper">
    <div class="icon"><a href="manage_dishes.php"><img src="assets/img/imgicons/dish-icon.png" alt=""><span>Dish Management</span></a></div>
  </div>
  <div class="icon-wrapper">
    <div class="icon"><a href="history_orders.php"><img src="assets/img/imgicons/order-icon.png" alt=""><span>Order Management</span></a></div>
  </div>
  <div class="icon-wrapper">
    <div class="icon"><a href="manage_notifications.php"><img src="assets/img/imgicons/greeting-icon.png" alt=""><span>Notification Management</span></a></div>
  </div>
  <div class="icon-wrapper">
    <div class="icon"><a href="manage_kitchen.php"><img src="assets/img/imgicons/user-icon.png" alt=""><span>Kitchen User Management</span></a></div>
  </div>
  <div class="icon-wrapper">
    <div class="icon"><a href="manage_feedbacks.php"><img src="assets/img/imgicons/feedback-icon.png" alt=""><span>Feedback</span></a></div>
  </div>
  <div class="icon-wrapper">
    <div class="icon"><a href="waiter_calls.php"><img src="assets/img/imgicons/call.png" alt=""><span>Waiter Call</span></a></div>
  </div>
  <div class="icon-wrapper">
    <div class="icon"><a href="currency_setting.php"><img src="assets/img/imgicons/currency.png" alt=""><span>Currency Setting</span></a></div>
  </div>
  <div class="icon-wrapper">
    <div class="icon"><a href="tax_setting.php"><img src="assets/img/imgicons/tax.png" alt=""><span>Tax Settings</span></a></div>
  </div>
   <div class="icon-wrapper">
    <div class="icon"><a href="table_setting.php"><img src="assets/img/imgicons/table.png" alt=""><span>Table Settings</span></a></div>
  </div>
  </div>
    </div>	
			</div>
			<!-- /.container -->

		</div>
	</div>
<?php include 'js_files.php'; ?>
<?php }
else 
{
	header("Location: index.php");
} ?>
</body>
</html>