<?php 
session_start();
include_once '../controllers/Ingredient.php';
include_once '../controllers/Dish.php'; 
$dishObj = new Dish();

$id = $_POST['id'];

$ingredientObj = new Ingredient();
$row_edit = $ingredientObj->getIngredientDetail($id);
?>

   <form class="form-horizontal row-border" id="validate-3" action="edit_action/edit_ingredient.php"  method="post">
							<input type="hidden" name="ingredient_id" value="<?=$row_edit->ingredient_id; ?>" />
							<div class="form-group">
										<label class="col-md-4 control-label" for="input17">Select Dish</label>
										<div class="col-md-4"><?php 
                                                $dishes = $dishObj->getAllDishes();
                                                if($dishes){
                                         ?>
											<select name="dish_id" class="select2-select-00 col-md-12 full-width-fix">
                                               <?php 
                                                foreach($dishes as $dish){
                                                	?>
                                                	<option value="<?php echo $dish->dish_id; ?>" <?php if($dish->dish_id == $row_edit->resturant_dish_id){echo "selected='selected'";} ?>><?php echo $dish->dish_name; ?></option>
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
										<label class="col-md-4 control-label">Ingredient Name:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="ingredient_name" class="form-control required" value="<?=$row_edit->ingredient_name; ?>" ></div>
									</div>
									
									<div class="form-group">
										<label class="col-md-4 control-label" for="input17">Status </label>
										<div class="col-md-4">
											<select name="ingredient_status" class="form-control">
											
                                                	<option value="Y" <?php if($row_edit->ingredient_status == "Y"){echo "selected='selected'";}?>>Enable</option>
                                                	<option value="N" <?php if($row_edit->ingredient_status == "N"){echo "selected='selected'";}?>>Disable</option>

											</select>
										</div>
										</div>
									
                          
								
		</form>
		
	<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins.form-components.js"></script>
	<script type="text/javascript" src="assets/js/demo/form_components.js"></script>
	<script type="text/javascript" src="plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
	<script type="text/javascript" src="assets/js/demo/form_validation.js"></script>	
		
		