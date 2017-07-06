<?php include_once 'head.php'; ?>
<body>
	<?php include_once 'header.php'; 
	include_once 'controllers/Feedback.php';
	
	$feedbackObj = new Feedback();
	$feedbackObj->UpdateFeedback();
	?>

<?php 
if($_SESSION['user_role'] == "**")
{
?>
	<div id="container">
	
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">
				<?php include_once 'navigation.php'; ?>
			</div>
		</div>
		<!-- /Sidebar -->

		<div id="content">
			<div class="container">

			<?php include_once 'page_header.php'; ?>
				<!--=== Page Content ===-->
				<!--=== Table ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Customer Feedbacks</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
							<?php 
							$getFeedbackList = $feedbackObj->getAllFeedback();
							if($getFeedbackList){
							foreach ($getFeedbackList as $item){
							?>
								<blockquote>
									<p><label>#<?=$item->restaurant_order_id; ?> order</label><label style="float: right;"><?=$item->created_on; ?></label></p>
									<p><div class="rate" style="float: right;"> <b style="width: <?=$item->rating; ?>%;"></b> </div></p>
									<small><?=$item->remarks; ?></small>
								</blockquote>
								<?php }}else{
									?>
									No Feedback Rating Found.
									<?php 
								} ?>
							</div>
						</div>
					</div>
				</div>
				<!-- /Table -->
		
				
                </div>
				<!-- /Page Content -->
			</div>
			<!-- /.container -->

		</div>
	</div>
<?php include_once 'js_files.php'; ?>
<?php }
else 
{
	header("Location: index.php");
} ?>
</body>
</html>