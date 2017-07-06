<?php include('head.php'); ?>
<body>
<?php 
if($_SESSION['user_role'] == "*")
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
				<?php //include('stat_boxes.php'); ?>

					
					
				</div> <!-- /.row -->


				
				</div> <!-- /.row -->
				<!-- /Page Content -->
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