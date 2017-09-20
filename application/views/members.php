<body>


<?php include('include/header.php'); ?>



<div class="container" style="margin-top: 200px;">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-sm-6 centered">
                <a href="#" onclick="showLogsOption()">
                    <img src="<?php echo base_url('/images/manage_logs.png');?>" width="50%" width="50%" alt="No Image"/>
                    <h3> Manage Logs </h3>
                </a>

            </div>

            <div class="col-sm-6 centered">
                <a href="#" data-target="#manage_user_option" onclick="showUserOption()" class="icon-link">
                    <img src="<?php echo base_url('/images/manage_users.png');?>" width="50%" width="50%" alt="No Image"/>
                    <h3> Manage Users </h3>
                </a>

            </div>


        </div>

        <div class="row">

            <div class="col-sm-6 centered">
                <a href="manage_authentication">
                    <img src="<?php echo base_url('/images/manage_authentication.png');?>" width="50%" width="50%" alt="No Image"/>
                    <h3> Manage Authentication </h3>
                </a>
            </div>

            <div class="col-sm-6 centered">
                <a href="manage_qr_code">
                    <img src="<?php echo base_url('/images/qrcode.png');?>" width="50%" width="50%" alt="No Image"/>
                    <h3> Manage Qr Codes </h3>
                </a>
            </div>

        </div>

    </div>
</div>




</body>

</html>

