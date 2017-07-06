<?php include_once 'head.php'; ?>
<body>
	<?php include_once 'header.php'; ?>
<?php 
include_once 'controllers/Tax.php';
$taxObj = new Tax();
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
						Tax Added.
					</div>
	            	<?php 
	            }
	            else if($flag == "failed")
	            {
	            	?>
	            	<div class="alert fade in alert-danger">
						<i class="icon-remove close" data-dismiss="alert"></i>
						Tax Couldnot Added.
					</div>
	                <?php 
	            }
	            else if($flag == "update_success")
	            {
	            ?>
            	    <div class="alert fade in alert-success">
            			<i class="icon-remove close" data-dismiss="alert"></i>
            			Tax Updated.
            		</div>
            	 <?php 
            	 }
            	 else if($flag == "update_failed")
            	 {
            	 ?>
            	   	<div class="alert fade in alert-danger">
            			<i class="icon-remove close" data-dismiss="alert"></i>
            			Tax Couldnot updated.
            		</div>
            	 <?php 
            	 }
            ?>
				<!--=== Page Content ===-->
				<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Tax Setting</h4>
							</div>
							<div class="widget-content">
								<form class="form-horizontal row-border" id="validate-1" method="post" action="action/set_tax.php">
									<div class="form-group">
										<label class="col-md-2 control-label">Tax %:<span class="required">*</span></label>
										<div class="col-md-4">
										<?php 
										if($taxObj->getDetail()){
										?>
										<input type="text" name="tax_rate" class="form-control required"  value="<?=$taxObj->getDetail()->tax_rate; ?>">
										<?php 
										}
										else{ ?>
										<input type="text" name="tax_rate" class="form-control required">
										<?php }	?>
										
										
										
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