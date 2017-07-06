/*
 * general_ui.js
 *
 * Demo JavaScript used on General UI-page.
 */

"use strict";

$(document).ready(function(){
	
	$('#video').hide();
	$('input[type=radio][name=type]').change(function() {
        if (this.value == 'b') {
            $('#slide').show();
            $('#video').hide();
        }
        else if (this.value == 'v') {
            $('#video').show();
            $('#slide').hide();
        }
    });

	 // ad schedule
    $(".datatable-schedule").dataTable({
		 "bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "gridmodel/schedule_grid.php",
			"aoColumnDefs": [
			 				{ 'bSortable': false, 'aTargets': [0,6] }
			 			],
			"aoColumns": [
			              null,
			              null,
			              null,
			              null,
			              null,
			              null,
			              {
			                "mData": null,
			                "sDefaultContent": "Action"
			              }
			            ],
			  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
    		      // Bold the grade for all 'A' grade browsers
				  $('td:eq(0)', nRow).html( iDisplayIndex+1 );
				  $('td:eq(6)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[0]+'" title="Delete Ad Schedule" class="btn btn-s bs-tooltip btn-delete-schedule"><i class="icon-trash"></i></a></span>');
			  }
    });
	

    // ***************************************  Delete schedule  ****************************************
       $(document).on('click', '.btn-delete-schedule', function() {
       	var value = $( this ).attr( 'value' );
       	$('.mws-dialog-inner-schedule-delete').css('display','block');
       	
           $("#schedule-delete").dialog({
               autoOpen: false,
               title: "Delete Schedule",
               modal: true,
               width: "600",
               buttons: [{
                   text: "Delete",
                   click: function () {
                   	$.ajax(
                       {
                           url : "ajax_data/delete_action.php",
                           type: "POST",
                           data : {id: value, action: 'btn-schedule-delete'},
                           success:function(data, textStatus, jqXHR)
                           {
                        	  window.location ='manage_ads_schedule.php';
                           },
                           error: function(jqXHR, textStatus, errorThrown)
                           {
                               //if fails     
                           }
                       });
                   	$('.mws-dialog-inner-schedule-delete').css('display','none');
                   	$(this).dialog("close");
                   }
               },{
                   text: "Cancel",
                   click: function () {
                   	$('.mws-dialog-inner-schedule-delete').css('display','none');
                       $(this).dialog("close");
                   }
               }]
           
           }).dialog("open");
       	
           
       });
       
       // ***************************************  END Delete schedule  ****************************************

	
	// ------------------------------------   MAIN ADMIN FOR US -------------------------------------
	// **************************************  for ADD NEW Restaurants ****************************************
	
	 // Restaurant
    $(".datatable-restaurant").dataTable({
		 "bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "gridmodel/restaurant_grid.php",
			"aoColumnDefs": [
			 				{ 'bSortable': false, 'aTargets': [0,6] }
			 			],
			"aoColumns": [
			              null,
			              null,
			              null,
			              null,
			              null,
			              null,
			              {
			                "mData": null,
			                "sDefaultContent": "Action"
			              }
			            ],
			  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
    		      // Bold the grade for all 'A' grade browsers
				  $('td:eq(0)', nRow).html( iDisplayIndex+1 );
				  $('td:eq(6)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[0]+'" title="View Details" class="btn btn-s bs-tooltip btn-view-restaurant"><i class="icon-list"></i></a><a href="javascript:void(0);" value="'+aData[0]+'" title="Delete Restaurant" class="btn btn-s bs-tooltip btn-delete-restaurant"><i class="icon-trash"></i></a></span>');
			  }
    });
    
 // **************************************  END ADD NEW Restaurants ****************************************
    
    
    
    // **##**##**##**##**##**##**##**##**##**## Page Management   **##**##**##**##**##**##**##**##**##**##**##

       // Category Datatable
          $(".datatable-page").dataTable({
      		 "bProcessing": true,
      			"bServerSide": true,
      			"sAjaxSource": "gridmodel/page_grid.php",
      			"aoColumnDefs": [
      			 				{ 'bSortable': false, 'aTargets': [0,4] }
      			 			],
      			"aoColumns": [
      			              null,
      			              null,
      			              null,
      			              null,
      			              {
      			                "mData": null,
      			                "sDefaultContent": "Action"
      			              }
      			            ],
      			  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
          		      // Bold the grade for all 'A' grade browsers
      				$('td:eq(0)', nRow).html( iDisplayIndex+1 );
      				//
      				$('td:eq(4)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[0]+'" title="Edit Page" class="btn btn-s bs-tooltip btn-page-edit"><i class="icon-edit"></i></a><a href="javascript:void(0);" value="'+aData[0]+'" title="Delete Page" class="btn btn-s bs-tooltip btn-delete-page"><i class="icon-trash"></i></a></span>');
      			  }
          });
       
          
          // ***************************************  Update Status page  ****************************************
          $(document).on('click', '.page_status_disable_enable', function() {
          	var v = $( this ).find('a').attr( 'value' );
          	var i = $( this ).find('a').attr( 'row' );
          	var countTableRow = $( this ).find('a').attr( 'countTableRow' );

          	$.ajax(
                      {
                          url : "ajax_data/update_action.php",
                          type: "POST",
                          data : {id: i,value: v, tableRow: countTableRow, action: 'btn-page-update'},
                          success:function(data, textStatus, jqXHR)
                          {
                          	var item1 = $( ".page_restaurantStatus"+countTableRow );
                          	$( item1 ).html( data );
                          },
                          error: function(jqXHR, textStatus, errorThrown)
                          {
                              //if fails     
                          }
                      });
          	
          });
          
          // *************************************** END Update Status page  ****************************************
          
          // ***************************************  Edit page  ****************************************
         
            $("#page-edit").dialog({
               autoOpen: false,
               title: "Edit Page",
               modal: true,
               width: "700",
               buttons: [{
                   text: "Update",
                   click: function () {
                       $(this).find('form#validate-3').submit();
                   }
               },{
                   text: "Close",
                   click: function () {
                       $(this).dialog("close");
                   }
               }]
            });

            $(document).on('click', '.btn-page-edit', function() {
            	var value = $( this ).attr( 'value' );
            	$.ajax(
               {
                   url : "ajax_data/edit_page.php",
                   type: "POST",
                   data : {id: value},
                   success:function(data, textStatus, jqXHR)
                   {
                   	$('.mws-dialog-inner-page-edit').html(data);
                   },
                   error: function(jqXHR, textStatus, errorThrown)
                   {
                       //if fails     
                   }
               });
            	
            	$("#page-edit").dialog("option", {
                   modal: false
               }).dialog("open");
               //event.preventDefault();
            });

        //  ******************************************* END Edit page ***********************************************    
          
       // ***************************************  Delete page  ****************************************
          $(document).on('click', '.btn-delete-page', function() {
          	var value = $( this ).attr( 'value' );
          	$('.mws-dialog-inner-page-delete').css('display','block');
          	
              $("#page-delete").dialog({
                  autoOpen: false,
                  title: "Delete Page",
                  modal: true,
                  width: "600",
                  buttons: [{
                      text: "Delete",
                      click: function () {
                      	$.ajax(
                          {
                              url : "ajax_data/delete_action.php",
                              type: "POST",
                              data : {id: value, action: 'btn-page-delete'},
                              success:function(data, textStatus, jqXHR)
                              {
                           	  window.location ='manage_pages.php';
                              },
                              error: function(jqXHR, textStatus, errorThrown)
                              {
                                  //if fails     
                              }
                          });
                      	$('.mws-dialog-inner-page-delete').css('display','none');
                      	$(this).dialog("close");
                      }
                  },{
                      text: "Cancel",
                      click: function () {
                      	$('.mws-dialog-inner-page-delete').css('display','none');
                          $(this).dialog("close");
                      }
                  }]
              
              }).dialog("open");
          	
              
          });
          
          // ***************************************  END Delete page  ****************************************

          
          
    // **##**##**##**##**##**##**##**##**##**## END page Management   **##**##**##**##**##**##**##**##**##**##**##
          
   

          
          // **##**##**##**##**##**##**##**##**##**## Slide Management   **##**##**##**##**##**##**##**##**##**##**##

             // Slide Datatable
                $(".datatable-slide").dataTable({
            		 "bProcessing": true,
            			"bServerSide": true,
            			"sAjaxSource": "gridmodel/slide_grid.php",
            			"aoColumnDefs": [
            			 				{ 'bSortable': false, 'aTargets': [0,7] }
            			 			],
            			"aoColumns": [
            			              null,
            			              null,
            			              null,
            			              null,
            			              null,
            			              null,
            			              null,
            			              {
            			                "mData": null,
            			                "sDefaultContent": "Action"
            			              }
            			            ],
            			  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                		      // Bold the grade for all 'A' grade browsers
            				$('td:eq(0)', nRow).html( iDisplayIndex+1 );
            				//
            				$('td:eq(7)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[0]+'" title="Edit Slide" class="btn btn-s bs-tooltip btn-slide-edit"><i class="icon-edit"></i></a><a href="javascript:void(0);" value="'+aData[0]+'" title="Delete Slide" class="btn btn-s bs-tooltip btn-delete-slide"><i class="icon-trash"></i></a></span>');
            			  }
                });
             
                // Video Datatable
                $(".datatable-video").dataTable({
            		 "bProcessing": true,
            			"bServerSide": true,
            			"sAjaxSource": "gridmodel/video_grid.php",
            			"aoColumnDefs": [
            			 				{ 'bSortable': false, 'aTargets': [0,3] }
            			 			],
            			"aoColumns": [
            			              null,
            			              null,
            			              null,
            			              {
            			                "mData": null,
            			                "sDefaultContent": "Action"
            			              }
            			            ],
            			  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                		      // Bold the grade for all 'A' grade browsers
            				$('td:eq(0)', nRow).html( iDisplayIndex+1 );
            				//
            				$('td:eq(3)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[0]+'" title="Edit Video" class="btn btn-s bs-tooltip btn-video-edit"><i class="icon-edit"></i></a><a href="javascript:void(0);" value="'+aData[0]+'" title="Delete Video" class="btn btn-s bs-tooltip btn-delete-video"><i class="icon-trash"></i></a></span>');
            			  }
                });
                
                // ***************************************  Update Status slide  ****************************************
                $(document).on('click', '.slide_status_disable_enable', function() {
                	var v = $( this ).find('a').attr( 'value' );
                	var i = $( this ).find('a').attr( 'row' );
                	var countTableRow = $( this ).find('a').attr( 'countTableRow' );

                	$.ajax(
                            {
                                url : "ajax_data/update_action.php",
                                type: "POST",
                                data : {id: i,value: v, tableRow: countTableRow, action: 'btn-slide-update'},
                                success:function(data, textStatus, jqXHR)
                                {
                                	var item1 = $( ".slide_restaurantStatus"+countTableRow );
                                	$( item1 ).html( data );
                                },
                                error: function(jqXHR, textStatus, errorThrown)
                                {
                                    //if fails     
                                }
                            });
                	
                });
                
                // For video
                
                $(document).on('click', '.video_status_disable_enable', function() {
                	var v = $( this ).find('a').attr( 'value' );
                	var i = $( this ).find('a').attr( 'row' );
                	var countTableRow = $( this ).find('a').attr( 'countTableRow' );

                	$.ajax(
                            {
                                url : "ajax_data/update_action.php",
                                type: "POST",
                                data : {id: i,value: v, tableRow: countTableRow, action: 'btn-video-update'},
                                success:function(data, textStatus, jqXHR)
                                {
                                	var item1 = $( ".video_restaurantStatus"+countTableRow );
                                	$( item1 ).html( data );
                                },
                                error: function(jqXHR, textStatus, errorThrown)
                                {
                                    //if fails     
                                }
                            });
                	
                });
                
                
                // *************************************** END Update Status slide  ****************************************
                
                // ***************************************  Edit slide  ****************************************
               
                  $("#slide-edit").dialog({
                     autoOpen: false,
                     title: "Edit Slide",
                     modal: true,
                     width: "700",
                     buttons: [{
                         text: "Update",
                         click: function () {
                             $(this).find('form#validate-3').submit();
                         }
                     },{
                         text: "Close",
                         click: function () {
                             $(this).dialog("close");
                         }
                     }]
                  });

                  $(document).on('click', '.btn-slide-edit', function() {
                  	var value = $( this ).attr( 'value' );
                  	$.ajax(
                     {
                         url : "ajax_data/edit_slide.php",
                         type: "POST",
                         data : {id: value},
                         success:function(data, textStatus, jqXHR)
                         {
                         	$('.mws-dialog-inner-slide-edit').html(data);
                         },
                         error: function(jqXHR, textStatus, errorThrown)
                         {
                             //if fails     
                         }
                     });
                  	
                  	$("#slide-edit").dialog("option", {
                         modal: false
                     }).dialog("open");
                     //event.preventDefault();
                  });

                  //  for video
                  

                  $("#video-edit").dialog({
                     autoOpen: false,
                     title: "Edit Video",
                     modal: true,
                     width: "700",
                     buttons: [{
                         text: "Update",
                         click: function () {
                             $(this).find('form#validate-3').submit();
                         }
                     },{
                         text: "Close",
                         click: function () {
                             $(this).dialog("close");
                         }
                     }]
                  });

                  $(document).on('click', '.btn-video-edit', function() {
                  	var value = $( this ).attr( 'value' );
                  	$.ajax(
                     {
                         url : "ajax_data/edit_video.php",
                         type: "POST",
                         data : {id: value},
                         success:function(data, textStatus, jqXHR)
                         {
                         	$('.mws-dialog-inner-video-edit').html(data);
                         },
                         error: function(jqXHR, textStatus, errorThrown)
                         {
                             //if fails     
                         }
                     });
                  	
                  	$("#video-edit").dialog("option", {
                         modal: false
                     }).dialog("open");
                     //event.preventDefault();
                  });
              //  ******************************************* END Edit slide ***********************************************    
                
             // ***************************************  Delete slide  ****************************************
                $(document).on('click', '.btn-delete-slide', function() {
                	var value = $( this ).attr( 'value' );
                	$('.mws-dialog-inner-slide-delete').css('display','block');
                	
                    $("#slide-delete").dialog({
                        autoOpen: false,
                        title: "Delete Slide",
                        modal: true,
                        width: "600",
                        buttons: [{
                            text: "Delete",
                            click: function () {
                            	$.ajax(
                                {
                                    url : "ajax_data/delete_action.php",
                                    type: "POST",
                                    data : {id: value, action: 'btn-slide-delete'},
                                    success:function(data, textStatus, jqXHR)
                                    {
                                 	  window.location ='manage_ads.php';
                                    },
                                    error: function(jqXHR, textStatus, errorThrown)
                                    {
                                        //if fails     
                                    }
                                });
                            	$('.mws-dialog-inner-slide-delete').css('display','none');
                            	$(this).dialog("close");
                            }
                        },{
                            text: "Cancel",
                            click: function () {
                            	$('.mws-dialog-inner-slide-delete').css('display','none');
                                $(this).dialog("close");
                            }
                        }]
                    
                    }).dialog("open");
                	
                    
                });
                
                
                $(document).on('click', '.btn-delete-video', function() {
                	var value = $( this ).attr( 'value' );
                	$('.mws-dialog-inner-video-delete').css('display','block');
                	
                    $("#video-delete").dialog({
                        autoOpen: false,
                        title: "Delete Video",
                        modal: true,
                        width: "600",
                        buttons: [{
                            text: "Delete",
                            click: function () {
                            	$.ajax(
                                {
                                    url : "ajax_data/delete_action.php",
                                    type: "POST",
                                    data : {id: value, action: 'btn-video-delete'},
                                    success:function(data, textStatus, jqXHR)
                                    {
                                 	  window.location ='manage_video_ads.php';
                                    },
                                    error: function(jqXHR, textStatus, errorThrown)
                                    {
                                        //if fails     
                                    }
                                });
                            	$('.mws-dialog-inner-video-delete').css('display','none');
                            	$(this).dialog("close");
                            }
                        },{
                            text: "Cancel",
                            click: function () {
                            	$('.mws-dialog-inner-video-delete').css('display','none');
                                $(this).dialog("close");
                            }
                        }]
                    
                    }).dialog("open");
                	
                    
                });
                
                // ***************************************  END Delete slide  ****************************************

                
                
          // **##**##**##**##**##**##**##**##**##**## END slide Management   **##**##**##**##**##**##**##**##**##**##**##
                        
          
          
	// **************************************  for Reservation ****************************************
	
	 // Restaurant
   $(".datatable-reservation").dataTable({
		 "bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "gridmodel/reservation.php",
			"aoColumnDefs": [
			 				{ 'bSortable': false, 'aTargets': [0,7] }
			 			],
			"aoColumns": [
			              null,
			              null,
			              null,
			              null,
			              null,
			              null,
			              null,
			              {
			                "mData": null,
			                "sDefaultContent": "Action"
			              }
			            ],
			  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
   		      // Bold the grade for all 'A' grade browsers
				  $('td:eq(7)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[0]+'" title="View Reservation Detail" class="btn btn-s bs-tooltip btn-view-reservation"><i class="icon-eye-open "></i></a></span>');
			  }
   });
   
 //   View reservation
   $(document).on('click', '.btn-view-reservation', function() {
   	var value = $( this ).attr( 'value' );
   	window.location = 'manage_reservation.php?reservation='+value+'#reservationview';
   });
   //end reservation
   
   
// **************************************  END Reservation ****************************************
    
    // ***************************************  For View Restaurants  ****************************************
    $("#restaurant-view").dialog({
        autoOpen: false,
        title: "Restaurant Details",
        modal: true,
        width: "900",
        buttons: [{
            text: "Close",
            click: function () {
                $(this).dialog("close");
            }
        }]
    });
 
    $(document).on('click', '.btn-view-restaurant', function() {
    	var value = $( this ).attr( 'value' );
    	$.ajax(
        {
            url : "ajax_data/restaurant_detail.php",
            type: "POST",
            data : {id: value},
            success:function(data, textStatus, jqXHR)
            {
            	$('.mws-dialog-inner-restaurant-view').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                //if fails     
            }
        });
    	
    	$("#restaurant-view").dialog("option", {
            modal: false
        }).dialog("open");
    });
    
   // ***************************************  END View Restaurants  ****************************************
    
    
    // ***************************************  Delete Restaurants  ****************************************
    $(document).on('click', '.btn-delete-restaurant', function() {
    	var value = $( this ).attr( 'value' );
    	$('.mws-dialog-inner-restaurant-delete').css('display','block');
    	
        $("#restaurant-delete").dialog({
            autoOpen: false,
            title: "Delete Restaurant",
            modal: true,
            width: "600",
            buttons: [{
                text: "Delete",
                click: function () {
                	$.ajax(
                    {
                        url : "ajax_data/delete_action.php",
                        type: "POST",
                        data : {id: value, action: 'btn-restaurant-delete'},
                        success:function(data, textStatus, jqXHR)
                        {
                     	  window.location ='manage_restaurants.php';
                        },
                        error: function(jqXHR, textStatus, errorThrown)
                        {
                            //if fails     
                        }
                    });
                	$('.mws-dialog-inner-restaurant-delete').css('display','none');
                	$(this).dialog("close");
                }
            },{
                text: "Cancel",
                click: function () {
                	$('.mws-dialog-inner-restaurant-delete').css('display','none');
                    $(this).dialog("close");
                }
            }]
        
        }).dialog("open");
    	
        
    });
    
    // ***************************************  END Delete Restaurants  ****************************************
    
   // ***************************************  Update Status Restaurants  ****************************************
    $(document).on('click', '.status_disable_enable', function() {
    	var v = $( this ).find('a').attr( 'value' );
    	var i = $( this ).find('a').attr( 'row' );
    	var countTableRow = $( this ).find('a').attr( 'countTableRow' );

    	$.ajax(
                {
                    url : "ajax_data/update_action.php",
                    type: "POST",
                    data : {id: i,value: v, tableRow: countTableRow, action: 'btn-restaurant-update'},
                    success:function(data, textStatus, jqXHR)
                    {
                    	var item1 = $( ".restaurantStatus"+countTableRow );
                    	$( item1 ).html( data );
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        //if fails     
                    }
                });
    	
    });
    
    // *************************************** END Update Status Restaurants  ****************************************
    
 // ------------------------------------ END MAIN ADMIN FOR US -------------------------------------
 // ------------------------------------------------------------------------------------------------
    
//###############################################################################################################
    
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------ Resturant Admin Panel -------------------------------------
    
    // **##**##**##**##**##**##**##**##**##**## Kitchen User   **##**##**##**##**##**##**##**##**##**##**##
    
	 // Restaurant
    $(".datatable-kitchen").dataTable({
		 "bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "gridmodel/kuser_grid.php",
			"aoColumnDefs": [
			 				{ 'bSortable': false, 'aTargets': [0,6] }
			 			],
			"aoColumns": [
			              null,
			              null,
			              null,
			              null,
			              null,
			              null,
			              {
			                "mData": null,
			                "sDefaultContent": "Action"
			              }
			            ],
			  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
    		      // Bold the grade for all 'A' grade browsers
				  $('td:eq(0)', nRow).html( iDisplayIndex+1 );
				  $('td:eq(6)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[0]+'" title="Delete User" class="btn btn-s bs-tooltip btn-delete-kuser"><i class="icon-trash"></i></a></span>');
			  }
    });
    
    
 // ***************************************  Update Status Kuser  ****************************************
    $(document).on('click', '.kstatus_disable_enable', function() {
    	var v = $( this ).find('a').attr( 'value' );
    	var i = $( this ).find('a').attr( 'row' );
    	var countTableRow = $( this ).find('a').attr( 'countTableRow' );

    	$.ajax(
                {
                    url : "ajax_data/update_action.php",
                    type: "POST",
                    data : {id: i,value: v, tableRow: countTableRow, action: 'btn-krestaurant-update'},
                    success:function(data, textStatus, jqXHR)
                    {
                    	var item1 = $( ".krestaurantStatus"+countTableRow );
                    	$( item1 ).html( data );
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        //if fails     
                    }
                });
    	
    });
    
    // *************************************** END Update Status Kuser  ****************************************
    
    // ***************************************  Delete Restaurants  ****************************************
    $(document).on('click', '.btn-delete-kuser', function() {
    	var value = $( this ).attr( 'value' );
    	$('.mws-dialog-inner-kuser-delete').css('display','block');
    	
        $("#kuser-delete").dialog({
            autoOpen: false,
            title: "Delete User",
            modal: true,
            width: "600",
            buttons: [{
                text: "Delete",
                click: function () {
                	$.ajax(
                    {
                        url : "ajax_data/delete_action.php",
                        type: "POST",
                        data : {id: value, action: 'btn-kuser-delete'},
                        success:function(data, textStatus, jqXHR)
                        {
                     	  window.location ='manage_kitchen.php';
                        },
                        error: function(jqXHR, textStatus, errorThrown)
                        {
                            //if fails     
                        }
                    });
                	$('.mws-dialog-inner-kuser-delete').css('display','none');
                	$(this).dialog("close");
                }
            },{
                text: "Cancel",
                click: function () {
                	$('.mws-dialog-inner-kuser-delete').css('display','none');
                    $(this).dialog("close");
                }
            }]
        
        }).dialog("open");
    	
        
    });
    
    // ***************************************  END Delete Restaurants  ****************************************
    
    // **##**##**##**##**##**##**##**##**##**## END Kitchen User   **##**##**##**##**##**##**##**##**##**##**##
    
 // **##**##**##**##**##**##**##**##**##**## Category Management   **##**##**##**##**##**##**##**##**##**##**##

    // Category Datatable
       $(".datatable-category").dataTable({
   		 "bProcessing": true,
   			"bServerSide": true,
   			"sAjaxSource": "gridmodel/category_grid.php",
   			"aoColumnDefs": [
   			 				{ 'bSortable': false, 'aTargets': [0,5] }
   			 			],
   			"aoColumns": [
   			              null,
   			              null,
   			              null,
   			              null,
   			              null,
   			              {
   			                "mData": null,
   			                "sDefaultContent": "Action"
   			              }
   			            ],
   			  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
       		      // Bold the grade for all 'A' grade browsers
   				$('td:eq(0)', nRow).html( iDisplayIndex+1 );
   				//
   				$('td:eq(5)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[0]+'" title="Edit Category" class="btn btn-s bs-tooltip btn-category-edit"><i class="icon-edit"></i></a><a href="javascript:void(0);" value="'+aData[0]+'" title="Delete Category" class="btn btn-s bs-tooltip btn-delete-category"><i class="icon-trash"></i></a></span>');
   			  }
       });
    
       
       // ***************************************  Update Status Category  ****************************************
       $(document).on('click', '.category_status_disable_enable', function() {
       	var v = $( this ).find('a').attr( 'value' );
       	var i = $( this ).find('a').attr( 'row' );
       	var countTableRow = $( this ).find('a').attr( 'countTableRow' );

       	$.ajax(
                   {
                       url : "ajax_data/update_action.php",
                       type: "POST",
                       data : {id: i,value: v, tableRow: countTableRow, action: 'btn-category-update'},
                       success:function(data, textStatus, jqXHR)
                       {
                       	var item1 = $( ".category_restaurantStatus"+countTableRow );
                       	$( item1 ).html( data );
                       },
                       error: function(jqXHR, textStatus, errorThrown)
                       {
                           //if fails     
                       }
                   });
       	
       });
       
       // *************************************** END Update Status Category  ****************************************
       
       // ***************************************  Edit Category  ****************************************
      
         $("#category-edit").dialog({
            autoOpen: false,
            title: "Edit Category",
            modal: true,
            width: "700",
            buttons: [{
                text: "Update",
                click: function () {
                    $(this).find('form#validate-3').submit();
                }
            },{
                text: "Close",
                click: function () {
                    $(this).dialog("close");
                }
            }]
         });

         $(document).on('click', '.btn-category-edit', function() {
         	var value = $( this ).attr( 'value' );
         	$.ajax(
            {
                url : "ajax_data/edit_category.php",
                type: "POST",
                data : {id: value},
                success:function(data, textStatus, jqXHR)
                {
                	$('.mws-dialog-inner-category-edit').html(data);
                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                    //if fails     
                }
            });
         	
         	$("#category-edit").dialog("option", {
                modal: false
            }).dialog("open");
            //event.preventDefault();
         });

     //  ******************************************* END Edit Category ***********************************************    
       
    // ***************************************  Delete Category  ****************************************
       $(document).on('click', '.btn-delete-category', function() {
       	var value = $( this ).attr( 'value' );
       	$('.mws-dialog-inner-category-delete').css('display','block');
       	
           $("#category-delete").dialog({
               autoOpen: false,
               title: "Delete Category",
               modal: true,
               width: "600",
               buttons: [{
                   text: "Delete",
                   click: function () {
                   	$.ajax(
                       {
                           url : "ajax_data/delete_action.php",
                           type: "POST",
                           data : {id: value, action: 'btn-category-delete'},
                           success:function(data, textStatus, jqXHR)
                           {
                        	  window.location ='manage_categories.php';
                           },
                           error: function(jqXHR, textStatus, errorThrown)
                           {
                               //if fails     
                           }
                       });
                   	$('.mws-dialog-inner-category-delete').css('display','none');
                   	$(this).dialog("close");
                   }
               },{
                   text: "Cancel",
                   click: function () {
                   	$('.mws-dialog-inner-category-delete').css('display','none');
                       $(this).dialog("close");
                   }
               }]
           
           }).dialog("open");
       	
           
       });
       
       // ***************************************  END Delete Category  ****************************************

       
       
 // **##**##**##**##**##**##**##**##**##**## END Category Management   **##**##**##**##**##**##**##**##**##**##**##
       
       
       

       // **##**##**##**##**##**##**##**##**##**## Game Management   **##**##**##**##**##**##**##**##**##**##**##

          // Category Datatable
             $(".datatable-game").dataTable({
         		 "bProcessing": true,
         			"bServerSide": true,
         			"sAjaxSource": "gridmodel/game_grid.php",
         			"aoColumnDefs": [
         			 				{ 'bSortable': false, 'aTargets': [0,4] }
         			 			],
         			"aoColumns": [
         			              null,
         			              null,
         			              null,
         			              null,
         			              {
         			                "mData": null,
         			                "sDefaultContent": "Action"
         			              }
         			            ],
         			  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
             		      // Bold the grade for all 'A' grade browsers
         				$('td:eq(0)', nRow).html( iDisplayIndex+1 );
         				//
         				$('td:eq(4)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[0]+'" title="Edit Game" class="btn btn-s bs-tooltip btn-game-edit"><i class="icon-edit"></i></a><a href="javascript:void(0);" value="'+aData[0]+'" title="Delete Game" class="btn btn-s bs-tooltip btn-delete-game"><i class="icon-trash"></i></a></span>');
         			  }
             });
          
             
             // ***************************************  Update Game Category  ****************************************
             $(document).on('click', '.game_status_disable_enable', function() {
             	var v = $( this ).find('a').attr( 'value' );
             	var i = $( this ).find('a').attr( 'row' );
             	var countTableRow = $( this ).find('a').attr( 'countTableRow' );

             	$.ajax(
                         {
                             url : "ajax_data/update_action.php",
                             type: "POST",
                             data : {id: i,value: v, tableRow: countTableRow, action: 'btn-game-update'},
                             success:function(data, textStatus, jqXHR)
                             {
                             	var item1 = $( ".game_restaurantStatus"+countTableRow );
                             	$( item1 ).html( data );
                             },
                             error: function(jqXHR, textStatus, errorThrown)
                             {
                                 //if fails     
                             }
                         });
             	
             });
             
             // *************************************** END Update Game Category  ****************************************
             
             // ***************************************  Edit Game  ****************************************
            
               $("#game-edit").dialog({
                  autoOpen: false,
                  title: "Edit Game",
                  modal: true,
                  width: "700",
                  buttons: [{
                      text: "Update",
                      click: function () {
                          $(this).find('form#validate-3').submit();
                      }
                  },{
                      text: "Close",
                      click: function () {
                          $(this).dialog("close");
                      }
                  }]
               });

               $(document).on('click', '.btn-game-edit', function() {
               	var value = $( this ).attr( 'value' );
               	$.ajax(
                  {
                      url : "ajax_data/edit_game.php",
                      type: "POST",
                      data : {id: value},
                      success:function(data, textStatus, jqXHR)
                      {
                      	$('.mws-dialog-inner-game-edit').html(data);
                      },
                      error: function(jqXHR, textStatus, errorThrown)
                      {
                          //if fails     
                      }
                  });
               	
               	$("#game-edit").dialog("option", {
                      modal: false
                  }).dialog("open");
                  //event.preventDefault();
               });

           //  ******************************************* END Edit Category ***********************************************    
             
          // ***************************************  Delete Category  ****************************************
             $(document).on('click', '.btn-delete-game', function() {
             	var value = $( this ).attr( 'value' );
             	$('.mws-dialog-inner-game-delete').css('display','block');
             	
                 $("#game-delete").dialog({
                     autoOpen: false,
                     title: "Delete Game",
                     modal: true,
                     width: "600",
                     buttons: [{
                         text: "Delete",
                         click: function () {
                         	$.ajax(
                             {
                                 url : "ajax_data/delete_action.php",
                                 type: "POST",
                                 data : {id: value, action: 'btn-game-delete'},
                                 success:function(data, textStatus, jqXHR)
                                 {
                              	  window.location ='manage_games.php';
                                 },
                                 error: function(jqXHR, textStatus, errorThrown)
                                 {
                                     //if fails     
                                 }
                             });
                         	$('.mws-dialog-inner-game-delete').css('display','none');
                         	$(this).dialog("close");
                         }
                     },{
                         text: "Cancel",
                         click: function () {
                         	$('.mws-dialog-inner-game-delete').css('display','none');
                             $(this).dialog("close");
                         }
                     }]
                 
                 }).dialog("open");
             	
                 
             });
             
             // ***************************************  END Delete Game  ****************************************

             
             
       // **##**##**##**##**##**##**##**##**##**## END Game Management   **##**##**##**##**##**##**##**##**##**##**##
             
       
       
 // **##**##**##**##**##**##**##**##**##**##  UNit Management   **##**##**##**##**##**##**##**##**##**##**##
       
       // Unit Datatable
       $(".datatable-unit").dataTable({
   		 "bProcessing": true,
   			"bServerSide": true,
   			"sAjaxSource": "gridmodel/unit_grid.php",
   			"aoColumnDefs": [
   			 				{ 'bSortable': false, 'aTargets': [0,3] }
   			 			],
   			"aoColumns": [
   			              null,
   			              null,
   			              null,
   			              {
   			                "mData": null,
   			                "sDefaultContent": "Action"
   			              }
   			            ],
   			  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
       		      // Bold the grade for all 'A' grade browsers
   				$('td:eq(0)', nRow).html( iDisplayIndex+1 );
   				//
   				$('td:eq(3)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[0]+'" title="Edit Unit" class="btn btn-s bs-tooltip btn-unit-edit"><i class="icon-edit"></i></a><a href="javascript:void(0);" value="'+aData[0]+'" title="Delete Unit" class="btn btn-s bs-tooltip btn-delete-unit"><i class="icon-trash"></i></a></span>');
   			  }
       });
       // ***************************************  Update Status UNit  ****************************************
       
       $(document).on('click', '.unit_status_disable_enable', function() {
       	var v = $( this ).find('a').attr( 'value' );
       	var i = $( this ).find('a').attr( 'row' );
       	var countTableRow = $( this ).find('a').attr( 'countTableRow' );

       	$.ajax(
                   {
                       url : "ajax_data/update_action.php",
                       type: "POST",
                       data : {id: i,value: v, tableRow: countTableRow, action: 'btn-unit-update'},
                       success:function(data, textStatus, jqXHR)
                       {
                       	var item1 = $( ".unit_restaurantStatus"+countTableRow );
                       	$( item1 ).html( data );
                       },
                       error: function(jqXHR, textStatus, errorThrown)
                       {
                           //if fails     
                       }
                   });
       	
       });
       
       // *************************************** END Update Status UNit  ****************************************
       
       
    // ***************************************  Edit UNit  ****************************************
       
       $("#unit-edit").dialog({
          autoOpen: false,
          title: "Edit Unit",
          modal: true,
          width: "700",
          buttons: [{
              text: "Update",
              click: function () {
                  $(this).find('form#validate-3').submit();
              }
          },{
              text: "Close",
              click: function () {
                  $(this).dialog("close");
              }
          }]
       });

       $(document).on('click', '.btn-unit-edit', function() {
       	var value = $( this ).attr( 'value' );
       	$.ajax(
          {
              url : "ajax_data/edit_unit.php",
              type: "POST",
              data : {id: value},
              success:function(data, textStatus, jqXHR)
              {
              	$('.mws-dialog-inner-unit-edit').html(data);
              },
              error: function(jqXHR, textStatus, errorThrown)
              {
                  //if fails     
              }
          });
       	
       	$("#unit-edit").dialog("option", {
              modal: false
          }).dialog("open");
          //event.preventDefault();
       });

   //  ******************************************* END Edit UNit ***********************************************    
     
  // ***************************************  Delete UNit  ****************************************
     $(document).on('click', '.btn-delete-unit', function() {
     	var value = $( this ).attr( 'value' );
     	$('.mws-dialog-inner-unit-delete').css('display','block');
     	
         $("#unit-delete").dialog({
             autoOpen: false,
             title: "Delete Unit",
             modal: true,
             width: "600",
             buttons: [{
                 text: "Delete",
                 click: function () {
                 	$.ajax(
                     {
                         url : "ajax_data/delete_action.php",
                         type: "POST",
                         data : {id: value, action: 'btn-unit-delete'},
                         success:function(data, textStatus, jqXHR)
                         {
                      	  window.location ='unit_setting.php';
                         },
                         error: function(jqXHR, textStatus, errorThrown)
                         {
                             //if fails     
                         }
                     });
                 	$('.mws-dialog-inner-unit-delete').css('display','none');
                 	$(this).dialog("close");
                 }
             },{
                 text: "Cancel",
                 click: function () {
                 	$('.mws-dialog-inner-unit-delete').css('display','none');
                     $(this).dialog("close");
                 }
             }]
         
         }).dialog("open");
     	
         
     });

 // **##**##**##**##**##**##**##**##**##**## END UNit Management   **##**##**##**##**##**##**##**##**##**##**##
     
   // **##**##**##**##**##**##**##**##**##**## Dish Management   **##**##**##**##**##**##**##**##**##**##**##
     // Dish Datatable
     $(".datatable-dish").dataTable({
 		 "bProcessing": true,
 			"bServerSide": true,
 			"sAjaxSource": "gridmodel/dish_grid.php",
 			"aoColumnDefs": [
 			 				{ 'bSortable': false, 'aTargets': [0,6], }
 			 			],
 			"aoColumns": [
 			              null,
 			              null,
 			              null,
 			              null,
 			              null,
 			              null,
 			              {
 			                "mData": null,
 			                "sDefaultContent": "Action"
 			              }
 			            ],
 			  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
     		      // Bold the grade for all 'A' grade browsers
 				$('td:eq(0)', nRow).html( iDisplayIndex+1 );
 				
 				$('td:eq(6)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[0]+'" title="Edit Dish" class="btn btn-s bs-tooltip btn-dish-edit"><i class="icon-edit"></i></a><a href="javascript:void(0);" value="'+aData[0]+'" title="Delete Dish" class="btn btn-s bs-tooltip btn-delete-dish"><i class="icon-trash"></i></a></span>');
 			  }
     });
     
     
  // ***************************************  Update Status Dish  ****************************************
     
     $(document).on('click', '.dish_status_disable_enable', function() {
     	var v = $( this ).find('a').attr( 'value' );
     	var i = $( this ).find('a').attr( 'row' );
     	var countTableRow = $( this ).find('a').attr( 'countTableRow' );

     	$.ajax(
                 {
                     url : "ajax_data/update_action.php",
                     type: "POST",
                     data : {id: i,value: v, tableRow: countTableRow, action: 'btn-dish-update'},
                     success:function(data, textStatus, jqXHR)
                     {
                     	var item1 = $( ".dish_restaurantStatus"+countTableRow );
                     	$( item1 ).html( data );
                     },
                     error: function(jqXHR, textStatus, errorThrown)
                     {
                         //if fails     
                     }
                 });
     	
     });
     
     // *************************************** END Update Status Dish  ****************************************
     
     // ***************************************  Edit Dish  ****************************************
     
     $("#dish-edit").dialog({
        autoOpen: false,
        title: "Edit Dish",
        modal: true,
        width: "700",
        buttons: [{
            text: "Update",
            click: function () {
                $(this).find('form#validate-3').submit();
            }
        },{
            text: "Close",
            click: function () {
                $(this).dialog("close");
            }
        }]
     });

     $(document).on('click', '.btn-dish-edit', function() {
     	var value = $( this ).attr( 'value' );
     	$.ajax(
        {
            url : "ajax_data/edit_dish.php",
            type: "POST",
            data : {id: value},
            success:function(data, textStatus, jqXHR)
            {
            	$('.mws-dialog-inner-dish-edit').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                //if fails     
            }
        });
     	
     	$("#dish-edit").dialog("option", {
            modal: false
        }).dialog("open");
        //event.preventDefault();
     });

 //  ******************************************* END Edit Dish ***********************************************    
   
// ***************************************  Delete Dish  ****************************************
   $(document).on('click', '.btn-delete-dish', function() {
   	var value = $( this ).attr( 'value' );
   	$('.mws-dialog-inner-dish-delete').css('display','block');
   	
       $("#dish-delete").dialog({
           autoOpen: false,
           title: "Delete Dish",
           modal: true,
           width: "600",
           buttons: [{
               text: "Delete",
               click: function () {
               	$.ajax(
                   {
                       url : "ajax_data/delete_action.php",
                       type: "POST",
                       data : {id: value, action: 'btn-dish-delete'},
                       success:function(data, textStatus, jqXHR)
                       {
                    	  window.location ='manage_dishes.php';
                       },
                       error: function(jqXHR, textStatus, errorThrown)
                       {
                           //if fails     
                       }
                   });
               	$('.mws-dialog-inner-dish-delete').css('display','none');
               	$(this).dialog("close");
               }
           },{
               text: "Cancel",
               click: function () {
               	$('.mws-dialog-inner-dish-delete').css('display','none');
                   $(this).dialog("close");
               }
           }]
       
       }).dialog("open");
   });

   // **##**##**##**##**##**##**##**##**##**## END Dish Management   **##**##**##**##**##**##**##**##**##**##**##
   
   // **##**##**##**##**##**##**##**##**##**## Ingredient Management   **##**##**##**##**##**##**##**##**##**##**##
   // Ingredient Datatable
   $(".datatable-ingredient").dataTable({
		 "bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "gridmodel/ingredient_grid.php",
			"aoColumnDefs": [
			 				{ 'bSortable': false, 'aTargets': [0,4], }
			 			],
			"aoColumns": [
			              null,
			              null,
			              null,
			              null,
			              {
			                "mData": null,
			                "sDefaultContent": "Action"
			              }
			            ],
			  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
   		      // Bold the grade for all 'A' grade browsers
				$('td:eq(0)', nRow).html( iDisplayIndex+1 );
				$('td:eq(4)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[0]+'" title="Edit Ingredient" class="btn btn-s bs-tooltip btn-ingredient-edit"><i class="icon-edit"></i></a><a href="javascript:void(0);" value="'+aData[0]+'" title="Delete Ingredient" class="btn btn-s bs-tooltip btn-delete-ingredient"><i class="icon-trash"></i></a></span>');
			  }
   });
   
   
// ***************************************  Update Status Ingredient  ****************************************
   
   $(document).on('click', '.ingredient_status_disable_enable', function() {
   	var v = $( this ).find('a').attr( 'value' );
   	var i = $( this ).find('a').attr( 'row' );
   	var countTableRow = $( this ).find('a').attr( 'countTableRow' );

   	$.ajax(
               {
                   url : "ajax_data/update_action.php",
                   type: "POST",
                   data : {id: i,value: v, tableRow: countTableRow, action: 'btn-ingredient-update'},
                   success:function(data, textStatus, jqXHR)
                   {
                   	var item1 = $( ".ingredient_restaurantStatus"+countTableRow );
                   	$( item1 ).html( data );
                   },
                   error: function(jqXHR, textStatus, errorThrown)
                   {
                       //if fails     
                   }
               });
   	
   });
   
   // *************************************** END Update Status Ingredient  ****************************************
   
   // ***************************************  Edit Ingredient  ****************************************
   
   $("#ingredient-edit").dialog({
      autoOpen: false,
      title: "Edit Ingredient",
      modal: true,
      width: "700",
      buttons: [{
          text: "Update",
          click: function () {
              $(this).find('form#validate-3').submit();
          }
      },{
          text: "Close",
          click: function () {
              $(this).dialog("close");
          }
      }]
   });

   $(document).on('click', '.btn-ingredient-edit', function() {
   	var value = $( this ).attr( 'value' );
   	$.ajax(
      {
          url : "ajax_data/edit_ingredient.php",
          type: "POST",
          data : {id: value},
          success:function(data, textStatus, jqXHR)
          {
          	$('.mws-dialog-inner-ingredient-edit').html(data);
          },
          error: function(jqXHR, textStatus, errorThrown)
          {
              //if fails     
          }
      });
   	
   	$("#ingredient-edit").dialog("option", {
          modal: false
      }).dialog("open");
      //event.preventDefault();
   });

//  ******************************************* END Edit Ingredient ***********************************************    
 
//***************************************  Delete Ingredient  ****************************************
 $(document).on('click', '.btn-delete-ingredient', function() {
 	var value = $( this ).attr( 'value' );
 	$('.mws-dialog-inner-ingredient-delete').css('display','block');
 	
     $("#ingredient-delete").dialog({
         autoOpen: false,
         title: "Delete Ingredient",
         modal: true,
         width: "600",
         buttons: [{
             text: "Delete",
             click: function () {
             	$.ajax(
                 {
                     url : "ajax_data/delete_action.php",
                     type: "POST",
                     data : {id: value, action: 'btn-ingredient-delete'},
                     success:function(data, textStatus, jqXHR)
                     {
                  	  window.location ='manage_ingredients.php';
                     },
                     error: function(jqXHR, textStatus, errorThrown)
                     {
                         //if fails     
                     }
                 });
             	$('.mws-dialog-inner-ingredient-delete').css('display','none');
             	$(this).dialog("close");
             }
         },{
             text: "Cancel",
             click: function () {
             	$('.mws-dialog-inner-ingredient-delete').css('display','none');
                 $(this).dialog("close");
             }
         }]
     
     }).dialog("open");
 });
   // **##**##**##**##**##**##**##**##**##**## END Ingredient Management   **##**##**##**##**##**##**##**##**##**##**##
 
 // **##**##**##**##**##**##**##**##**##**##  TableQr Management   **##**##**##**##**##**##**##**##**##**##**##
//TableQr Datatable
 $(".datatable-tableqr").dataTable({
		 "bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "gridmodel/table_grid.php",
			"aoColumnDefs": [
			 				{ 'bSortable': false, 'aTargets': [0,3], }
			 			],
			"aoColumns": [
			              null,
			              null,
			              null,
			              {
			                "mData": null,
			                "sDefaultContent": "Action"
			              }
			            ],
			  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
 		      // Bold the grade for all 'A' grade browsers
				$('td:eq(3)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[3]+'" title="Delete Table" class="btn btn-s bs-tooltip btn-delete-table"><i class="icon-trash"></i></a></span>');
			  }
 });
 
//***************************************  Delete Table  ****************************************
 $(document).on('click', '.btn-delete-table', function() {
 	var value = $( this ).attr( 'value' );
 	$('.mws-dialog-inner-table-delete').css('display','block');
 	
     $("#table-delete").dialog({
         autoOpen: false,
         title: "Delete Table",
         modal: true,
         width: "600",
         buttons: [{
             text: "Delete",
             click: function () {
             	$.ajax(
                 {
                     url : "ajax_data/delete_action.php",
                     type: "POST",
                     data : {id: value, action: 'btn-table-delete'},
                     success:function(data, textStatus, jqXHR)
                     {
                  	  window.location ='table_setting.php';
                     },
                     error: function(jqXHR, textStatus, errorThrown)
                     {
                         //if fails     
                     }
                 });
             	$('.mws-dialog-inner-table-delete').css('display','none');
             	$(this).dialog("close");
             }
         },{
             text: "Cancel",
             click: function () {
             	$('.mws-dialog-inner-table-delete').css('display','none');
                 $(this).dialog("close");
             }
         }]
     
     }).dialog("open");
 });
 
 //**##**##**##**##**##**##**##**##**##**##  END TableQr Management   **##**##**##**##**##**##**##**##**##**##**##

 
 //**##**##**##**##**##**##**##**##**##**##   Notification Management   **##**##**##**##**##**##**##**##**##**##**##
 	//Notification Datatable
 $(".datatable-notification").dataTable({
		 "bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "gridmodel/notification_grid.php",
			"aoColumnDefs": [
			 				{ 'bSortable': false, 'aTargets': [0,4], }
			 			],
			"aoColumns": [
			              null,
			              null,
			              null,
			              null,
			              null,
			              null,
			              {
			                "mData": null,
			                "sDefaultContent": "Action"
			              }
			            ],
			  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
 		      // Bold the grade for all 'A' grade browsers
				$('td:eq(0)', nRow).html( iDisplayIndex+1 );
				$('td:eq(6)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[0]+'" title="Edit Notification" class="btn btn-s bs-tooltip btn-notification-edit"><i class="icon-edit"></i></a><a href="javascript:void(0);" value="'+aData[0]+'" title="Delete Notification" class="btn btn-s bs-tooltip btn-delete-notification"><i class="icon-trash"></i></a></span>');
			  }
 });
 
 
//***************************************  Update Status Notification  ****************************************
 
 $(document).on('click', '.notification_status_disable_enable', function() {
 	var v = $( this ).find('a').attr( 'value' );
 	var i = $( this ).find('a').attr( 'row' );
 	var countTableRow = $( this ).find('a').attr( 'countTableRow' );

 	$.ajax(
             {
                 url : "ajax_data/update_action.php",
                 type: "POST",
                 data : {id: i,value: v, tableRow: countTableRow, action: 'btn-notification-update'},
                 success:function(data, textStatus, jqXHR)
                 {
                 	var item1 = $( ".notification_restaurantStatus"+countTableRow );
                 	$( item1 ).html( data );
                 },
                 error: function(jqXHR, textStatus, errorThrown)
                 {
                     //if fails     
                 }
             });
 	
 });
 
 // *************************************** END Update Status Notification  ****************************************

 // ***************************************  Edit Notification  ****************************************
 
 $("#notification-edit").dialog({
    autoOpen: false,
    title: "Edit Notification",
    modal: true,
    width: "700",
    buttons: [{
        text: "Update",
        click: function () {
            $(this).find('form#validate-3').submit();
        }
    },{
        text: "Close",
        click: function () {
            $(this).dialog("close");
        }
    }]
 });

 $(document).on('click', '.btn-notification-edit', function() {
 	var value = $( this ).attr( 'value' );
 	$.ajax(
    {
        url : "ajax_data/edit_notification.php",
        type: "POST",
        data : {id: value},
        success:function(data, textStatus, jqXHR)
        {
        	$('.mws-dialog-inner-notification-edit').html(data);
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            //if fails     
        }
    });
 	
 	$("#notification-edit").dialog("option", {
        modal: false
    }).dialog("open");
    //event.preventDefault();
 });

//******************************************* END Edit Notification ***********************************************    

//***************************************  Delete Notification  ****************************************
$(document).on('click', '.btn-delete-notification', function() {
	var value = $( this ).attr( 'value' );
	$('.mws-dialog-inner-notification-delete').css('display','block');
	
   $("#notification-delete").dialog({
       autoOpen: false,
       title: "Delete Notification",
       modal: true,
       width: "600",
       buttons: [{
           text: "Delete",
           click: function () {
           	$.ajax(
               {
                   url : "ajax_data/delete_action.php",
                   type: "POST",
                   data : {id: value, action: 'btn-notification-delete'},
                   success:function(data, textStatus, jqXHR)
                   {
                	  window.location ='manage_notifications.php';
                   },
                   error: function(jqXHR, textStatus, errorThrown)
                   {
                       //if fails     
                   }
               });
           	$('.mws-dialog-inner-notification-delete').css('display','none');
           	$(this).dialog("close");
           }
       },{
           text: "Cancel",
           click: function () {
           	$('.mws-dialog-inner-notification-delete').css('display','none');
               $(this).dialog("close");
           }
       }]
   
   }).dialog("open");
});
 
//**##**##**##**##**##**##**##**##**##**##  END Notification Management   **##**##**##**##**##**##**##**##**##**##**##
    
// **##**##**##**##**##**##**##**##**##**## new Order Management   **##**##**##**##**##**##**##**##**##**##**##
// new order Datatable
$(".datatable-new-order").dataTable({
	 "bProcessing": true,
		"bServerSide": true,
		"iDisplayLength": 10,
		"sAjaxSource": "gridmodel/new_order_grid.php",
		"aoColumnDefs": [
		 				{ 'bSortable': false, 'aTargets': [0,5], }
		 			],
		"aoColumns": [
		              null,
		              null,
		              null,
		              null,
		              null,
		              {
		                "mData": null,
		                "sDefaultContent": "Action"
		              }
		            ],
		  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
		      // Bold the grade for all 'A' grade browsers
			$('td:eq(5)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[0]+'" title="View Order Details" class="btn btn-s bs-tooltip btn-new-order-view"><i class="icon-eye-open "></i></a></span>');
		  }
});

//confirm order Datatable
$(".datatable-confirm-order").dataTable({
	 "bProcessing": true,
		"bServerSide": true,
		"iDisplayLength": 10,
		"sAjaxSource": "gridmodel/confirm_order_grid.php",
		"aoColumnDefs": [
		 				{ 'bSortable': false, 'aTargets': [0,5], }
		 			],
		"aoColumns": [
		              null,
		              null,
		              null,
		              null,
		              null,
		              {
		                "mData": null,
		                "sDefaultContent": "Action"
		              }
		            ],
		  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
		      // Bold the grade for all 'A' grade browsers
			$('td:eq(5)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[0]+'" title="View Order Details" class="btn btn-s bs-tooltip btn-confirm-order-view"><i class="icon-eye-open "></i></a></span>');
		  }
});


//history order Datatable
$(".datatable-all-order").dataTable({
	 "bProcessing": true,
		"bServerSide": true,
		"iDisplayLength": 10,
		"sAjaxSource": "gridmodel/all_order_grid.php",
		"aoColumnDefs": [
		 				{ 'bSortable': false, 'aTargets': [0,5], }
		 			],
		"aoColumns": [
		              null,
		              null,
		              null,
		              null,
		              null,
		              {
		                "mData": null,
		                "sDefaultContent": "Action"
		              }
		            ],
		  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
		      // Bold the grade for all 'A' grade browsers
			$('td:eq(5)', nRow).html( '<span class="btn-group"><a href="javascript:void(0);" value="'+aData[0]+'" title="View Order Details" class="btn btn-s bs-tooltip btn-all-order-view"><i class="icon-eye-open "></i></a></span>');
		  }
});

//***************************************  View new Order  ****************************************
$(document).on('click', '.btn-new-order-view', function() {
	var value = $( this ).attr( 'value' );
	window.location = 'manage_orders.php?order='+value+'#orderview';
});
//***************************************  end view new order  ****************************************

//***************************************  View confirm Order  ****************************************
$(document).on('click', '.btn-confirm-order-view', function() {
	var value = $( this ).attr( 'value' );
	window.location = 'confirm_orders.php?order='+value+'#orderview';
});
//***************************************  end view confirm order  ****************************************

//***************************************  View confirm Order  ****************************************
$(document).on('click', '.btn-all-order-view', function() {
	var value = $( this ).attr( 'value' );
	window.location = 'history_orders.php?order='+value+'#orderview';
});
//***************************************  end view confirm order  ****************************************

// **##**##**##**##**##**##**##**##**##**## END New Order Management   **##**##**##**##**##**##**##**##**##**##**##
 
    
    // ------------------------------------ END Resturant Admin Panel -------------------------------------
 // ------------------------------------------------------------------------------------------------   

    
    $(".ui-dialog-buttonset :button").removeClass("ui-state-default");
    	
    
    
  //++==++==++==++==++==++==++==++==      					++==++==++==++==++==++==++==++==
	//++==++==++==++==++==++==++==++==      not related to us	++==++==++==++==++==++==++==++==           
	//++==++==++==++==++==++==++==++==      					++==++==++==++==++==++==++==++==
    
    
    
	//===== Date Pickers & Time Pickers & Color Pickers =====//
	$( ".datepicker" ).datepicker({
		defaultDate: +7,
		showOtherMonths:true,
		autoSize: true,
		appendText: '<span class="help-block">(yyyy-mm-dd)</span>',
		dateFormat: 'yy-mm-dd',
		minDate: 0
		});
	
	
	//===== Notifications =====//
	
	// @see: for default options, see assets/js/plugins.js (initNoty())

	$('.btn-notification').click(function() {
		var self = $(this);

		noty({
			text: self.data('text'),
			type: self.data('type'),
			layout: self.data('layout'),
			timeout: 2000,
			modal: self.data('modal'),
			buttons: (self.data('type') != 'confirm') ? false : [
				{
					addClass: 'btn btn-primary', text: 'Ok', onClick: function($noty) {
						$noty.close();
						noty({force: true, text: 'You clicked "Ok" button', type: 'success', layout: self.data('layout')});
					}
				}, {
					addClass: 'btn btn-danger', text: 'Cancel', onClick: function($noty) {
						$noty.close();
						noty({force: true, text: 'You clicked "Cancel" button', type: 'error', layout: self.data('layout')});
					}
				}
			]
		});

		return false;
	});

	
	//===== Slim Progress Bars (nprogress) =====//
	$('.btn-nprogress-start').click(function () {
		NProgress.start();
		$('#nprogress-info-msg').slideDown(200);
	});

	$('.btn-nprogress-set-40').click(function () {
		NProgress.set(0.4);
	});

	$('.btn-nprogress-inc').click(function () {
		NProgress.inc();
	});

	$('.btn-nprogress-done').click(function () {
		NProgress.done();
		$('#nprogress-info-msg').slideUp(200);
	});

	//===== Bootbox (Modals and Dialogs) =====//
	$("a.basic-alert").click(function(e) {
		e.preventDefault();
		bootbox.alert("Hello world!", function() {
			console.log("Alert Callback");
		});
	});

	$("a.confirm-dialog").click(function(e) {
		e.preventDefault();
		bootbox.confirm("Are you sure?", function(confirmed) {
			console.log("Confirmed: "+confirmed);
		});
	});

	$("a.multiple-buttons").click(function(e) {
		e.preventDefault();
		bootbox.dialog({
			message: "I am a custom dialog",
			title: "Custom title",
			buttons: {
				success: {
					label: "Success!",
					className: "btn-success",
					callback: function() {
						console.log("great success");
					}
				},
				danger: {
					label: "Danger!",
					className: "btn-danger",
					callback: function() {
						console.log("uh oh, look out!");
					}
				},
				main: {
					label: "Click ME!",
					className: "btn-primary",
					callback: function() {
						console.log("Primary button");
					}
				}
			}
		});
	});

	$("a.multiple-dialogs").click(function(e) {
		e.preventDefault();

		bootbox.alert("Prepare for multiboxes in 1 second...");

		setTimeout(function() {
			bootbox.dialog({
				message: "Do you like Melon?",
				title: "Fancy Title",
				buttons: {
					danger: {
						label: "No :-(",
						className: "btn-danger",
						callback: function() {
							bootbox.alert("Aww boo. Click the button below to get rid of all these popups.", function() {
								bootbox.hideAll();
							});
						}
					},
					success: {
						label: "Oh yeah!",
						className: "btn-success",
						callback: function() {
							bootbox.alert("Glad to hear it! Click the button below to get rid of all these popups.", function() {
								bootbox.hideAll();
							});
						}
					}
				}
			});
		}, 1000);
	});

	$("a.programmatic-close").click(function(e) {
		e.preventDefault();
		var box = bootbox.alert("This dialog will automatically close in two seconds...");
		setTimeout(function() {
			box.modal('hide');
		}, 2000);
	});

});


//***************************************  Order Update  ****************************************
function UpdateOrder(orderID, status, url){
	var value = orderID;
	var order_status = status;
	
 	$.ajax(
          {
              url : "ajax_data/update_order_status.php",
              type: "POST",
              data : {id: value, status: order_status},
              success:function(data, textStatus, jqXHR)
              {
           	  window.location = url;
              },
              error: function(jqXHR, textStatus, errorThrown)
              {
                  //if fails     
              }
          });
}
//***************************************  end order Update  ****************************************

//***************************************  Remove call  ****************************************
function RemoveCall(callID){
	var value = callID;
	
 	$.ajax(
          {
              url : "ajax_data/remove_call.php",
              type: "POST",
              data : {id: value},
              success:function(data, textStatus, jqXHR)
              {
           	  window.location = 'waiter_calls.php';
              },
              error: function(jqXHR, textStatus, errorThrown)
              {
                  //if fails     
              }
          });
}
//***************************************  end remove call  ****************************************
//reservation Update 
function UpdateReservation(reservationID, status, url){
	var value = reservationID;
	var order_status = status;
	
 	$.ajax(
          {
              url : "ajax_data/update_reservation_status.php",
              type: "POST",
              data : {id: value, status: order_status},
              success:function(data, textStatus, jqXHR)
              {
           	  window.location = url;
              },
              error: function(jqXHR, textStatus, errorThrown)
              {
                  //if fails     
              }
          });
}
// end reservation Update 
