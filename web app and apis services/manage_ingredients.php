<?php include_once 'head.php'; ?>
<?php include_once 'controllers/Dish.php'; 
$dishObj = new Dish(); 
?>
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
					Ingredient Added.
				</div>
            	<?php 
            }
            else if($flag == "failed")
            {
            	?>
            	<div class="alert fade in alert-danger">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Ingredient Couldnot Added.
				</div>
                <?php 
            }else if($flag == "duplicate")
            {
            	?>
            	<div class="alert fade in alert-danger">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Ingredient already exsists of this dish.
				</div>
                <?php 
            }else if($flag == "update_success")
            {
            	?>
            	<div class="alert fade in alert-success">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Ingredient Updated.
				</div>
            	<?php 
            }
            else if($flag == "update_failed")
            {
            	?>
            	<div class="alert fade in alert-danger">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Ingredient Couldnot Updated.
				</div>
                <?php 
            }
            ?>
            
				<!--=== Page Content ===-->
				<div class="row">
					<!--=== General Buttons ===-->
					<div class="col-md-12">
						<div class="widget box">
						<a class="btn btn-primary" href="#add-ing">Add Ingredient</a>
						</div>
					</div>
				</div>
		
				<!--=== Normal ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Manage Ingredients</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<table class="table table-striped table-bordered table-hover table-checkable datatable-ingredient">
									<thead>
										<tr>
											<th>No.</th>
											<th>Ingredient Name</th>
											<th>Dish</th>
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
								<h4><i class="icon-reorder"></i> Add Ingredient</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div id="add-ing" class="widget-content">
                               <form class="form-horizontal row-border" id="validate-2" method="post" action="action/add_ingredient.php">
									<div class="form-group">
										<label class="col-md-2 control-label" for="input17">Select Dish</label>
										<div class="col-md-4"><?php 
                                                $dishes = $dishObj->getAllDishes();
                                                if($dishes){
                                         ?>
											<select name="dish_id" class="select2-select-00 col-md-12 full-width-fix">
                                               <?php 
                                                foreach($dishes as $dish){
                                                	?>
                                                	<option value="<?php echo $dish->dish_id; ?>"><?php echo $dish->dish_name; ?></option>
                                                	<?php 
                                                	}
                                                ?>
                                                </select>
                                               <?php 
                                                }
                                                else{
                                                	?>
                                                	<b>Please Add Atleast One Dish to add ingredient.</b>
                                                	<?php 
                                                }
                                                ?></div>
									</div>
									
									<div class="form-group">
										<label class="col-md-2 control-label">Ingredient Name:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="ingredient_name" class="form-control required"></div>
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
				
				<div id="ingredient-edit">
                        		<div class="mws-dialog-inner-ingredient-edit">
                                </div>
                            </div>
                            
				  <div id="ingredient-delete">
                        		<div class="mws-dialog-inner-ingredient-delete" style="display: none;">
                        		Do you really want to delete this ingredient?
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