<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="<?php echo base_url();?>css/datepicker.css" rel="stylesheet" media="screen">
	<link href="<?php echo base_url();?>css/jquery.dataTables.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url();?>css/design.css" rel="stylesheet" media="screen">

	<script src="<?php echo base_url();?>js/jquery.js"></script>
	<script src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/config.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url();?>js/tabletojson.js"></script>
	<script src="<?php echo base_url();?>js/jspdf.js"></script>
	<script src="<?php echo base_url();?>js/FileSaver.js"></script>
	<script src="<?php echo base_url();?>js/jspdf.plugin.table.js"></script>
	
	<script>
	function changeBGColor(){
		document.body.style.background = '#cfd6d9';	
	}
	</script>
		

</head>

<title>
	File Tracker
</title>

<body <!--onLoad="changeBGColor()"-->>


    <nav class="navbar navbar-fixed-top navbar-inverse">
        <div class="container-fluid navbar-left">
            <div class="navbar-header navbar-left" style="color: #ffffff;">
               
            </div>
        </div>

       <div class="container-fluid navbar-right">

            <div class="navbar-header navbar-right">
				<a href='<?php echo base_url()."index.php/main/logout"?>' class="btn btn-primary navbar-btn pull-right" style="color: #000000;">
                    <span class="glyphicon glyphicon-log-out"></span>
                    Logout
                </a>
            </div>

           <div class="navbar-header navbar-right">
               <a href='<?php echo base_url()."index.php/main/members"?>' class="btn btn-success navbar-btn pull-right" style="color: #000000;">
                   <span class="glyphicon glyphicon-home"></span>
                   Home </a>
           </div>
        </div>
    </nav>


 <table id="report_reference" style="display:none;" > </table>


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
                    <button id="button_generic_id" class="btn btn-lg btn-danger text-center" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- end of generic message -->



<!-- pop up user -->

<div class="modal fade" id="manage_user_option" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-vertical-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" >
                    Manage User
                </h2>
            </div>

            <div class="text-center">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="create_account" class="btn btn-info" style="height: 100px; width: 300px;">
                            <h1> Create Account  </h1>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="get_all_users" data-target="#manage_user_option"  class="btn btn-success" style="height: 100px; width: 300px;">
                            <h1> View All User </h1>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="get_all_admin" data-target="#manage_user_option"  class="btn btn-danger" style="height: 100px; width: 300px;">
                            <h1> View All Admin </h1>
                        </a>
                    </div>
                </div>
            </div>

            <div class="modal-footer text-center">
                <div class="btn-group text-center">
                    <button class="btn btn-lg btn-danger text-center" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- end of pop up user -->

<!--manage logs pop up-->
<div class="modal fade" id="manage_logs_options" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-vertical-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" >
                    Manage User
                </h2>
            </div>

            <div class="text-center">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="getTransaction/returned" class="btn btn-info" style="height: 100px; width: 300px;">
                            <h1> Returned  </h1>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="getTransaction/borrowed" data-target="#manage_user_option"  class="btn btn-warning" style="height: 100px; width: 300px;">
                            <h1> Borrowed  </h1>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="getTransaction/transactions" data-target="#manage_user_option"  class="btn btn-primary" style="height: 100px; width: 300px;">
                            <h1> Transaction Logs </h1>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="getTransaction/history" data-target="#manage_user_option"  class="btn btn-danger" style="height: 100px; width: 300px;">
                            <h1> History </h1>
                        </a>
                    </div>
                </div>
            </div>

            <div class="modal-footer text-center">
                <div class="btn-group text-center">
                    <button class="btn btn-lg btn-danger text-center" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- generic confirm -->

<div class="modal fade" id="generic_confirm" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-vertical-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" >
                    <b>
                        <div id="confirm_message_id">
                        </div>
                    </b>
                </h2>

                <div class="text-center">
                    <button id="confirm_yes" class="btn btn-lg btn-success text-center" data-dismiss="modal">Yes</button>
                    <button class="btn btn-lg btn-danger text-center" data-dismiss="modal">No</button>
                </div>

            </div>

            <div class="modal-footer text-center">

            </div>

        </div>
    </div>
</div>

<!--generic confirm -->
