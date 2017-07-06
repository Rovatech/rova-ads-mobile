<?php include_once 'head.php'; ?>
<body>
	<?php include_once 'header.php';
	include_once 'controllers/Reservation.php';
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
				
					
				<?php if(isset($_GET["reservation"])){
					$reservationObj = new Reservation();

					$reservationInfo = $reservationObj->getRestaurantReservation($_GET['reservation'])
					?>
				
					<div class="row" id="reservationview">
					<!--=== Table For Order ===-->
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4>
									<i class="icon-reorder"></i>  #<?=$reservationInfo->reservation_id; ?> Reservation Detail</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i
											class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								<table
									class="table table-hover table-striped table-bordered table-highlight-head">
									<tbody>
										<tr>
											<td>Customer Name</td>
											<td><?=$reservationInfo->reservation_customer_name; ?></td>
										</tr>
										<tr>
											<td>Customer Email</td>
											<td><?=$reservationInfo->reservation_customer_email; ?></td>
										</tr>
											<tr>
											<td>Customer Phone</td>
											<td><?=$reservationInfo->reservation_phone; ?></td>
										</tr>
										<tr>
											<td>Total Person</td>
											<td><?=$reservationInfo->reservation_person; ?></td>
										</tr>
										<tr>
											<td>Date</td>
											<td><?=date('Y-m-d',strtotime($reservationInfo->reservation_date)); ?></td>
										</tr>
										<tr>
											<td>Time</td>
											<td><?=$reservationInfo->reservation_time; ?></td>
										</tr>
										
										<tr>
											<td>Reservation Status</td>
											<td><?=$reservationInfo->reservation_status; ?></td>
										</tr>
										<tr>
											<td></td>
											<td><input type="button" value="Confirm" class="btn btn-primary pull-right" onclick="UpdateReservation(<?=$reservationInfo->reservation_id; ?>,'confirm', 'manage_reservation.php');" /><input type="button" value="New" class="btn btn-primary pull-right" style="margin-right: 10px;" onclick="UpdateReservation(<?=$reservationInfo->reservation_id; ?>,'pending', 'manage_reservation.php');" /><input type="button" value="Cancel" style="margin-right: 10px;" class="btn btn-primary pull-right" onclick="UpdateReservation(<?=$reservationInfo->reservation_id; ?>,'cancel', 'manage_reservation.php');" /></td>
										</tr>

									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /Table For Order -->
				</div>
				<?php } ?>
				
				
				<!--=== Table ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4>
									<i class="icon-reorder"></i> Reservation List
								</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i
											class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<table
									class="table table-striped table-bordered table-hover table-checkable datatable-reservation">
									<thead>
										<tr>
											<th>Reservation No.</th>
											<th>Customer Name</th>
											<th>Customer Phone</th>
											<th>Total Person</th>
											<th>Date</th>
											<th>Time</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>

								</table>
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
<?php include_once 'js_files.php'; ?>
<?php }
else 
{
	header("Location: index.php");
} ?>
</body>
</html>