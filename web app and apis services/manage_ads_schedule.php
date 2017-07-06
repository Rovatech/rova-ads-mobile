<?php include_once 'head.php'; ?>
<body>
	<?php include_once 'header.php'; 
	include_once 'controllers/Ads.php';
	$adsObj = new Ads();
	?>
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
	}else if($_GET['action'] == "duplicate")
	{
		$flag = "duplicate";
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
					Schedule Ad Added.
				</div>
            	<?php 
            }
            else if($flag == "failed")
            {
            	?>
            	<div class="alert fade in alert-danger">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Schedule Ad Couldnot Added.
				</div>
                <?php 
            }else if($flag == "duplicate")
            {
            	?>
            	<div class="alert fade in alert-danger">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Schedule Ad already exsists with this link.
				</div>
                <?php 
            }else if($flag == "update_success")
            {
            	?>
            	<div class="alert fade in alert-success">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Schedule Ad Updated.
				</div>
            	<?php 
            }
            else if($flag == "update_failed")
            {
            	?>
            	<div class="alert fade in alert-danger">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Schedule Ad Couldnot Updated.
				</div>
                <?php 
            }
            ?>
				<!--=== Page Content ===-->
				<div class="row">
					<!--=== General Buttons ===-->
					<div class="col-md-12">
						<div class="widget box">
						<a class="btn btn-primary" href="#add-cat">Add Ad Schedule</a>
						</div>
					</div>
				</div>
		
				<!--=== Normal ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Manage Scheduled Ads</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<table class="table table-striped table-bordered table-hover table-checkable datatable-schedule">
									<thead>
										<tr>
											<th>No</th>
											<th>Ad Description</th>
											<th>Type</th>
											<th>Time Run</th>
											<th>Sort Order</th>
											<th>Page ID</th>
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
								<h4><i class="icon-reorder"></i> Add Schedule Ad</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div id="add-cat" class="widget-content">
                               <form class="form-horizontal row-border" id="validate-2" action="action/add_schedule.php"  method="post" enctype="multipart/form-data">
							
									<input type="radio" name="type" id="ad_Type" value="b" checked="checked">Slide<br>
  <input type="radio" name="type" value="v">Video<br>
  
										<div class="form-group" id="slide" >
										<label class="col-md-2 control-label">Choose Slide <span class="required">*</span></label>
										<div class="col-md-4"><?php 
                                                $slides = $adsObj->getAllSlides();
                                                if($slides){
                                         ?>
											<select name="slide" class="select2-select-00 col-md-12 full-width-fix">
                                               <?php 
                                                foreach($slides as $slide){
                                                	?>
                                                	<option value="<?php echo $slide->ad_id; ?>"><?php echo $slide->ad_banner; ?></option>
                                                	<?php 
                                                	}
                                                ?>
                                                </select>
                                               <?php 
                                                }
                                                else{
                                                	?>
                                                	<b>Please Add Atleast One Slide.</b>
                                                	<?php 
                                                }
                                                ?></div>
									</div>
									
										<div class="form-group" id="video">
										<label class="col-md-2 control-label">Choose Video <span class="required">*</span></label>
										<div class="col-md-4"><?php 
                                                 $videos = $adsObj->getAllVideos();
                                                if($videos){
                                         ?>
											<select name="video" class="select2-select-00 col-md-12 full-width-fix">
                                               <?php 
                                                foreach($videos as $video){
                                                	?>
                                                	<option value="<?php echo $video->ad_id; ?>"><?php echo $video->ad_link; ?></option>
                                                	<?php 
                                                	}
                                                ?>
                                                </select>
                                               <?php 
                                                }
                                                else{
                                                	?>
                                                	<b>Please Add Atleast One Video.</b>
                                                	<?php 
                                                }
                                                ?></div>
									</div>
									
									
										<div class="form-group">
										<label class="col-md-2 control-label" for="input17">Select Page:<span class="required">*</span></label>
										<div class="col-md-4">
										 <?php 
                                                $pages = $adsObj->getAllPages();
                                                if($pages){
                                         ?>
											<select name="page_id" class="select2-select-00 col-md-12 full-width-fix">
                                               <?php 
                                                foreach($pages as $page){
                                                	?>
                                                	<option value="<?php echo $page->page_number; ?>"><?php echo $page->page_number; ?></option>
                                                	<?php 
                                                	}
                                                ?>
                                                </select>
                                               <?php 
                                                }
                                                else{
                                                	?>
                                                	<b>Please Add Atleast One Page.</b>
                                                	<?php 
                                                }
                                                ?>
											
										</div>
									</div>
								<div class="form-group">
										<label class="col-md-2 control-label">Run Time:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="time_run" class="form-control required"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Sort Order:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="sort_order" class="form-control required"></div>
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
				
				 <div id="video-edit">
                        		<div class="mws-dialog-inner-video-edit">
                                </div>
                            </div>
                            
				  <div id="schedule-delete">
                        		<div class="mws-dialog-inner-schedule-delete" style="display: none;">
                        		Do you really want to delete this schedule?
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