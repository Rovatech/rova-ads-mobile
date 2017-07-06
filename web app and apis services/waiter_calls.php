<?php include_once 'head.php'; ?>
<body>
	<?php include_once 'header.php'; 
	include_once 'controllers/CallWaiter.php';
	
	$callObj = new CallWaiter();
	$callObj->UpdateCalls();
	?>

<?php 
if($_SESSION['user_role'] == "**" || $_SESSION['user_role'] == "***")
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
				<div class="row">
					<!--=== Simple Table ===-->
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Waiter Calls</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<table class="table table-hover table-bordered">
									<thead>
										<tr>
											<th>Date Time</th>
											<th>Table No.#</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$getCallList = $callObj->getRestaurantCalls();
									if($getCallList){
									foreach ($getCallList as $item){
									?>
										<tr>
											<td><?=$item->call_date; ?></td>
											<td><?=$item->resturant_table_id; ?></td>
											<td><input type="button" value="Remove" class="btn btn-primary pull-right" onclick="RemoveCall(<?=$item->call_id; ?>);" /></td>
										</tr>
									<?php } }else{
										?>
										No Call Found.
										<?php 
									} ?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- /Simple Table -->
					</div>
				</div>
		
				
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