<?php 
session_start();
include_once '../controllers/Dish.php';
include_once '../controllers/Category.php';
include_once '../controllers/Unit.php';
$categoryObj = new Category();
$unitObj = new Unit();

$id = $_POST['id'];

$dishObj = new Dish();
$row_edit = $dishObj->getDishDetail($id);
?>

   <form class="form-horizontal row-border" id="validate-3" action="edit_action/edit_dish.php"  method="post" enctype="multipart/form-data">
							<input type="hidden" name="dish_id" value="<?=$row_edit->dish_id; ?>" />
							<input type="hidden" name="dish_image_old" value="<?=$row_edit->dish_image; ?>" />
								<div class="form-group">
										<label class="col-md-4 control-label" for="input17">Dish Category:<span class="required">*</span></label>
										<div class="col-md-4">
										 <?php 
                                                $categories = $categoryObj->getAllCategories();
                                                if($categories){
                                         ?>
											<select name="category_id" class="select2-select-00 col-md-12 full-width-fix">
                                               <?php 
                                                foreach($categories as $category){
                                                	?>
                                                	<option value="<?php echo $category->category_id; ?>" <?php if($category->category_id == $row_edit->restaurant_category_id){echo "selected='selected'";} ?>><?php echo $category->category_name; ?></option>
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
										<label class="col-md-4 control-label">Dish Name:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="dish_name" class="form-control required" value="<?=$row_edit->dish_name; ?>"></div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Description:<span class="required">*</span></label>
										<div class="col-md-6"><input type="text" name="dish_description" class="form-control required" value="<?=$row_edit->dish_description; ?>"></div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Price:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="dish_price" class="form-control required" value="<?=$row_edit->dish_price; ?>"></div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Calories<span> 100/gram</span></label>
										<div class="col-md-4"><input type="text" name="calories_per_100_grams" class="form-control digits" value="<?=$row_edit->calories_per_100_grams; ?>"></div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Discount %:</label>
										<div class="col-md-4"><input type="text" name="dish_discount" class="form-control" value="<?=$row_edit->dish_discount; ?>"></div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Avg. Cook Time (Min):</label>
										<div class="col-md-4"><input type="text" name="average_cooking_time_min" class="form-control digits" value="<?=$row_edit->average_cooking_time_min; ?>"></div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Hot: </label>
										<div class="col-md-4">
										<select name="dish_hot" class="form-control">
											
                                                	<option value="Y" <?php if($row_edit->dish_hot == "Y"){echo "selected='selected'";}?>>Yes</option>
                                                	<option value="N" <?php if($row_edit->dish_hot == "N"){echo "selected='selected'";}?>>No</option>

											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Dish Unit: <span class="required">*</span></label>
										<div class="col-md-4"><?php 
                                                $units = $unitObj->getAllUnits();
                                                if($units){
                                         ?>
											<select name="dish_unit" class="select2-select-00 col-md-12 full-width-fix">
                                               <?php 
                                                foreach($units as $unit){
                                                	?>
                                                	<option value="<?php echo $unit->unit_id; ?>" <?php if($unit->unit_id == $row_edit->dish_unit){echo "selected='selected'";} ?>><?php echo $unit->unit_name; ?></option>
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
									<label class="col-md-4 control-label">Image:<span class="required">*</span></label>
										<div class="col-md-4">
											<input type="file" name="dish_image" accept="image/*" data-style="fileinput" data-inputsize="medium">
											<label for="file1" class="has-error help-block" generated="true" style="display:none;"></label>
											<?php echo '<a href="images/'.$_SESSION['user_name'].'/dish/'.$row_edit->dish_image.'" target="_blank"><img alt="'.$row_edit->dish_name.'" src="images/'.$_SESSION['user_name'].'/dish/'.$row_edit->dish_image.'" width="100px" height="100px"></a>'; ?>
										</div>
									</div>

							
									
									<div class="form-group">
										<label class="col-md-4 control-label" for="input17">Status </label>
										<div class="col-md-4">
											<select name="dish_status" class="form-control">
											
                                                	<option value="Y" <?php if($row_edit->dish_status == "Y"){echo "selected='selected'";}?>>Enable</option>
                                                	<option value="N" <?php if($row_edit->dish_status == "N"){echo "selected='selected'";}?>>Disable</option>

											</select>
										</div>
										</div>
									
                          
								
		</form>
		
	<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins.form-components.js"></script>
	<script type="text/javascript" src="assets/js/demo/form_components.js"></script>
	<script type="text/javascript" src="plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
	<script type="text/javascript" src="assets/js/demo/form_validation.js"></script>	
		
		