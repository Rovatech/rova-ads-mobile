<?php include_once 'head.php'; ?>
<?php 
include_once 'controllers/Category.php';
include_once 'controllers/Unit.php';
$categoryObj = new Category();
$unitObj = new Unit();
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
					Dish Added.
				</div>
            	<?php 
            }
            else if($flag == "failed")
            {
            	?>
            	<div class="alert fade in alert-danger">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Dish Couldnot Added.
				</div>
                <?php 
            }else if($flag == "duplicate")
            {
            	?>
            	<div class="alert fade in alert-danger">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Dish already exsists with this name.
				</div>
                <?php 
            }else if($flag == "update_success")
            {
            	?>
            	<div class="alert fade in alert-success">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Dish Updated.
				</div>
            	<?php 
            }
            else if($flag == "update_failed")
            {
            	?>
            	<div class="alert fade in alert-danger">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Dish Couldnot Updated.
				</div>
                <?php 
            }
            ?>
				<!--=== Page Content ===-->
				<div class="row">
					<!--=== General Buttons ===-->
					<div class="col-md-12">
						<div class="widget box">
						<a class="btn btn-primary" href="#add-dish">Add Dish</a>
						</div>
					</div>
				</div>
		
				<!--=== Normal ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Manage Dishes</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<table class="table table-striped table-bordered table-hover table-checkable datatable-dish">
									<thead>
										<tr>
											<th>No.</th>
											<th>Dish Name</th>
											<th>Category</th>
											<th>Image</th>
											<th>Price</th>
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
								<h4><i class="icon-reorder"></i> Add Dish</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div id="add-dish" class="widget-content">
                                <form class="form-horizontal row-border" id="validate-2" action="action/add_dish.php"  method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-2 control-label" for="input17">Dish Category:<span class="required">*</span></label>
										<div class="col-md-4">
										 <?php 
                                                $categories = $categoryObj->getAllCategories();
                                                if($categories){
                                         ?>
											<select name="category_id" class="select2-select-00 col-md-12 full-width-fix">
                                               <?php 
                                                foreach($categories as $category){
                                                	?>
                                                	<option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>
                                                	<?php 
                                                	}
                                                ?>
                                                </select>
                                               <?php 
                                                }
                                                else{
                                                	?>
                                                	<b>Please Add Atleast One Category to add Dish.</b>
                                                	<?php 
                                                }
                                                ?>
											
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-2 control-label">Dish Name:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="dish_name" class="form-control required"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Description:<span class="required">*</span></label>
										<div class="col-md-10"><input type="text" name="dish_description" class="form-control required"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Price:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="dish_price" class="form-control required" value="0.0"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Calories<span> 100/gram</span></label>
										<div class="col-md-4"><input type="text" name="calories_per_100_grams" class="form-control digits" value="0"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Discount %:</label>
										<div class="col-md-4"><input type="text" name="dish_discount" class="form-control" value="0"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Avg. Cook Time (Min):</label>
										<div class="col-md-4"><input type="text" name="average_cooking_time_min" class="form-control digits" value="0"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Hot: </label>
										<div class="col-md-8">
											<div class="make-switch" data-on="info" data-off="success">
												<input name="dish_hot" type="checkbox" checked class="toggle">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Dish Unit: <span class="required">*</span></label>
										<div class="col-md-4"><?php 
                                                $units = $unitObj->getAllUnits();
                                                if($units){
                                         ?>
											<select name="dish_unit" class="select2-select-00 col-md-12 full-width-fix">
                                               <?php 
                                                foreach($units as $unit){
                                                	?>
                                                	<option value="<?php echo $unit->unit_id; ?>"><?php echo $unit->unit_name; ?></option>
                                                	<?php 
                                                	}
                                                ?>
                                                </select>
                                               <?php 
                                                }
                                                else{
                                                	?>
                                                	<b>Please Add Atleast One Unit to add Dish.</b>
                                                	<?php 
                                                }
                                                ?></div>
									</div>
									<div class="form-group">
									<label class="col-md-2 control-label">Image:<span class="required">*</span></label>
										<div class="col-md-4">
											<input type="file" name="dish_image" class="required" accept="image/*" data-style="fileinput" data-inputsize="medium">
											<label for="file1" class="has-error help-block" generated="true" style="display:none;"></label>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-2 control-label">Status</label>
										<div class="col-md-8">
											<div class="make-switch" data-on="info" data-off="success">
												<input name="dish_status" type="checkbox" checked class="toggle">
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
				
				 <div id="dish-edit">
                        		<div class="mws-dialog-inner-dish-edit">
                                </div>
                            </div>
                            
				  <div id="dish-delete">
                        		<div class="mws-dialog-inner-dish-delete" style="display: none;">
                        		Do you really want to delete this dish?
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