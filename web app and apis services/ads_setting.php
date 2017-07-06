<?php include_once 'head.php'; ?>
<body>
	<?php include_once 'header.php'; ?>
<?php 
include_once 'controllers/Ads.php';
$adsObj = new Ads();
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
if($_SESSION['user_role'] == "*")
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
						Ad Setting Added.
					</div>
	            	<?php 
	            }
	            else if($flag == "failed")
	            {
	            	?>
	            	<div class="alert fade in alert-danger">
						<i class="icon-remove close" data-dismiss="alert"></i>
						Ad Setting Couldnot Added.
					</div>
	                <?php 
	            }
	            else if($flag == "update_success")
	            {
	            ?>
            	    <div class="alert fade in alert-success">
            			<i class="icon-remove close" data-dismiss="alert"></i>
            			Ad Setting Updated.
            		</div>
            	 <?php 
            	 }
            	 else if($flag == "update_failed")
            	 {
            	 ?>
            	   	<div class="alert fade in alert-danger">
            			<i class="icon-remove close" data-dismiss="alert"></i>
            			Ad Setting Couldnot updated.
            		</div>
            	 <?php 
            	 }
            ?>
				<!--=== Page Content ===-->
				<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Ads Setting</h4>
							</div>
							<div class="widget-content">
								<form class="form-horizontal row-border" id="validate-1" method="post" action="action/set_ad.php">
									<div class="form-group">
										<label class="col-md-2 control-label">Ads On:<span class="required">*</span></label>
										<div class="col-md-4">
											<select name="is_on" class="form-control">
											
                                                	<option value="Y" <?php if($adsObj->getDetail()->is_on  == "Y"){echo "selected='selected'";}?>>Yes</option>
                                                	<option value="N" <?php if($adsObj->getDetail()->is_on  == "N"){echo "selected='selected'";}?>>No</option>

											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Display Time :</label>
										<div class="col-md-4"><input type="text" name="display_time" class="form-control digits" value="<?php echo $adsObj->getAdTime()->value; ?>"> (Mili seconds)</div>
									</div>
									
									<div class="form-actions">
										<input type="submit" value="Submit" class="btn btn-primary pull-right">
									</div>
								</form>
							</div>
						</div>
					</div>
				
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