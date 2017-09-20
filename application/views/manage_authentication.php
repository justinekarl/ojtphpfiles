<html>
  <body>
    <?php include('include/header.php'); ?>
        <div class="container vertical-center">
            <div class="row" style="width:300px">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="text-center">Update Authentication Password</h3>
                        <label>Old Password : </label>
                        <input class="form-control" width="300px" id="old_password" name="old_password" type="password" placeholder="Old Password">

                        <label>New Password : </label>
                        <input class="form-control" id="new_password" name="new_password" type="password" placeholder="New Password">

                        <label>Confirm Password : </label>
                        <input class="form-control" id="confirm_password" name="confirm_password" type="password" placeholder="Confirm New Password">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button id="update_authentication" class="btn btn-success navbar-btn">
                            <span class="glyphicon glyphicon-asterisk"></span> Update
                        </button>
                        <a href='<?php echo base_url()."index.php/main/members"?>'class="btn btn-danger navbar-btn">
                            <span class="glyphicon glyphicon-arrow-left"></span> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

