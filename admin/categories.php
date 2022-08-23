<?php require_once 'includes/header.php';
      require_once 'includes/navbar.php';
?>


<div class="row">
	<div class="col-md-12"> 

		<div class="panel panel-table">
			<div class="panel-heading">
				<div class="page-heading"><i class="fa fa-list panelhead"> </i> Categories</div>
			</div> <!--end of panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-info button1" data-toggle="modal" id="addCategoriesModalBtn" data-target="#addCategoriesModal"> <i class="fa fa-plus"></i> Add Categories </button>
				</div> <!--end of div-action -->				
				
				<table class="table" id="manageCategoriesTable">
					<thead>
						<tr>
							<th style="width:10%;">Photo</th>								
							<th>Categories Name</th>
							<th>Status</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!--end of table -->

			</div> <!--end of panel-body -->
		</div> <!--end of panel -->		
	</div> <!--end of col-md-12 -->
</div> <!--end of row -->

<!------------------------------------------------MODAL-------------------------------------------->
<!-- add Categories -->
<div class="modal fade" id="addCategoriesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
 		

    	<form class="form-horizontal" id="submitCategoriesForm" action="actions/addCategories.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Categories</h4>
	      </div>

	     <div class="modal-body" style="max-height:450px; overflow:auto;">

	    <div id="add-categories-messages"></div>

	      	<div class="form-group">
	        	<label for="categoriesImage" class="col-sm-3 control-label">Categories Image </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
					    <!-- the avatar markup -->
							<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
					    <div class="kv-avatar center-block">					        
					        <input type="file" class="form-control" id="categoriesImage" placeholder="Categories Name" name="categoriesImage" class="file-loading" style="width:auto;"/>
					    </div>
				      
				    </div>
	        </div> <!--end of form-group-->	     	           	       

	        <div class="form-group">
	        	<label for="categoriesName" class="col-sm-3 control-label">Categories Name </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="categoriesName" placeholder="Categories Name" name="categoriesName" autocomplete="off">
				    </div>
	        </div> <!--end of form-group-->	 
					        	         	       

	        <div class="form-group">
	        	<label for="categoriesStatus" class="col-sm-3 control-label">Status </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="categoriesStatus" name="categoriesStatus">
				      	<option value="">Select Status</option>
						  <option value="1">Available</option>
				      	<option value="2">Not Available</option>
				      </select>
				    </div>
	        </div> <!--end of form-group-->	         	        
	      </div> <!--end of modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fas-delete"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="addCategoriesBtn" data-loading-text="Loading..." autocomplete="off"> <i class="fa fas-check"></i> Save Changes</button>
	      </div> <!--end of modal-footer -->	      
     	</form> <!--end of .form -->	     
    </div> <!--end of modal-content -->    
  </div> <!--end of modal-dailog -->
</div> 
<!-- end of add Categories -->


<!-- edit Categories -->
<div class="modal fade" id="editCategoriesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Categories</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
	      	</div>

	      	<div class="div-result">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#photo" aria-controls="home" role="tab" data-toggle="tab">Photo</a></li>
				    <li role="presentation"><a href="#categoriesInfo" aria-controls="profile" role="tab" data-toggle="tab">Categories Info</a></li>    
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">

				  	
				    <div role="tabpanel" class="tab-pane active" id="photo">
				    	<form action="actions/editCategoriesImage.php" method="POST" id="updateCategoriesImageForm" class="form-horizontal" enctype="multipart/form-data">

				    
				    	<div id="edit-categoriesPhoto-messages"></div>

				    	<div class="form-group">
			        	<label for="editCategoriesImage" class="col-sm-3 control-label">Categories Image </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">							    				   
						      <img src="../assets/images/cat/" id="getCategoriesImage" class="thumbnail" style="width:200px; height:200px;"end of >
						    </div>
			        </div> <!--end of form-group-->	     	           	       
				    	
			      	<div class="form-group">
			        	<label for="editCategoriesImage" class="col-sm-3 control-label">Select Photo </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
							    <!-- the avatar markup -->
									<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
							    <div class="kv-avatar center-block">					        
							        <input type="file" class="form-control" id="editCategoriesImage" placeholder="Categories Name" name="editCategoriesImage" class="file-loading" style="width:auto;"/>
							    </div>
						      
						    </div>
			        </div> <!--end of form-group-->	     	           	       

			        <div class="modal-footer editCategoriesPhotoFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fas-close"></i> Close</button>
				        
				        <!-- <button type="submit" class="btn btn-success" id="editcategoriesImageBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button> -->
				      </div>
				      <!--end of modal-footer -->
				      </form>
				      <!--end of form -->
				    </div>
				    <!-- categories image -->
				    <div role="tabpanel" class="tab-pane" id="categoriesInfo">
				    	<form class="form-horizontal" id="editCategoriesForm" action="actions/editCategories.php" method="POST">				    
				    

				    	<div id="edit-categories-messages"></div>

				    	<div class="form-group">
			        	<label for="editCategoriesName" class="col-sm-3 control-label">Categories Name </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editCategoriesName" placeholder="Categories Name" name="editCategoriestName" autocomplete="off">
						    </div>
			        </div> <!--end of form-group-->	  
					<div class="form-group">
		        	<label for="editCategoriesStatus" class="col-sm-4 control-label">Status: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-7">
					      <select class="form-control" id="editCategoriesStatus" name="editCategoriesStatus">
						  <option value="">Select Status</option>
				      	<option value="1">Available</option>
				      	<option value="2">Not Available</option>
					      </select>
					    </div>
		       		</div> <!--end of form-group-->	 
					        

			        <div class="modal-footer editCategoriesFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fas-close"></i> Close</button>
				        
				        <button type="submit" class="btn btn-success" id="editCategoriesBtn" data-loading-text="Loading..."> <i class="fa fas-check"></i> Save Changes</button>
				      </div> <!--end of modal-footer -->				     
			        </form> <!--end of .form -->				     	
				    </div>    
				    <!--end of categories info -->
				  </div>

				</div>
	      	
	      </div> <!--end of modal-body -->
	      	      
     	
    </div>
    <!--end of modal-content -->
  </div>
  <!--end of modal-dailog -->
</div>
<!--end of categories brand -->

<!-- categories  -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeCategoriesModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fas-trash-alt"></i> Remove </h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeCategoriesFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeCategoriesBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!--end of .modal-content -->
  </div><!--end of .modal-dialog -->
</div><!--end of .modal -->
<!--end of categories brand -->


<script src="custom/js/categories.js"></script>

<?php require_once 'includes/footer.php'; ?>