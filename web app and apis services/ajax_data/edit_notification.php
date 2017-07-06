<?php 
session_start();
include_once '../controllers/Notification.php';
$id = $_POST['id'];

$notificationObj = new Notification();
$row_edit = $notificationObj->getNotificationDetail($id);
?>

   <form class="form-horizontal row-border" id="validate-3" action="edit_action/edit_notification.php"  method="post" enctype="multipart/form-data">
							<input type="hidden" name="notification_id" value="<?=$row_edit->notification_id; ?>" />
							<input type="hidden" name="banner_old" value="<?=$row_edit->banner; ?>" />
							<div class="form-group">
										<label class="col-md-2 control-label">Title:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="title" class="form-control required" value="<?php echo $row_edit->title; ?>"></div>
									</div>
										<div class="form-group">
										<label class="col-md-2 control-label">Description:<span class="required">*</span></label>
										<div class="col-md-10"><input type="text" name="description" class="form-control required" value="<?php echo $row_edit->description; ?>"></div>
									</div>
									<div class="form-group">
									<label class="col-md-2 control-label">Banner:<span class="required">*</span></label>
										<div class="col-md-4">
											<input type="file" name="banner" accept="image/*" data-style="fileinput" data-inputsize="medium">
											<label for="file1" class="has-error help-block" generated="true" style="display:none;"></label>
											<?php echo '<a href="images/'.$_SESSION['user_name'].'/notifications/'.$row_edit->banner.'" target="_blank"><img alt="'.$row_edit->banner.'" src="images/'.$_SESSION['user_name'].'/notifications/'.$row_edit->banner.'" width="100px" height="100px"></a>'; ?>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-2 control-label" for="input17">Status </label>
										<div class="col-md-4">
											<select name="notification_status" class="form-control">
											
                                                	<option value="Y" <?php if($row_edit->notification_status == "Y"){echo "selected='selected'";}?>>Enable</option>
                                                	<option value="N" <?php if($row_edit->notification_status == "N"){echo "selected='selected'";}?>>Disable</option>

											</select>
										</div>
										</div>
									
                          
								
		</form>
		
	<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins.form-components.js"></script>
	<script type="text/javascript" src="assets/js/demo/form_components.js"></script>
	<script type="text/javascript" src="plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
	<script type="text/javascript" src="assets/js/demo/form_validation.js"></script>	
		
		