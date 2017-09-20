<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url();?>css/design.css" rel="stylesheet" media="screen">
	<script src="<?php echo base_url();?>js/jquery.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
</head>

<body>

<?php echo form_open('main/login_validation');?>

	<div class="container vertical-center">
		<section>
            <div class="row panel panel-default">
                <div class="col-lg-12">
                    <div id="div-forms">

                        <!-- Begin # Login Form -->
                        <form id="login-form">
                            <div class="modal-body">
                                <div class="centered">
                                    <img src="<?php echo base_url('/images/logo.jpg');?>" width="50%" width="50%" alt="No Image"/>
                                </div>
                                <div id="div-login-msg">
                                    <h3>SPCF File Tracking System</h3>
                                </div>
                                <input id="user_name" name="user_name" class="form-control" type="text" placeholder="Username" required>
                                <input id="password" name="password" class="form-control" type="password" placeholder="Password" required>
                            </div>
                            <div class="modal-footer">
                                <div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="login_submit">
                                        <span class="glyphicon glyphicon-log-in"></span>
                                        LOGIN</button>
                                </div>
                                <div>
                                    <div class="form-group centered">
                                        <h3 style="color:red"> <?php echo validation_errors();?> </h3>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End # Login Form -->
                </div>
            </div>
		</section>
	</div><!--end of container-->
	
<?php echo form_close();?>	
</body>
</html>
