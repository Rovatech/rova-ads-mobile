<?php 
include_once '../controllers/Restaurant.php';
$id = $_POST['id'];

$restaurantObj = new Restaurant();
$row_edit = $restaurantObj->getRestaurantDetail($id);


?>
<div id="dialog-add-cat" style="width: 49%; float: left;">
                               <form class="form-horizontal row-border" >
							<div class="form-group">
										<label class="col-md-4 control-label">User Name :</label>
										<div class="col-md-8"><?=$row_edit->user_name; ?></div>
							</div>
							
								<div class="form-group">
										<label class="col-md-4 control-label"> User Email :</label>
										<div class="col-md-8"><?=$row_edit->user_email; ?></div>
							</div>
							
								<div class="form-group">
										<label class="col-md-4 control-label">Owner Name :</label>
										<div class="col-md-8"><?=$row_edit->owner_name; ?></div>
							</div>
							
							
								<div class="form-group">
										<label class="col-md-4 control-label">Restaurant Name :</label>
										<div class="col-md-8"><?=$row_edit->restaurant_name; ?></div>
							</div>
							
								<div class="form-group">
										<label class="col-md-4 control-label">Restaurant Address :</label>
										<div class="col-md-8"><?=$row_edit->user_address; ?></div>
							</div>
							
								<div class="form-group">
										<label class="col-md-4 control-label">City :</label>
										<div class="col-md-8"><?=$row_edit->city; ?></div>
							</div>
								<div class="form-group">
										<label class="col-md-4 control-label">Country :</label>
										<div class="col-md-8"><?=$row_edit->country; ?></div>
							</div>
							<div class="form-group">
										<label class="col-md-4 control-label">Postal Code :</label>
										<div class="col-md-8"><?=$row_edit->postal_code; ?></div>
							</div>
							<div class="form-group">
										<label class="col-md-4 control-label">Phone Number :</label>
										<div class="col-md-8"><?=$row_edit->user_phone; ?></div>
							</div>
								<div class="form-group">
										<label class="col-md-4 control-label">Account Status :</label>
										<div class="col-md-8"><?=($row_edit->user_status== "Y") ? 'Enable' : 'Disable'; ?></div>
							</div>

                          
                          
								
							</form>
                  </div>         
                  <div id="dialog-add-cat" style="width: 49%; float: left;">
                               <form class="form-horizontal row-border" >
                               <div class="form-group">
										<label class="col-md-4 control-label">Logo :</label>
										<div class="col-md-8"> <?php 
                                    if(!empty($row_edit->user_image)){
                                    	?>
                                    	<a href="images/<?php echo $row_edit->user_name; ?>/<?php echo $row_edit->user_image; ?>" target="_blank" ><img src="images/<?php echo $row_edit->user_name; ?>/<?php echo $row_edit->user_image; ?>"  width="300" height="300" />
                                    	</a>
                                    	<?php 
                                    }
                                    ?></div>
							</div>
							 <div class="form-group">
										<label class="col-md-4 control-label">Show Map :</label>
										<?php $newID = base64_encode($row_edit->user_id) ?>
										<div class="col-md-8"><a target="_blank" href="mapView.php?restaurant_id=<?php echo $newID; ?>">Click Here</a></div>
							</div>
                               </form>
                               </div>
 
				
