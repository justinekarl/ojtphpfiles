<!-- confirm request -->


<?php echo form_open('main/confirmRequest');?>	
	<div class="modal fade" id="confirm_request" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-vertical-centered">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h2 class="modal-title" id="myModalLabel">Confirm Request</h2>
				  </div>
				  <div class="modal-body text-center">
				  <?php 
				  
				 
				  
				  $date_needed = array(
				  		'name' => 'date_needed',
				  		'id' => 'date_needed',
				  		'type'        => 'text',
				  		'data-date-format' => 'mm/dd/yy-control',
				  		'class' => 'selectiondatepicker'
				  );
				  
				  $subject_option = array(
				  		'name'        => 'subject_option',
				  		'class'       => 'form-control',
				  		'style'       => 'width:200px'
				  );
				  
				  
				  $this->db->select('subject_id,subject_name');
				  $this->db->from('subjects');
				  $this->db->order_by("subject_name", "asc");
				  $query = $this->db->get();
				  $result = $query->result();
				  
				  $subjects_result = array();
				  foreach($result as $row) {
				  	$subjects_result[$row->subject_id]=$row->subject_name;
				  }
				  
		
				  
				  ?>
				  <table align="center">
				  
				  <tr>
				  	<td align="center">
				  		<h3> Set Date Needed</h3>
				  	</td>
				  </tr>	
				  
				  	<tr>
				  		<td>
				  		  <div class="well">
							<?php 
							  	echo form_input($date_needed);
							  ?>
						  </div>				  		
				  		</td>
				  	</tr>
				  	
				  	
				  	<tr>
				  	<td align="center">
				  		<h3> Subject </h3>
				  	</td>
				  </tr>
				  	
			  		<tr>
				  		<td>
				  		  <div class="well">
							<?php 
							  	echo form_dropdown($subject_option, $subjects_result);
							  ?>
						  </div>				  		
				  		</td>
				  	</tr>
				  	
				  	
				  </table>
					
				  </div>
				  <div class="modal-footer">
				   <div class="text-center">
						<h4> <?php
								 $confirm_request = array(
								  		'name'        => 'confirm_request',
								  		'class'       => 'btn btn-lg btn-success',
								 		'value' 	=> 'Confirm'
								  ); 
								echo form_submit($confirm_request);
								
							?> </h4> 
				   </div>
					<div class="btn-group"> 
							<button class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
					</div>
				 </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

<?php echo form_close();?>

<!-- end of request confirmation -->


<!-- generic message -->

<div class="modal fade" id="generic_message" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-vertical-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title text-center" >
					<b> 
						<div id="message_id">
						</div> 
					 </b>
				</h2>
				
				<div id="location"></div>
				
			</div>
			
			<div class="modal-footer text-center">
				<div class="btn-group text-center"> 
						<button id="button_generic_id" class="btn btn-lg btn-danger text-center" onclick="locationReplace();" data-dismiss="modal">Close</button>
				</div>
			 </div>
			
		</div>
	</div>
</div>

<!-- end of generic message -->



<!-- request sent -->


<!-- add subject -->

<?php echo form_open('main/addSubject');?>	
	<div class="modal fade" id="add_subject" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-vertical-centered">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h2 class="modal-title" id="myModalLabel">Add Subject</h2>
				  </div>
				  <div class="modal-body text-center">
				  <?php 
				  
				  $subject_name = array(
				  		'name'        => 'subject_name',
				  		'class'       => 'form-control',
				  		'value'       => '',
				  		'style'       => 'width:200px'
				  );
				  
				  $subject_instructor = array(
				  		'name'        => 'subject_instructor',
				  		'class'       => 'form-control',
				  		'value'       => '',
				  		'style'       => 'width:200px'
				  );
				  
				  ?>
				  <table align="center">
				  	<tr>
				  		<td align="center">
				  			Name
				  		</td>
				  	</tr>
				  	<tr>
				  		<td>
							<?php 
							  	echo form_input($subject_name);
							  ?>				  		
				  		</td>
				  	</tr>
				  	
				  	<tr align="center">
				  		<td>
				  			Instructor
				  		</td>
				  	</tr>
				  	
				  	<tr>
				  		<td>
							<?php 
							  	echo form_input($subject_instructor);
							  ?>				  		
				  		</td>
				  	</tr>
				  </table>
					
				  </div>
				  <div class="modal-footer">
				   <div class="text-center">
						<h4> 
						
							<?php
								 $add_subject = array(
								  		'name'        => 'total_count',
								  		'class'       => 'btn btn-lg btn-success',
								 		'value' 	=> 'Add Subject'
								  ); 
								echo form_submit($add_subject);
								
							?> 
							
							
							</h4> 
				   </div>
					<div class="btn-group"> 
							<button class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
					</div>
				 </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->


<!-- end of add subject -->
<?php echo form_close();?>

<!-- delete subject -->

<?php echo form_open('main/deleteSubject');?>	
	<div class="modal fade" id="delete_subject" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-vertical-centered">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h2 class="modal-title" id="myModalLabel">Delete Subject</h2>
				  </div>
				  <div class="modal-body text-center">
				  		  <table align="center">
				  	<tr>
				  		<td align="center">
				  			Are You Sure you want to Delete This Subject 
				  			<b> <div id="subject_name_delete"></div> </b>  
				  		</td>
				  	</tr>
				  	
				  	<tr>
				  		<td>
							<?php 
								 $delete_category_id = array(
								  		'name'        => 'delete_subject_hidden_id',
								 		'id'		 => 'delete_subject_hidden_id',
								 		'style' 	=> 'visibility:hidden'
								  ); 
								echo form_input($delete_category_id);
							?>
				  		</td>
				  	</tr>
				  </table>
					
				  </div>
				  <div class="modal-footer">
				   <div class="text-center">
						<h4> <?php
								 $delete_subject = array(
								  		'name'        => 'delete_subject',
								  		'class'       => 'btn btn-lg btn-danger',
								 		'value' 	=> 'Yes'
								  ); 
								echo form_submit($delete_subject);
								
							?> 
							<button class="btn btn-lg btn-primary" data-dismiss="modal">No</button>
							</h4> 
				   </div>
					<div class="btn-group"> 
							<button class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
					</div>
				 </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
<?php echo form_close();?>

<!-- end of delete subject -->



<!-- edit subject -->

<?php echo form_open('main/editSubject');?>	
	<div class="modal fade" id="edit_subject" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-vertical-centered">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h2 class="modal-title" id="myModalLabel">Add Subject</h2>
				  </div>
				  <div class="modal-body text-center">
				  <?php 
				  
				  $subject_name = array(
				  		'id'		  => 'subject_name_edit',
				  		'name'        => 'subject_name_edit',
				  		'class'       => 'form-control',
				  		'value'       => '',
				  		'style'       => 'width:200px'
				  );
				  
				  $subject_instructor = array(
				  		'id'		  => 'subject_instructor_edit',
				  		'name'        => 'subject_instructor_edit',
				  		'class'       => 'form-control',
				  		'value'       => '',
				  		'style'       => 'width:200px'
				  );
				  
				  $edit_subject_id = array(
				  		'name'        => 'edit_subject_id',
				  		'id'		 => 'edit_subject_id',
				  		'style' 	=> 'visibility:hidden'
				  );
				  echo form_input($edit_subject_id);
				  
				  ?>
				  <table align="center">
				  	<tr>
				  		<td align="center">
				  			Name
				  		</td>
				  	</tr>
				  	<tr>
				  		<td>
							<?php 
							  	echo form_input($subject_name);
							  ?>				  		
				  		</td>
				  	</tr>
				  	
				  	<tr align="center">
				  		<td>
				  			Instructor
				  		</td>
				  	</tr>
				  	
				  	<tr>
				  		<td>
							<?php 
							  	echo form_input($subject_instructor);
							  ?>				  		
				  		</td>
				  	</tr>
				  </table>
					
				  </div>
				  <div class="modal-footer">
				   <div class="text-center">
						<h4> <?php
								 $edit_subject = array(
								  		'name'        => 'total_count',
								  		'class'       => 'btn btn-lg btn-success',
								 		'value' 	=> 'Edit Subject'
								  ); 
								echo form_submit($edit_subject);
								
							?> </h4> 
				   </div>
					<div class="btn-group"> 
							<button class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
					</div>
				 </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
<?php echo form_close();?>

<!-- end of edit subject -->




<!-- end of request sent -->

<!-- request sent -->


<div class="modal fade" id="request_sent" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-vertical-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title text-center">Request for borrow Sent</h2>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- end of request sent -->


<!-- add category -->

<?php // echo form_open('tools_controller/addCategory');?>	
	<div class="modal fade" id="pop_result" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-vertical-centered">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h2 class="modal-title" id="myModalLabel">Add Category</h2>
				  </div>
				  <div class="modal-body text-center">
				  <?php 
				  
				  $category_name = array(
				  		'id'        => 'category_name_id',
				  		'name'        => 'category_name',
				  		'class'       => 'form-control',
				  		'style'       => 'width:200px'
				  );
		
				  echo "<h3> Category Name </h3>";
				  ?>
				  <table align="center">
				  	<tr>
				  		<td>
							<?php 
							  	echo form_input($category_name);
							  ?>				  		
				  		</td>
				  	</tr>
				  </table>
					
				  </div>
				    <div class="modal-footer">
				   <div class="text-center">
						<h4> 
							<a href="#" onclick="addCategory()" class="btn btn-success navbar-btn" data-toggle="modal"> Add Category</a>
						</h4> 
				   </div>
					<div class="btn-group"> 
							<button class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
					</div>
				 </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
<?php // echo form_close();?>

<!-- end of add category -->

<!-- add tool -->



<!-- end of add tool -->


	
<!-- pop success ups -->

<div class="modal fade" id="request_sucess" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-vertical-centered">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h2 class="modal-title" id="myModalLabel">Request Submitted</h2>
				  </div>
				  <div class="modal-body text-center">
				  		 Kindly approach the person in charge
				  </div>
				</div><!-- /.modal-content -->
			  </div>
	</div>
<!-- end of pop success ups -->

	
	
<!-- delete category -->

<?php echo form_open('tools_controller/deleteCategory');?>	
	<div class="modal fade" id="delete_category" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-vertical-centered">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h2 class="modal-title" id="myModalLabel">Delete Category</h2>
				  </div>
				  <div class="modal-body text-center">
				  		  <table align="center">
				  	<tr>
				  		<td align="center">
				  			Are You Sure you want to Delete Category 
				  			<b> <div id="category_name_delete"></div> </b>  
				  			and all items and tools under it?
				  		
				  		</td>
				  	</tr>
				  	
				  	<tr>
				  		<td>
							<?php 
								 $delete_category_id = array(
								  		'name'        => 'category_id_delete',
								 		'id'		 => 'delete_category_hidden_id',
								 		'style' 	=> 'visibility:hidden'
								  ); 
								echo form_input($delete_category_id);
							?>
				  		</td>
				  	</tr>
				  	
				  	
				  </table>
					
				  </div>
				  <div class="modal-footer">
				   <div class="text-center">
						<h4> <?php
								 $delete_category = array(
								  		'name'        => 'delete_category',
								  		'class'       => 'btn btn-lg btn-danger',
								 		'value' 	=> 'Yes'
								  ); 
								echo form_submit($delete_category);
								
							?> 
							<button class="btn btn-lg btn-primary" data-dismiss="modal">No</button>
							</h4> 
				   </div>
					<div class="btn-group"> 
							<button class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
					</div>
				 </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

<?php echo form_close();?>

<!-- end of delete category -->


<!-- edit category -->

<?php echo form_open('tools_controller/editCategory');?>	
	<div class="modal fade" id="edit_category" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-vertical-centered">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h2 class="modal-title" id="myModalLabel">Edit Category</h2>
				  </div>
				  <div class="modal-body text-center">
				  		  <table align="center">
				  	<tr>
				  		<td align="center">
		  				<?php 
								 $edit_category_name = array(
								  		'name'        => 'category_name_edit',
								 		'id'		 => 'category_name_edit',
								  ); 
								echo form_input($edit_category_name);
							?>
				  		
				  		</td>
				  	</tr>
				  	
				  	<tr>
				  		<td>
							<?php 
								 $edit_category_id = array(
								  		'name'        => 'category_id_edit',
								 		'id'		 => 'edit_category_hidden_id',
								 		'style' 	=> 'visibility:hidden'
								  ); 
								echo form_input($edit_category_id);
							?>
				  		</td>
				  	</tr>
				  	
				  	
				  </table>
					
				  </div>
				  <div class="modal-footer">
				   <div class="text-center">
						<h4> <?php
								 $edit_category = array(
								  		'name'        => 'edit_category',
								  		'class'       => 'btn btn-lg btn-success',
								 		'value' 	=> 'Edit Category'
								  ); 
								echo form_submit($edit_category);
								
							?> </h4> 
				   </div>
					<div class="btn-group"> 
							<button class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
					</div>
				 </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

<?php echo form_close();?>

<!-- end of edit category -->	


<!-- user expiration -->


<?php echo form_open('main/setUserExpiration');?>	
	<div class="modal fade" id="account_expiration" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-vertical-centered">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h2 class="modal-title" id="myModalLabel">Set Account Expiration</h2>
				  </div>
				  <div class="modal-body text-center">
				  <?php 
				  
				  $this->db->select('account_expiration');
				  $this->db->from('expiration');
				  $query = $this->db->get();
				  $result = $query->result();
				  
				  $expiration = array(
				  		'name' => 'user_expiration',
				  		'id' => 'user_expiration',
				  		'type'        => 'text',
				  		'data-date-format' => 'mm/dd/yy-control',
				  		'class' => 'selectiondatepicker'
				  );
		
				  echo "<h3> Set Expiration Date</h3>";
				  echo "Current Expiration Date: ".$result{0}->account_expiration;
				  
				  
				  ?>
				  <table align="center">
				  	<tr>
				  		<td>
				  		  <div class="well">
							<?php 
							  	echo form_input($expiration);
							  ?>
						  </div>				  		
				  		</td>
				  	</tr>
				  </table>
					
				  </div>
				  <div class="modal-footer">
				   <div class="text-center">
						<h4> <?php
								 $account_exp_sub = array(
								  		'name'        => 'set_expiration',
								  		'class'       => 'btn btn-lg btn-success',
								 		'value' 	=> 'Set Expiration'
								  ); 
								echo form_submit($account_exp_sub);
								
							?> </h4> 
				   </div>
					<div class="btn-group"> 
							<button class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
					</div>
				 </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

<?php echo form_close();?>

<!-- end of user expiration -->




<!-- delete tool-->


<?php echo form_open('tools_controller/deleteTool');?>	
	<div class="modal fade" id="delete_tool" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-vertical-centered">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h2 class="modal-title" id="myModalLabel">Delete Tool</h2>
				  </div>
				  <div class="modal-body text-center">
				  <table align="center">
				  	<tr>
				  		<td align="center">
				  			Are you sure you want to delete tool 
				  			<b> <div id="tool_name_delete"></div> </b>
				  		</td>
				  	</tr>
				  	
				  	<tr>
				  		<td>
				  		  <?php 
								 $delete_tool_id = array(
								  		'name'        => 'tool_id_delete',
								 		'id'		 => 'delete_tool_hidden_id',
								 		'style' 	=> 'visibility:hidden'
								  ); 
								echo form_input($delete_tool_id);
							?>				  		
				  		</td>
				  	</tr>
				  </table>
					
				  </div>
				  <div class="modal-footer">
				   <div class="text-center">
						<h4> <?php
								 $delete_tool_submit = array(
								  		'name'        => 'delete_tool_submit',
								  		'class'       => 'btn btn-lg btn-warning',
								 		'value' 	=> 'Yes'
								  ); 
								echo form_submit($delete_tool_submit);
								
							?> 
							<button class="btn btn-lg btn-primary" data-dismiss="modal">No</button>
							</h4> 
				   </div>
					<div class="btn-group"> 
							<button class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
					</div>
				 </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

<?php echo form_close();?>

<!-- end of delete tool -->





<!-- edit tool-->


<?php echo form_open('tools_controller/editTool');?>	
	<div class="modal fade" id="edit_tool" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-vertical-centered">
				<div class="modal-content">
				  <div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h2 class="modal-title" id="myModalLabel">Edit Tool</h2>
				  	</div>
				  <div class="modal-body text-center">
				  <?php 
				  
				  $tool_name = array(
				  		'name'        => 'tool_name_edit',
				  		'class'       => 'form-control',
				  		'style'       => 'width:200px',
				  		'id'        => 'tool_name_edit'
				  );
				  
				  $this->db->select('category_name,category_id');
				  $this->db->from('category');
				  $this->db->where('deleted',0);
				  $this->db->order_by("category_name", "asc");
				  $query = $this->db->get();
				  $result = $query->result();
				  
				  $category_result = array();
				  foreach($result as $row) {
				  	$category_result[$row->category_id] = $row->category_name;
				  }
				  
				  
				  $tool_category = array(
				  		'name'        => 'tool_category_edit',
				  		'class'       => 'form-control',
				  		'id'        => 'tool_category_edit'
				  );
				  
				  $brief_description = array(
				  		'name'        => 'brief_description_edit',
				  		'class'       => 'form-control',
				  		'style'       => 'width:200px',
				  		'id'        => 'brief_description_edit'
				  );
				  
				  $total_count = array(
				  		'name'        => 'total_count_edit',
				  		'class'       => 'form-control',
				  		'style'       => 'width:200px',
				  		'id'        => 'total_count_edit'
				  );
				  
				  $borrowed = array(
				  		'name'        => 'borrowed_edit',
				  		'class'       => 'form-control',
				  		'style'       => 'width:200px',
				  		'id'        => 'borrowed_edit'
				  );
				  
				 /*  $photo_path = array(
				  		'name'        => 'photo_path_edit',
				  		'class'       => 'form-control',
				  		'style'       => 'width:200px',
				  		'id'        => 'photo_path_edit'
				  ); */
				  
				 

				  
				  $tool_id_edit = array(
				  		'name'        => 'tool_id_edit',
				  		'id'		 => 'tool_id_edit',
				  		'style' 	=> 'visibility:hidden'
				  );
				  echo form_input($tool_id_edit);
				  
				  
				  
				  
				  
			?>
			
			<table align="center"> 
				<tr>
					<td> <h3> Tool Name </h3></td>
					<td> 
					  <?php 
					  	echo form_input($tool_name);
					  ?>
					</td>
				</tr>
				
				<tr>
					<td> <h3> Tool Name </h3></td>
					<td> 
					  <?php 
					  	echo form_dropdown($tool_category, $category_result);
					  ?>
					</td>
				</tr>
				
				
				<tr>
					<td> <h3> Brief Description </h3> </td>
					<td>
					<?php 
					  	echo form_input($brief_description);
					  ?>  
					</td>
				</tr>
				
				<tr>
					<td> <h3> Total Count </h3> </td>
					<td>
					<?php 
					  	echo form_input($total_count);
					  ?> 
					</td>
				</tr>
				
				<tr>
					<td> <h3> Borrowed </h3> </td>
					<td>
					<?php 
					  	echo form_input($borrowed);
					  ?> 
					</td>
				</tr>

<!-- 				<tr> -->
<!-- 					<td> <h3> Photo </h3></td> -->
<!-- 					<td> -->
					 
<!--  					  	echo form_input($photo_path); -->
					 
<!-- 					</td> -->
<!-- 				</tr> -->
				
			</table>
					
					
				  </div>
				  <div class="modal-footer">
				   <div class="text-center">
						<h4> <?php
								 $edit_tool= array(
								  		'name'        => 'edit_tool',
								  		'class'       => 'btn btn-lg btn-success',
								 		'value' 	=> 'Edit Tool'
								  ); 
								echo form_submit($edit_tool);
								
							?> </h4> 
				   </div>
					<div class="btn-group"> 
							<button class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
					</div>
				 </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
<?php echo form_close();?>

<!-- end of edit tool -->





<!-- delete item -->

<?php echo form_open('tools_controller/deleteItem');?>	
	<div class="modal fade" id="delete_item_pop_up" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-vertical-centered">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h2 class="modal-title" id="myModalLabel">Delete Item</h2>
				  </div>
				  <div class="modal-body text-center">
				  		  <table align="center">
				  	<tr>
				  		<td align="center">
				  			Are You Sure you want to Delete Item With Serial Number 
				  			<b> <span id="item_serial_number_delete"></span> </b>  
				  		</td>
				  	</tr>
				  	
				  	<tr>
				  		<td>
							<?php 
							
								$category_source_id = array(
										'name'        => 'category_source_id',
										'id'		 => 'category_source_id',
										'style' 	=> 'visibility:hidden',
								);
								echo form_input($category_source_id);
							
								$delete_item_id = array(
								  		'name'        => 'delete_item_id',
								 		'id'		 => 'delete_item_id',
								 		'style' 	=> 'visibility:hidden'
								  ); 
								echo form_input($delete_item_id);
								
								$delete_item_tool_id = array(
										'name'        => 'delete_item_tool_id',
										'id'		 => 'delete_item_tool_id',
										'style' 	=> 'visibility:hidden'
								);
								echo form_input($delete_item_tool_id);
								
							?>
				  		</td>
				  	</tr>
				  	
				  	
				  </table>
					
				  </div>
				  <div class="modal-footer">
				   <div class="text-center">
						<h4> <?php
								 $delete_item = array(
								  		'name'        => 'delete_item',
								  		'class'       => 'btn btn-lg btn-danger',
								 		'value' 	=> 'Yes'
								  ); 
								echo form_submit($delete_item);
								
							?> 
							<button class="btn btn-lg btn-primary" data-dismiss="modal">No</button>
							</h4> 
				   </div>
					<div class="btn-group"> 
							<button class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
					</div>
				 </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

<?php echo form_close();?>

<!-- end of delete item -->




<!-- edit items -->


<?php echo form_open('tools_controller/editItem');?>	
	<div class="modal fade" id="pop_edit_item" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-vertical-centered">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h2 class="modal-title" id="myModalLabel">Edit Item</h2>
				  </div>
				  <div class="modal-body text-center">
				  <?php 

				  
				  
				  $tools_option_edit = array(
				  		'name'        => 'tools_option_edit',
				  		'class'       => 'form-control',
				  		'style'       => 'width:200px',
				  		'id' => 'tools_option_edit'
				  		
				  );
				  
				  
				  $sqlStatement = "select tools_id,tool_name from tools ";
				  $sqlStatement .= "where category_id = ";
				  $sqlStatement .=$items{0}->category_id;
				  $sqlStatement .=" and deleted = 0";
				  $query = $this->db->query($sqlStatement);
				  $result = $query->result();
				  
				  $tools_result = array();
				  foreach($result as $row) {
				  	$tools_result [$row->tools_id] = $row->tool_name;
				  }
				  
				  
				  
				 $condition_edit = array(
				  		'name'        => 'condition_edit',
				  		'class'       => 'form-control',
				  		'style'       => 'width:200px',
				 		'id' => 'condition_edit'
				  );
				  
				  
				  $condition_option = array('New'=>'New','OLD'=>'OLD','Slightly Damage'=>'Slightly Damage','Broken'=>'Broken','Missing'=>'Missing');
				  
				  
				  $serial_number_edit = array(
				  		'name'        => 'serial_number_edit',
				  		'class'       => 'form-control',
				  		'style'       => 'width:200px',
				  		'id'        => 'serial_number_edit'
				  );
				  
				  $date_borrowed_edit= array(
				  		'name' => 'date_borrowed_edit',
				  		'id' => 'date_borrowed_edit',
				  		'type'        => 'text',
				  		'data-date-format' => 'mm/dd/yy-control',
				  		'class' => 'selectiondatepicker form-control'
				  );
				  
				  $date_returned_edit = array(
				  		'name' => 'date_returned_edit',
				  		'id' => 'date_returned_edit',
				  		'type'        => 'text',
				  		'data-date-format' => 'mm/dd/yy-control',
				  		'class' => 'selectiondatepicker form-control'
				  );
				  
				  $price_edit = array(
				  		'name'        => 'price_edit',
				  		'class'       => 'form-control',
				  		'style'       => 'width:200px',
				  		'id'        => 'price_edit'
				  );
				  
				  $brand_edit = array(
				  		'name'        => 'brand_edit',
				  		'class'       => 'form-control',
				  		'style'       => 'width:200px',
				  		'id'        => 'brand_edit'
				  );
				  
				  $item_description = array(
				  		'id'		  => 'item_description_edit',
				  		'name'        => 'item_description_edit',
				  		'class'       => 'form-control',
				  		'style'       => 'width:200px;height:100px;'
				  );
				  
				  //added
				  $department_edit = array(
				  		'id'		  => 'department_edit',
				  		'name'        => 'department_edit',
				  		'class'       => 'form-control',
				  		'style'       => 'width:200px;'
				  );
				  
				  $location_edit = array(
				  		'id'		  => 'location_edit',
				  		'name'        => 'location_edit',
				  		'class'       => 'form-control',
				  		'style'       => 'width:200px;'
				  );
				  
				  $person_in_charge_edit = array(
				  		'id'		  => 'person_in_charge_edit',
				  		'name'        => 'person_in_charge_edit',
				  		'class'       => 'form-control',
				  		'style'       => 'width:200px;'
				  );
				  //added
				  
				  Echo "<h3> Edit Item</h3>";
				  ?>
				  <table align="center">
				  
				  <tr>
				  		<td> 	Tool </td>
				  		<td>
							<?php  
							  	echo form_dropdown($tools_option_edit, $tools_result);
							  ?>				  		
				  		</td>
				  	</tr>
				  
				  	<tr>
				  		<td> 	Condition </td>
				  		<td>
							<?php  
							  	echo form_dropdown($condition_edit, $condition_option);
							  ?>				  		
				  		</td>
				  	</tr>
				  	
				  	<tr>
				  		<td> 	Department </td>
				  		<td>
							<?php  
							$department_option = array('COE'=>'COE','CCIS'=>'CCIS','CHM'=>'CHM','COB'=>'COB','COC'=>'COC','CASS'=>'CASS','CoEd'=>'CoEd','CON'=>'CON');
							  	echo form_dropdown($department_edit, $department_option);
							  ?>				  		
				  		</td>
				  	</tr>
				  	
				  	<tr>
				  		<td> 	Location </td>
				  		<td>
							<?php  
							$location_option = array('Engineering Lab'=>'Engineering Lab','Cisco Lab'=>'Cisco Lab','Smart Lab'=>'Smart Lab','Science Lab'=>'Science Lab');
							  	echo form_dropdown($location_edit, $location_option);
							  ?>				  		
				  		</td>
				  	</tr>
				  	
				  	<tr>
				  		<td> Person In Charge</td>
				  		<td>
				  			
							<?php 
							  	echo form_input($person_in_charge_edit);
							  ?>				  		
				  		</td>
				  	</tr>
				  	
				  	
			  		<tr>
				  		<td> Serial Number </td>
				  		<td>
				  			
							<?php 
							  	echo form_input($serial_number_edit);
							  ?>				  		
				  		</td>
				  	</tr>
				  	
<!-- 				  	<tr> -->
<!-- 				  		<td> -->
<!-- 				  			Date Borrowed: -->
<!-- 				  		</td> -->
<!-- 				  		<td> -->
				  			<?php 
//   							  	echo form_input($date_borrowed_edit);
//   							  ?>
<!-- 				  		</td> -->
<!-- 				  	</tr> -->
				  	
<!-- 				  	<tr> -->
<!-- 				  		<td> -->
<!-- 				  			Date Returned: -->
<!-- 				  		</td> -->
<!-- 				  		<td> -->
				  			<?php 
//   							  	echo form_input($date_returned_edit);
//   							  ?>
<!-- 				  		</td> -->
<!-- 				  	</tr> -->
				  	
				  	<tr>
				  		<td>
				  			Brand
				  		</td>
				  		<td>
				  			<?php 
  							  	echo form_input($brand_edit);
  							  ?>
				  		</td>
				  	</tr>
				  	
				  	<tr>
				  		<td>
				  			Price
				  		</td>
				  		<td>
				  			<?php 
  							  	echo form_input($price_edit);
  							  ?>
				  		</td>
				  	</tr>
				  	
				  	<tr>
				  		<td>
				  			Description
				  		</td>
				  		<td>
				  			<?php 
  							  	echo form_textarea($item_description);
  							  ?>
				  		</td>
				  	</tr>
				  	
				  	
				  	<tr>
				  		<td>	
				  			<?php 
					  			$edit_item_id = array(
					  					'name'        => 'edit_item_id',
					  					'id'		 => 'edit_item_id',
					  					'style' 	=> 'visibility:hidden'
					  			);
					  			echo form_input($edit_item_id);
				  			?>
				  		</td>
				  	</tr>
				  	
				  </table>
					
				  </div>
				  <div class="modal-footer">
				   <div class="text-center">
						<h4> <?php
								 $edit_item= array(
								  	 	'name'        => 'edit_item',
								  		'class'       => 'btn btn-lg btn-success',
								 		'value' 	=> 'Edit Item'
								  ); 
								echo form_submit($edit_item);
								
							?> </h4> 
				   </div>
					<div class="btn-group"> 
							<button class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
					</div>
				 </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

<?php echo form_close();?>


<!-- end of edit items -->





