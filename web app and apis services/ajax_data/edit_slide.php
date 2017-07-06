<?php 
session_start();
include_once '../controllers/Ads.php';
$id = $_POST['id'];

$adsObj = new Ads();
$row_edit = $adsObj->getSlideDetail($id);
?>

   <form class="form-horizontal row-border" id="validate-3" action="edit_action/edit_slide.php"  method="post" enctype="multipart/form-data">
							<input type="hidden" name="ad_id" value="<?=$row_edit->ad_id; ?>" />
							<input type="hidden" name="banner_image_old" value="<?=$row_edit->ad_banner; ?>" />
							
									<div class="form-group">
									<label class="col-md-4 control-label">Image:<span class="required">*</span></label>
										<div class="col-md-4">
											<input type="file" name="ad_banner" accept="image/*" data-style="fileinput" data-inputsize="medium">
											<label for="file1" class="has-error help-block" generated="true" style="display:none;"></label>
											<?php echo '<a href="images/slides/'.$row_edit->ad_banner.'" target="_blank"><img alt="'.$row_edit->ad_banner.'" src="images/slides/'.$row_edit->ad_banner.'" width="100px" height="100px"></a>'; ?>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-4 control-label">Link:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="ad_link" class="form-control required" value="<?=$row_edit->ad_link; ?>"></div>
									</div>
									
										<div class="form-group">
										<label class="col-md-4 control-label" for="input17">Dish Category:<span class="required">*</span></label>
										<div class="col-md-4">
										 <?php 
                                                $pages = $adsObj->getAllPages();
                                                if($pages){
                                         ?>
											<select name="page_id" class="select2-select-00 col-md-12 full-width-fix">
                                               <?php 
                                                foreach($pages as $page){
                                                	?>
                                                	<option value="<?php echo $page->page_number; ?>" <?php if($page->page_number == $row_edit->page_id){echo "selected='selected'";} ?>><?php echo $page->page_number; ?></option>
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
		
		