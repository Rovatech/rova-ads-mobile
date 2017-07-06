<?php 
session_start();
include_once '../controllers/Game.php';
include_once '../controllers/Table.php';
$tableObj = new Table();

$id = $_POST['id'];

$gameObj = new Game();
$row_edit = $gameObj->getGameDetail($id);
?>

   <form class="form-horizontal row-border" id="validate-3" action="edit_action/edit_game.php"  method="post" enctype="multipart/form-data">
							<input type="hidden" name="game_id" value="<?=$row_edit->game_id; ?>" />
							<input type="hidden" name="game_image_old" value="<?=$row_edit->game_image; ?>" />
							<div class="form-group">
										<label class="col-md-4 control-label">Bundle Identifier:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="game_bundel_id" class="form-control required" value="<?=$row_edit->game_bundel_id; ?>"></div>
									</div>
									
									<div class="form-group">
										<label class="col-md-4 control-label" for="input17">Select Device</label>
										<div class="col-md-4"><?php 
                                                $devices = $tableObj->getAllTables();
                                                if($devices){
                                         ?>
											<select name="game_table" class="select2-select-00 col-md-12 full-width-fix">
                                               <?php 
                                                foreach($devices as $device){
                                                	?>
                                                	<option value="<?php echo $device->table_no; ?>" <?php if($device->table_no == $row_edit->game_table){echo "selected='selected'";} ?>><?php echo $device->device_name; ?></option>
                                                	<?php 
                                                	}
                                                ?>
                                                </select>
                                               <?php 
                                                }
                                                else{
                                                	?>
                                                	<b>Please Add Atleast One Device.</b>
                                                	<?php 
                                                }
                                                ?></div>
									</div>
									
									<div class="form-group">
									<label class="col-md-4 control-label">Image:<span class="required">*</span></label>
										<div class="col-md-4">
											<input type="file" name="game_image" accept="image/*" data-style="fileinput" data-inputsize="medium">
											<label for="file1" class="has-error help-block" generated="true" style="display:none;"></label>
											<?php echo '<a href="images/'.$_SESSION['user_name'].'/game/'.$row_edit->category_image.'" target="_blank"><img alt="'.$row_edit->game_bundel_id.'" src="images/'.$_SESSION['user_name'].'/game/'.$row_edit->game_image.'" width="100px" height="100px"></a>'; ?>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-4 control-label" for="input17">Status </label>
										<div class="col-md-4">
											<select name="game_status" class="form-control">
											
                                                	<option value="Y" <?php if($row_edit->game_status == "Y"){echo "selected='selected'";}?>>Enable</option>
                                                	<option value="N" <?php if($row_edit->game_status == "N"){echo "selected='selected'";}?>>Disable</option>

											</select>
										</div>
										</div>
									
                          
								
		</form>
		
	<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins.form-components.js"></script>
	<script type="text/javascript" src="assets/js/demo/form_components.js"></script>
	<script type="text/javascript" src="plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
	<script type="text/javascript" src="assets/js/demo/form_validation.js"></script>	
		
		