<?php include_once 'head.php'; ?>
<body>
	<?php include_once 'header.php'; ?>
<?php 
$flag = "";
if(isset($_GET['action']))
{
	if($_GET['action'] == "success")
	{
		$flag = "success";
	}
	else if($_GET['action'] == "failed")
	{
		$flag = "failed";
	}else if($_GET['action'] == "update_success")
	{
		$flag = "update_success";
	}
	else if($_GET['action'] == "update_failed")
	{
		$flag = "update_failed";
	}
}
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
			<?php 
            if($flag == "success")
            {
            	?>
            	<div class="alert fade in alert-success">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Notification Added.
				</div>
            	<?php 
            }
            else if($flag == "failed")
            {
            	?>
            	<div class="alert fade in alert-danger">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Notification Couldnot Added.
				</div>
                <?php 
            }else if($flag == "update_success")
            {
            	?>
            	<div class="alert fade in alert-success">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Notification Updated.
				</div>
            	<?php 
            }
            else if($flag == "update_failed")
            {
            	?>
            	<div class="alert fade in alert-danger">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Notification Couldnot Updated.
				</div>
                <?php 
            }
            ?>
				<!--=== Page Content ===-->
				<div class="row">
					<!--=== General Buttons ===-->
					<div class="col-md-12">
						<div class="widget box">
						<a class="btn btn-primary" href="#add-cat">Add Notification</a>
						</div>
					</div>
				</div>
		
				<!--=== Normal ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Manage Notifications</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<table class="table table-striped table-bordered table-hover table-checkable datatable-notification">
									<thead>
										<tr>
											<th>No</th>
											<th>Title</th>
											<th>Description</th>
											<th>image</th>
											<th>Display Date</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- /Normal -->
				
				<!--=== Form ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Add Notification</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div id="add-cat" class="widget-content">
                               <form class="form-horizontal row-border" id="validate-2" action="action/add_notification.php"  method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-2 control-label">Title:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="title" class="form-control required"></div>
									</div>
										<div class="form-group">
										<label class="col-md-2 control-label">Description:<span class="required">*</span></label>
										<div class="col-md-10"><input type="text" name="description" class="form-control required"></div>
									</div>
									
									<div class="form-group">
									<label class="col-md-2 control-label">Banner:<span class="required">*</span></label>
										<div class="col-md-4">
											<input type="file" name="banner" class="required" accept="image/*" data-style="fileinput" data-inputsize="medium">
											<label for="file1" class="has-error help-block" generated="true" style="display:none;"></label>
										</div>
									</div>
									
									<div class="form-group">
									<label class="col-md-2 control-label">Display Date:<span class="required">*</span></label>
										<div class="col-md-4">
											<input type="text" name="display_date" class="form-control required datepicker" readonly="readonly">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-2 control-label">Status</label>
										<div class="col-md-8">
											<div class="make-switch" data-on="info" data-off="success">
												<input name="status" type="checkbox" checked class="toggle">
											</div>
										</div>
									</div>
									
									<div class="form-actions">
										<input type="submit" value="Submit" class="btn btn-primary pull-right">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Form -->
                </div>
				<!-- /Page Content -->
				
				 <div id="notification-edit">
                        		<div class="mws-dialog-inner-notification-edit">
                                </div>
                            </div>
                            
				  <div id="notification-delete">
                        		<div class="mws-dialog-inner-notification-delete" style="display: none;">
                        		Do you really want to delete this notification?
                                </div>
                            </div>
                            
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