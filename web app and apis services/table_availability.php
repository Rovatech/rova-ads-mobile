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
						Currency Symbol Added.
					</div>
	            	<?php 
	            }
	            else if($flag == "failed")
	            {
	            	?>
	            	<div class="alert fade in alert-danger">
						<i class="icon-remove close" data-dismiss="alert"></i>
						Currency Symbol Couldnot Added.
					</div>
	                <?php 
	            }
	            else if($flag == "update_success")
	            {
	            ?>
            	    <div class="alert fade in alert-success">
            			<i class="icon-remove close" data-dismiss="alert"></i>
            			Currency Symbol Updated.
            		</div>
            	 <?php 
            	 }
            	 else if($flag == "update_failed")
            	 {
            	 ?>
            	   	<div class="alert fade in alert-danger">
            			<i class="icon-remove close" data-dismiss="alert"></i>
            			Currency Symbol Couldnot updated.
            		</div>
            	 <?php 
            	 }
            ?>
				<!--=== Page Content ===-->
				<div class="col-md-12">
					<!--=== Boxed Example ===-->
				<div class="row">
					<div class="col-md-12">
						<h5 class="widget-title"><i class="icon-sign-blank"></i> Table Availability</h5>
					</div>
				</div>

				<div class="row" id="show-table-availability">
				
					
				</div>
				<!-- /Boxed Example -->
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