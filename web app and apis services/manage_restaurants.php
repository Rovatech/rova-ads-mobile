<?php include_once 'head.php'; ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script type="text/javascript">
  function getLocation() {
	  
	  var LL = "";
	  var geocoder = new google.maps.Geocoder();
	  var markerBounds = new google.maps.LatLngBounds();
	  if(document.getElementById("autocomplete").value == "")
	  {
		  LL = new google.maps.LatLng(54, -2);
		  var myOptions = {
			      zoom: 2,
			      center: LL,
			      mapTypeId: google.maps.MapTypeId.ROADMAP
			    }
			    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			    
			    var marker = new google.maps.Marker({
			        position: LL, 
			        map: map,
			        draggable:true
			    });
				document.getElementById('lat').value = marker.position.lat();
			    document.getElementById('lng').value = marker.position.lng();
			    google.maps.event.addListener(
			            marker,
			            'drag',
			            function() {
			                document.getElementById('lat').value = marker.position.lat();
			                document.getElementById('lng').value = marker.position.lng();
			            }
			        );
			  
	  }
	  else
	  {
		  
		 geocoder.geocode( { 'address': document.getElementById("autocomplete").value}, function(results, status) {
		   
		if (status == google.maps.GeocoderStatus.OK) {
		LL = results[0].geometry.location;



		 var myOptions = {
			      zoom: 15,
			      center: LL,
			      mapTypeId: google.maps.MapTypeId.ROADMAP
			    }
			    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			    
			    var marker = new google.maps.Marker({
			        position: LL, 
			        map: map,
			        draggable:true
			    });
				document.getElementById('lat').value = marker.position.lat();
			    document.getElementById('lng').value = marker.position.lng();
			    google.maps.event.addListener(
			            marker,
			            'drag',
			            function() {
			                document.getElementById('lat').value = marker.position.lat();
			                document.getElementById('lng').value = marker.position.lng();
			            }
			        );
			  
		
		}

		  });
		  
	  }
	
  }
//This example displays an address form, using the autocomplete feature
//of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
 locality: 'long_name',
 country: 'long_name'
};

function initialize() {
	getLocation();
 // Create the autocomplete object, restricting the search
 // to geographical location types.
 autocomplete = new google.maps.places.Autocomplete(
     /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
     { types: ['geocode'] });
 // When the user selects an address from the dropdown,
 // populate the address fields in the form.
 google.maps.event.addListener(autocomplete, 'place_changed', function() {
   fillInAddress();
 });
}

//The START and END in square brackets define a snippet for our documentation:
//[START region_fillform]
function fillInAddress() {
 // Get the place details from the autocomplete object.
 var place = autocomplete.getPlace();

 for (var component in componentForm) {
   document.getElementById(component).value = '';
   document.getElementById(component).disabled = false;
 }

 // Get each component of the address from the place details
 // and fill the corresponding field on the form.
 for (var i = 0; i < place.address_components.length; i++) {
   var addressType = place.address_components[i].types[0];
   if (addressType == "country" || addressType == "locality") {
     var val = place.address_components[i][componentForm[addressType]];
     document.getElementById(addressType).value = val;
   }
 }
}
//[END region_fillform]

//[START region_geolocation]
//Bias the autocomplete object to the user's geographical location,
//as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
 if (navigator.geolocation) {
   navigator.geolocation.getCurrentPosition(function(position) {
     var geolocation = new google.maps.LatLng(
         position.coords.latitude, position.coords.longitude);
     autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
         geolocation));
   });
 }
}
//[END region_geolocation]
  
  
</script>

<style>
      #locationField, #controls {
        position: relative;
        width: 480px;
      }
      #autocomplete {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 99%;
      }
      .label {
        text-align: right;
        font-weight: bold;
        width: 100px;
        color: #303030;
      }
      #address {
        border: 1px solid #000090;
        background-color: #f0f0ff;
        width: 480px;
        padding-right: 2px;
      }
      #address td {
        font-size: 10pt;
      }
      .field {
        width: 99%;
      }
      .slimField {
        width: 80px;
      }
      .wideField {
        width: 200px;
      }
      #locationField {
        height: 20px;
        margin-bottom: 2px;
      }
    </style>
    
<body onload="initialize();">
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
	}
}
?>
<?php 
if($_SESSION['user_role'] == "*")
{
?>
	<div id="container">
	
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">
				<?php include_once 'navigation.php'; ?>
			</div>
			<div id="divider" class="resizeable"></div>
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
					Restaurant Added.
				</div>
            	<?php 
            }
            else if($flag == "failed")
            {
            	?>
            	<div class="alert fade in alert-danger">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Restaurant Couldnot Added.
				</div>
                <?php 
            }
            else if($flag == "duplicate")
            {
            ?>
                        	<div class="alert fade in alert-danger">
            					<i class="icon-remove close" data-dismiss="alert"></i>
            					You cannot create Duplicate Restaurant.
            				</div>
                            <?php 
                        }
            ?>
				<!--=== Page Content ===-->
				<div class="row">
					<!--=== General Buttons ===-->
					<div class="col-md-12">
						<div class="widget box">
						<a class="btn btn-primary" href="#add-restaurant">Add Restaurant</a>
						</div>
					</div>
				</div>
		
				<!--=== Table ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Manage Restaurants</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<table class="table table-striped table-bordered table-hover table-checkable datatable-restaurant">
									<thead>
										<tr>
											<th>No</th>
											<th>Username</th>
											<th>Owner Name</th>
											<th>Phone</th>
											<th>Created On</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- /Table -->
				
				<!--=== Form ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Add Restaurant</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div id="add-restaurant" class="widget-content">
                               <form class="form-horizontal row-border" id="validate-2" action="action/add_restaurant.php" method="post" enctype="multipart/form-data">
								<input type="hidden" id="lat" name="lat">
								<input type="hidden" id="lng" name="lng">
									<div class="form-group">
										<label class="col-md-2 control-label">Username:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="user_name" class="form-control required"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Password:<span class="required">*</span></label>
										<div class="col-md-4"><input type="password" name="user_pass" class="form-control required"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Email:<span class="required">*</span></label>
										<div class="col-md-4"><input type="email" name="user_email" class="form-control required"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Owner Name:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="owner_name" class="form-control required"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Restaurant Name:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="restaurant_name" class="form-control required"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Full Address:<span class="required">*</span></label>
										<div class="col-md-8"><input type="text" id="autocomplete" onFocus="geolocate()" name="user_address" onblur="getLocation();" class="form-control required" placeholder="E.g : 41 Green Ln, Handsworth, Birmingham, West Midlands B21 0DE, UK"></div>
										
									</div>
									<div id="map_canvas" style="width:90%;height:288px; margin-left: 5%;"></div>
									<div class="form-group">
										<label class="col-md-2 control-label">City:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" id="locality" name="city" class="form-control required"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Country:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" id="country" name="country" class="form-control required"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Postal Code:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="postal_code" class="form-control required"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Telephone:<span class="required">*</span></label>
										<div class="col-md-4"><input type="text" name="user_phone" class="form-control required"></div>
									</div>
									<div class="form-group">
									<label class="col-md-2 control-label">Image/logo:<span class="required">*</span></label>
										<div class="col-md-4">
											<input type="file" name="user_image" class="required" accept="image/*" data-style="fileinput" data-inputsize="medium">
											<label for="file1" class="has-error help-block" generated="true" style="display:none;"></label>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-2 control-label">Status</label>
										<div class="col-md-8">
											<div class="make-switch" data-on="info" data-off="success">
												<input name="status" type="checkbox" checked class="toggle">
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
				
				
				 	<div id="restaurant-view">
                        		<div class="mws-dialog-inner-restaurant-view">
                                </div>
                            </div>
                            
                             <div id="restaurant-delete">
                        		<div class="mws-dialog-inner-restaurant-delete" style="display: none;">
                        		Do you really want to delete this restaurant?
                                </div>
                            </div>
                            
				<!-- /Page Content -->
			</div>
			<!-- /.container -->

		</div>
	</div>
<?php include_once 'js_files.php'; ?>
<?php }
else 
{
	header("Location: index.php");
} ?>
</body>
</html>