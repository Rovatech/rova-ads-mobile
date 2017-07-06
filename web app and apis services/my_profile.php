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
						Category Added.
					</div>
	            	<?php 
	            }
	            else if($flag == "failed")
	            {
	            	?>
	            	<div class="alert fade in alert-danger">
						<i class="icon-remove close" data-dismiss="alert"></i>
						Category Couldnot Added.
					</div>
	                <?php 
	            }
	            else if($flag == "update_success")
	            {
	            ?>
            	    <div class="alert fade in alert-success">
            			<i class="icon-remove close" data-dismiss="alert"></i>
            			Category Updated.
            		</div>
            	 <?php 
            	 }
            	 else if($flag == "update_failed")
            	 {
            	 ?>
            	   	<div class="alert fade in alert-danger">
            			<i class="icon-remove close" data-dismiss="alert"></i>
            			Category Couldnot updated.
            		</div>
            	 <?php 
            	 }
            ?>
				<!--=== Page Content ===-->
				<div class="row">
					<div class="col-md-12">
						<!-- Tabs-->
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_overview" data-toggle="tab">Overview</a></li>
								<li><a href="#tab_edit_account" data-toggle="tab">Edit Account</a></li>
							</ul>
							<div class="tab-content row">
								<!--=== Overview ===-->
								<div class="tab-pane active" id="tab_overview">
									<div class="col-md-3">
										<div class="list-group">
											<li class="list-group-item no-padding">
												<img src="assets/img/demo/avatar-large.jpg" alt="">
											</li>
										</div>
									</div>

									<div class="col-md-9">
										<div class="row profile-info">
											<div class="col-md-12">
												<h1>Owner Name</h1>

												<dl class="dl-horizontal">
													<dt>Username</dt>
													<dd>abdul_wahab</dd>
													
													<dt>Email</dt>
													<dd>abdulwahab1290@gmail.com</dd>
													
													<dt>Address</dt>
													<dd>Wahdat Road, Lahore, pakistan</dd>
													
													<dt>Phone</dt>
													<dd>+92-333-8707169</dd>
													
													<dt>Created Date</dt>
													<dd>7 May 2014</dd>
												</dl>
											</div>
											
										</div> <!-- /.row -->
									</div> <!-- /.col-md-9 -->
								</div>
								<!-- /Overview -->

								<!--=== Edit Account ===-->
								<div class="tab-pane" id="tab_edit_account">
									<form class="form-horizontal" action="#">
										<div class="col-md-12">
											<div class="widget">
												<div class="widget-header">
													<h4>General Information</h4>
												</div>
												<div class="widget-content">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Owner Name:</label>
																<div class="col-md-8"><input type="text" name="owner_name" class="form-control" value="John"></div>
															</div>

															<div class="form-group">
																<label class="col-md-4 control-label">Password:</label>
																<div class="col-md-8"><input type="password" name="user_pass" class="form-control" value="Doe"></div>
															</div>
														</div>


														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Email:</label>
																<div class="col-md-8"><input type="text" name="user_email" class="form-control" value="John"></div>
															</div>

															<div class="form-group">
																<label class="col-md-4 control-label">Phone:</label>
																<div class="col-md-8"><input type="text" name="owner_phone" class="form-control" value="John"></div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Image:</label>
																<div class="col-md-8">
																<img src="" />
																<input type="file" name="user_image" class="form-control">
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Address:</label>
																<div class="col-md-8"><input type="text" name="user_address" class="form-control" value="John"></div>
															</div>
														</div>
													</div> <!-- /.row -->
												</div> <!-- /.widget-content -->
											</div> <!-- /.widget -->
										</div> <!-- /.col-md-12 -->

										<div class="col-md-12 form-vertical no-margin">
											<div class="form-actions">
												<input type="submit" value="Update Account" class="btn btn-primary pull-right">
											</div>
										</div> <!-- /.col-md-12 -->
									</form>
								</div>
								<!-- /Edit Account -->
							</div> <!-- /.tab-content -->
						</div>
						<!--END TABS-->
					</div>
				</div> <!-- /.row -->
				
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