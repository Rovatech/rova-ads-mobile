<?php 
session_start();
include_once '../controllers/Category.php';
$id = $_POST['id'];

$categoryObj = new Category();
$row_edit = $categoryObj->getCategoryDetail($id);
?>

   <form class="form-horizontal row-border" id="validate-3" action="edit_action/edit_category.php"  method="post" enctype="multipart/form-data">
							<input type="hidden" name="category_id" value="<?=$row_edit->category_id; ?>" />
							<input type="hidden" name="category_image_old" value="<?=$row_edit->category_image; ?>" />
							<div class="form-group">
										<label class="col-md-4 control-label">Category Name:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="category_name" class="form-control required" value="<?=$row_edit->category_name; ?>"></div>
									</div>
									<div class="form-group">
									<label class="col-md-4 control-label">Image:<span class="required">*</span></label>
										<div class="col-md-4">
											<input type="file" name="category_image" accept="image/*" data-style="fileinput" data-inputsize="medium">
											<label for="file1" class="has-error help-block" generated="true" style="display:none;"></label>
											<?php echo '<a href="images/'.$_SESSION['user_name'].'/category/'.$row_edit->category_image.'" target="_blank"><img alt="'.$row_edit->category_name.'" src="images/'.$_SESSION['user_name'].'/category/'.$row_edit->category_image.'" width="100px" height="100px"></a>'; ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label" for="input17">Drink Category </label>
										<div class="col-md-4">
											<select name="is_drink" class="form-control">
											
                                                	<option value="Y" <?php if($row_edit->is_drink == "Y"){echo "selected='selected'";}?>>Yes</option>
                                                	<option value="N" <?php if($row_edit->is_drink == "N"){echo "selected='selected'";}?>>No</option>

											</select>
										</div>
										</div>
									
									<div class="form-group">
										<label class="col-md-4 control-label" for="input17">Status </label>
										<div class="col-md-4">
											<select name="category_status" class="form-control">
											
                                                	<option value="Y" <?php if($row_edit->category_status == "Y"){echo "selected='selected'";}?>>Enable</option>
                                                	<option value="N" <?php if($row_edit->category_status == "N"){echo "selected='selected'";}?>>Disable</option>

											</select>
										</div>
										</div>
									
                          
								
		</form>
		
	<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins.form-components.js"></script>
	<script type="text/javascript" src="assets/js/demo/form_components.js"></script>
	<script type="text/javascript" src="plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
	<script type="text/javascript" src="assets/js/demo/form_validation.js"></script>	
		
		