<?php 
session_start();
include_once '../controllers/VideoAds.php';
$id = $_POST['id'];

$adsObj = new VideoAds();
$row_edit = $adsObj->getSlideDetail($id);
?>

   <form class="form-horizontal row-border" id="validate-3" action="edit_action/edit_video.php"  method="post" enctype="multipart/form-data">
							<input type="hidden" name="ad_id" value="<?=$row_edit->ad_id; ?>" />
							
									
									<div class="form-group">
										<label class="col-md-4 control-label">Link:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="ad_link" class="form-control required" value="<?=$row_edit->ad_link; ?>"></div>
									</div>
							
									<div class="form-group">
										<label class="col-md-4 control-label" for="input17">Status </label>
										<div class="col-md-4">
											<select name="ad_status" class="form-control">
											
                                                	<option value="Y" <?php if($row_edit->ad_status == "Y"){echo "selected='selected'";}?>>Enable</option>
                                                	<option value="N" <?php if($row_edit->ad_status == "N"){echo "selected='selected'";}?>>Disable</option>

											</select>
										</div>
										</div>
									
                          
								
		</form>
		
	<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins.form-components.js"></script>
	<script type="text/javascript" src="assets/js/demo/form_components.js"></script>
	<script type="text/javascript" src="plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
	<script type="text/javascript" src="assets/js/demo/form_validation.js"></script>	
		
		