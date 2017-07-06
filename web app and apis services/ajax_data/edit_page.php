<?php 
session_start();
include_once '../controllers/Ads.php';
$id = $_POST['id'];

$adsObj = new Ads();
$row_edit = $adsObj->getPageDetail($id);
?>

   <form class="form-horizontal row-border" id="validate-3" action="edit_action/edit_page.php"  method="post" >
							<input type="hidden" name="page_id" value="<?=$row_edit->page_id; ?>" />
							<div class="form-group">
										<label class="col-md-4 control-label">Page Name:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="page_name" class="form-control required" value="<?=$row_edit->page_name; ?>"></div>
									</div>
									
										<div class="form-group">
										<label class="col-md-4 control-label">Page Number:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="page_number" class="form-control required digits" value="<?=$row_edit->page_number; ?>"></div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label" for="input17">Status </label>
										<div class="col-md-4">
											<select name="page_status" class="form-control">
											
                                                	<option value="Y" <?php if($row_edit->page_status == "Y"){echo "selected='selected'";}?>>Enable</option>
                                                	<option value="N" <?php if($row_edit->page_status == "N"){echo "selected='selected'";}?>>Disable</option>

											</select>
										</div>
										</div>
									
                          
								
		</form>
		
	<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins.form-components.js"></script>
	<script type="text/javascript" src="assets/js/demo/form_components.js"></script>
	<script type="text/javascript" src="plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
	<script type="text/javascript" src="assets/js/demo/form_validation.js"></script>	
		
		