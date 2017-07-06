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
	}
	else if($_GET['action'] == "duplicate")
	{
		$flag = "duplicate";
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
					Kitchen User Added.
				</div>
            	<?php 
            }
            else if($flag == "failed")
            {
            	?>
            	<div class="alert fade in alert-danger">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Kitchen User Couldnot Added.
				</div>
                <?php 
            } else if($flag == "duplicate")
            {
            	?>
            	<div class="alert fade in alert-danger">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Kitchen User already exists with this username.
				</div>
                <?php 
            }
            ?>
				<!--=== Page Content ===-->
				<div class="row">
					<!--=== General Buttons ===-->
					<div class="col-md-12">
						<div class="widget box">
						<a class="btn btn-primary" href="#add-kitchen">Add Kitchen User</a>
						</div>
					</div>
				</div>
		
				<!--=== Normal ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Manage Kitchen Users</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<table class="table table-striped table-bordered table-hover table-checkable datatable-kitchen">
									<thead>
										<tr>
											<th>No</th>
											<th>Username</th>
											<th>Password</th>
											<th>Email</th>
											<th>Created On</th>
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
								<h4><i class="icon-reorder"></i> Add Kitchen User</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div id="add-kitchen" class="widget-content">
                               <form class="form-horizontal row-border" id="validate-2" method="post" action="action/kadd_user.php">
									<div class="form-group">
										<label class="col-md-2 control-label">Username:<span class="required">*</span></label>
										
										<div class="col-md-4">
										<b style="line-height: 3.5em;"><?php echo strtolower($_SESSION['user_name']); ?>_</b>
										<input type="text" name="kuser_name" class="form-control required" style="width: 200px;"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Password:<span class="required">*</span></label>
										<div class="col-md-4"><input type="password" name="kuser_pass" class="form-control required"></div>
									</div>
									
									<div class="form-group">
										<label class="col-md-2 control-label">Email:<span class="required">*</span></label>
										<div class="col-md-4"><input type="email" name="kemail" class="form-control required"></div>
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
				
				 
                             <div id="kuser-delete">
                        		<div class="mws-dialog-inner-kuser-delete" style="display: none;">
                        		Do you really want to delete this user?
                                </div>
                            </div>
                            
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