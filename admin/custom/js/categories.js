var manageCategoriesTable; 

$(document).ready(function() {
	// top nav bar 
	$('#navCategories').addClass('active');
	// manage categories data table
	manageCategoriesTable = $('#manageCategoriesTable').DataTable({
		'ajax': 'actions/fetchCategories.php',
		'order': []
	});

	// add categories modal btn clicked
	$("#addCategoriesModalBtn").unbind('click').bind('click', function() {
		// // categories form reset
		$("#submitCategoriesForm")[0].reset();		

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		$("#categoriesImage").fileinput({
	      overwriteInitial: true,
		    maxFileSize: 2500,
		    showClose: false,
		    showCaption: false,
		    browseLabel: '',
		    removeLabel: '',
		    browseIcon: '<i class="fa fa-file"></i>',
		    removeIcon: '<i class="fa fa-remove"></i>',
		    removeTitle: 'Cancel or reset changes',
		    elErrorContainer: '#kv-avatar-errors-1',
		    msgErrorClass: 'alert alert-block alert-danger',
		    defaultPreviewContent: '<img src="assets/images/photo_default.png" alt="Profile Image" style="width:100%;">',
		    layoutTemplates: {main2: '{preview} {remove} {browse}'},								    
	  		allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
			});   

		// submit categories form
		$("#submitCategoriesForm").unbind('submit').bind('submit', function() {

			// form validation
			var categoriesImage = $("#categoriesImage").val();
			var categoriesName = $("#categoriesName").val();
			var categoriesStatus = $("#categoriesStatus").val();
	
			if(categoriesImage == "") {
				$("#categoriesImage").closest('.center-block').after('<p class="text-danger">Categories Image field is required</p>');
				$('#categoriesImage').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#categoriesImage").find('.text-danger').remove();
				// success out for form 
				$("#categoriesImage").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(categoriesName == "") {
				$("#categoriesName").after('<p class="text-danger">Categories Name field is required</p>');
				$('#categoriesName').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#categoriesName").find('.text-danger').remove();
				// success out for form 
				$("#categoriesName").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(categoriesStatus == "") {
				$("#categoriesStatus").after('<p class="text-danger">Categories Status field is required</p>');
				$('#categoriesStatus').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#categoriesStatus").find('.text-danger').remove();
				// success out for form 
				$("#categoriesStatus").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(categoriesImage && categoriesName && categoriesStatus) {
				// submit loading button
				$("#addCategoriesBtn").button('loading');

				var form = $(this);
				var formData = new FormData(this);

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					success:function(response) {

						if(response.success == true) {
							// submit loading button
							$("#addCategoriesBtn").button('reset');
							
							$("#submitCategoriesForm")[0].reset();

							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																	
							// shows a successful message after operation
							$('#add-categories-messages').html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i><end of  atrong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert

		          // reload the manage student table
							manageCategoriesTable.ajax.reload(null, true);

							// remove text-error 
							$(".text-danger").remove();
							// remove from-group error
							$(".form-group").removeClass('has-error').removeClass('has-success');

						} // /if response.success
						
					} // end of  auccess function
				}); // end of  ajax function
			}	 // /if validation is ok 					

			return false;
		}); // end of  aubmit categories form

	}); // end of  add categories modal btn clicked
	

	// remove categories 	

}); // document.ready function

function editCategories(categoriesId = null) {

	if(categoriesId) {
		$("#categoriesId").remove();		
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		// modal spinner
		$('.div-loading').removeClass('div-hide');
		// modal div
		$('.div-result').addClass('div-hide');

		$.ajax({
			url: 'actions/fetchSelectedCategories.php',
			type: 'post',
			data: {categoriesId: categoriesId},
			dataType: 'json',
			success:function(response) {		
			// alert(response.categories_image);
				// modal spinner
				$('.div-loading').addClass('div-hide');
				// modal div
				$('.div-result').removeClass('div-hide');				

				$("#getCategoriesImage").attr('src', 'assets/images/cat/'+response.categories_image);
 
				$("#editCategoriesImage").fileinput({		      
				});  

				// $("#editcategoriesImage").fileinput({
		  //     overwriteInitial: true,
			 //    maxFileSize: 2500,
			 //    showClose: false,
			 //    showCaption: false,
			 //    browseLabel: '',
			 //    removeLabel: '',
			 //    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
			 //    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
			 //    removeTitle: 'Cancel or reset changes',
			 //    elErrorContainer: '#kv-avatar-errors-1',
			 //    msgErrorClass: 'alert alert-block alert-danger',
			 //    defaultPreviewContent: '<img src="stock/'+response.categories_image+'" alt="Profile Image" style="width:100%;">',
			 //    layoutTemplates: {main2: '{preview} {remove} {browse}'},								    
		  // 		allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
				// });  

				// categories id 
				$(".editCategoriesFooter").append('<input type="hidden" name="categoriesId" id="categoriesId" value="'+response.categories_id+'" />');				
				$(".editCategoriesPhotoFooter").append('<input type="hidden" name="categoriesId" id="categoriesId" value="'+response.categories_id+'" />');				
				
				// categories name
				$("#editCategoriesName").val(response.categories_name);
				// categories description

				// status
				$("#editCategoriesStatus").val(response.categories_active);

				// update the categories data function
				$("#editCategoriesForm").unbind('submit').bind('submit', function() {

					// form validation
					var categoriesImage = $("#editCategoriesImage").val();
					var categoriesName = $("#editCategoriesName").val();
					var categoriesStatus = $("#editCategoriesStatus").val();
								

					if(categoriesName == "") {
						$("#editCategoriesName").after('<p class="text-danger">Categories Name field is required</p>');
						$('#editCategoriesName').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editCategoriesName").find('.text-danger').remove();
						// success out for form 
						$("#editCategoriesName").closest('.form-group').addClass('has-success');	  	
					}	// /else

			
					if(categoriesStatus == "") {
						$("#editCategoriesStatus").after('<p class="text-danger">Categories Status field is required</p>');
						$('#editCategoriesStatus').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editCategoriesStatus").find('.text-danger').remove();
						// success out for form 
						$("#editCategoriesStatus").closest('.form-group').addClass('has-success');	  	
					}	// /else					

					if(categoriesName && categoriesStatus) {
						// submit loading button
						$("#editCategoriesBtn").button('loading');

						var form = $(this);
						var formData = new FormData(this);

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: formData,
							dataType: 'json',
							cache: false,
							contentType: false,
							processData: false,
							success:function(response) {
								console.log(response);
								if(response.success == true) {
									// submit loading button
									$("#editCategoriesBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
									$('#edit-categories-messages').html('<div class="alert alert-success">'+
				            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				            '<strong><i class="glyphicon glyphicon-ok-sign"></i><end of  atrong> '+ response.messages +
				          '</div>');

									// remove the mesages
				          $(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

				          // reload the manage student table
									manageCategoriesTable.ajax.reload(null, true);

									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');

								} // /if response.success
								
							} // end of  auccess function
						}); // end of  ajax function
					}	 // /if validation is ok 					

					return false;
				}); // update the categories data function

				// update the categories image				
				$("#updateCategoriesImageForm").unbind('submit').bind('submit', function() {					
					// form validation
					var categoriesImage = $("#editCategoriesImage").val();					
					
					if(categoriesImage == "") {
						$("#editCategoriesImage").closest('.center-block').after('<p class="text-danger">Categories Image field is required</p>');
						$('#editCategoriesImage').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editCategoriesImage").find('.text-danger').remove();
						// success out for form 
						$("#editCategoriesImage").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(categoriesImage) {
						// submit loading button
						$("#editCategoriesImageBtn").button('loading');

						var form = $(this);
						var formData = new FormData(this);

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: formData,
							dataType: 'json',
							cache: false,
							contentType: false,
							processData: false,
							success:function(response) {
								
								if(response.success == true) {
									// submit loading button
									$("#editCategoriesImageBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
									$('#edit-categoriesPhoto-messages').html('<div class="alert alert-success">'+
				            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				            '<strong><i class="glyphicon glyphicon-ok-sign"></i><end of  atrong> '+ response.messages +
				          '</div>');

									// remove the mesages
				          $(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

				          // reload the manage student table
									manageCategoriesTable.ajax.reload(null, true);

									$(".fileinput-remove-button").click();

									$.ajax({
										url: 'actions/fetchCategoriesImageUrl.php?i='+categoriesId,
										type: 'post',
										success:function(response) {
										$("#getCategoriesImage").attr('src', response);		
										}
									});																		

									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');

								} // /if response.success
								
							} // end of  auccess function
						}); // end of  ajax function
					}	 // /if validation is ok 					

					return false;
				}); // /update the categories image

			} // end of  auccess function
		}); // end of  ajax to fetch categories image

				
	} else {
		alert('error please refresh the page');
	}
} // /edit categories function


// remove categories function
function removeCategories(categoriesId = null) {
		
	$.ajax({
		url: 'actions/fetchSelectedCategories.php',
		type: 'post',
		data: {categoriesId: categoriesId},
		dataType: 'json',
		success:function(response) {			

			// remove categories btn clicked to remove the categories function
			$("#removeCategoriesBtn").unbind('click').bind('click', function() {
				// remove categories btn
				$("#removeCategoriesBtn").button('loading');

				$.ajax({
					url: 'actions/removeCategories.php',
					type: 'post',
					data: {categoriesId: categoriesId},
					dataType: 'json',
					success:function(response) {
						if(response.success == true) {
 							// remove categories btn
							$("#removeCategoriesBtn").button('reset');
							// close the modal 
							$("#removeCategoriesModal").modal('hide');
							// update the manage categories table
							manageCategoriesTable.ajax.reload(null, false);
							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i><end of strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} else {
 							// close the modal 
							$("#removeCategoriesModal").modal('hide');

 							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i><end of strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} // /else
						
						
					} // end of success function
				}); // end of ajax function request server to remove the categories data
			}); // /remove categories btn clicked to remove the categories function

		} // /response
	}); // end of ajax function to fetch the categories data
} // remove categories function 



