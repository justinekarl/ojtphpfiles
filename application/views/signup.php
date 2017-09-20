<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/jquery.js"></script>
</head>



<body>

	<!-- jumbotron-->
	<div class="jumbotron" style="height:150px;">
		<div class="container" >
			<h4 style="float:left;"> Sign Up</h4>
			<span style="float:left;">
				<img src="<?php echo base_url();?>images/signup1.png" height="100px"/>
			</span>
		</div>			
	</div> 
	<!--end jumbotron-->
	
<?php echo form_open_multipart('upload/do_upload_user');?>
<div class="container">
		
		<div class="row">
				<div class="col-lg-5 text-center">
					<img src="<?php echo base_url('/user_photo/'.$upload_data['file_name']);?>" width="150px" width="150px"/>
				</div>
		</div>
		
			<div class="row">
				<div class="col-lg text-center">
				
					<table>
						<tr>
							<td>
								 <label class="col-lg-5 btn btn-warning btn-file" style="width:100px; margin-left:120px;" onclick="alert('test');">
									Browse 
								 </label>
								 <input type="file" name="userphoto" size="20"   style="visibility: visible; height: 100px;"/>
							</td>
							<td>
								<div style="margin-left:20px;">
									<?php 
									$upload = array('name' => 'upload',
											'class' => 'btn btn-info',
											'value' => 'Upload'
									);
									echo form_submit($upload);?>							
								</div>
							</td>
						</tr>
						
						<tr>
							<?php echo $error;?> 
						</tr>
						
					</table>
			 </div>
					
					
	</div>
</div>

<?php echo form_close();?>	



<?php echo form_open('main/signup_validation');?>
	

	
	<div class="container">
		<section>
			<div class="row">
				<div class="col-lg-5 text-center">
						<div class="form-horizontal">
						
							
								<?php 
								
								$user_name = array(
										'name'        => 'user_name',
										'value' 	=> $this->input->post('user_name'),
										'style'       => 'width:200px'
								);
								
								$first_name = array(
										'name'        => 'first_name',
										'value' 	=> $this->input->post('first_name'),
										'style'       => 'width:200px'
								);
								
								$last_name = array(
										'name'        => 'last_name',
										'value' 	=> $this->input->post('last_name'),
										'style'       => 'width:200px'
								);
								
								$email= array(
										'name'        => 'email',
										'value' 	=> $this->input->post('email'),
										'style'       => 'width:200px'
								);
								
								
								
								$contact_number = array(
										'name'        => 'contact_number',
										'value' 	=> $this->input->post('contact_number'),
										'style'       => 'width:200px'
								);
								
								$student_number = array(
										'name'        => 'student_number',
										'value' 	=> $this->input->post('student_number'),
										'style'       => 'width:200px'
								);
								
								$password= array(
										'name'        => 'password',
										'value' 	=> $this->input->post('password'),
										'style'       => 'width:200px'
								);
								
								$cpassword = array(
										'name'        => 'cpassword',
										'value' 	=> $this->input->post('cpassword'),
										'style'       => 'width:200px'
								);
								
								$user_photo = array(
										'name'        => 'user_photo',
										'value' 	=> $upload_data['file_name'],
										'style'       => 'visibility:hidden'
								);
								
								echo form_input($user_photo);
								
							?>	
								
							
							
							
							
							<div class="form-group">
							 <label for="password" class="col-lg-5 control-label"> 
								First Name
							 </label>
															
							 <div class="col-lg-7">
								<?php echo form_input($first_name);?>
							 </div>
							</div>
							
							<div class="form-group">
							 <label for="password" class="col-lg-5 control-label"> 
								Last Name
							 </label>
															
							 <div class="col-lg-7">
								<?php echo form_input($last_name);?>
							 </div>
							</div>
							
							<div class="form-group">
							 <label for="password" class="col-lg-5 control-label"> 
								Contact Number
							 </label>
															
							 <div class="col-lg-7">
								<?php echo form_input($contact_number);?>
							 </div>
							</div>
							
							
							<div class="form-group">
							 <label for="password" class="col-lg-5 control-label"> 
								Email
							 </label>
															
							 <div class="col-lg-7">
								<?php echo form_input($email);?>
							 </div>
							</div>
							
							<div class="form-group">
							 <label for="password" class="col-lg-5 control-label"> 
								Course
							 </label>
															
							 <div class="col-lg-7">
								<?php 
								//$courses = array('ECE'=>'ECE','CPE'=>'CPE');
								$course= array(
										'name'        => 'course',
								);
								
								echo form_radio($course,'ECE');
								echo "ECE ";
								echo form_radio($course,'CPE');
								echo "CPE";
								?>
							 </div>
							</div>
							
							<div class="form-group">
							 <label for="password" class="col-lg-5 control-label"> 
								Account Type
							 </label>
															
							 <div class="col-lg-7">
							 	
						
							 		<?php
										$permission_option = array(
												'name'        => 'user_permission',
												'style' => 'width:200px;',
												'id'        => 'user_permission',
												'onchange'	=> 'changeText()'
												
										);
										
										$permission = array('0'=>'Student','2'=>'Faculty');
										echo form_dropdown($permission_option, $permission);
									?>
					 															 	
							 </div>
							</div>
							
							<div class="form-group">
							 <label for="password" class="col-lg-5 control-label"> 
								<div id="account_type"> Student # </div>
							 </label>
															
							 <div class="col-lg-7">
								<?php echo form_input($student_number);?>
							 </div>
							</div>
							
							<div class="form-group">
							 <label for="password" class="col-lg-5 control-label"> 
								User Name
							 </label>
															
							 <div class="col-lg-7">
								<?php echo form_input($user_name); ?>
							 </div>
							</div>
							
							<div class="form-group">
							 <label for="password" class="col-lg-5 control-label"> 
								Password
							 </label>
															
							 <div class="col-lg-7">
								<?php echo form_password($password);?>
							 </div>
							</div>
							
							<div class="form-group">
							 <label for="password" class="col-lg-5 control-label"> 
								Confirm Password
							 </label>
															
							 <div class="col-lg-7">
								<?php echo form_password($cpassword);?>
							 </div>
							</div>
							
							
							
						
							<!-- subject -->
							
							
							
							<div class="form-group">
							 <label for="password" class="col-lg-5 control-label"> 
								Subjects
							 </label>
															
							 <div class="col-lg-7">
							 	
						
							 		<?php 
							
										$this->db->select('subject_id,subject_name');
										$this->db->from('subjects');
										$this->db->order_by("subject_name", "asc");
										$query = $this->db->get();
										$result = $query->result();
										
									
									?>
										<table align="center">
										
									<?php
										foreach($result as $row) {
											?>
											<tr>
												<td align="center">
													<?php echo $row->subject_name;?>
												</td>
												
												<td align="center">
													<?php  echo form_checkbox("subjects[]",$row->subject_id,false,array('class' => 'required_subject')); ?>
												</td>
												
												
											</tr>
											<?php 
									
										}
										?>
										</table>
					 															 	
							 </div>
							</div>
							
				
							
							<!-- end of subject -->
							
							
							<div class="form-group">
									<a href='<?php echo base_url()."index.php/main/login"?>' class="btn btn-warning"> Go Back to Main Page</a>
									<?php 
									$sign_up = array('name' => 'sign_up',
											'class' => 'btn btn-info',
											'value' => 'Sign up'
									);
									echo form_submit($sign_up);?>
							</div>
							
							<div class="form-group">
									<?php echo validation_errors();?>
							</div>
							
						</div>
				</div>
			</div>
		</section>
	</div><!--end of container-->
	
<?php echo form_close();?>

<script>

function changeText(){
	if($('#user_permission').val()==0){
		$('#account_type').text('Student #');
	}else{
		$('#account_type').text('Faculty #');	
	}
			
}
									
</script>

</body>
</html>




