<html>
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }
</style>
<body>
<?php include('include/header.php'); ?>

<div class="container vertical-center">
    <div class="row" style="width:300px">
        <div class="row">
            <div class="col-lg-12">
                <form id="form_create_user">
                    <h3 class="text-center">Create Account</h3>
                    <label>Full Name : </label>
                    <input class="form-control required" width="300px" id="full_name"  name="full_name" type="text" placeholder="Full Name">

                    <label>Account Number : </label>
                    <input class="form-control required" width="300px" id="student_number" name="student_number" type="number   " placeholder="Account Number">

                    <label>Username : </label>
                    <input class="form-control required" width="300px" id="username" name="username" type="text" placeholder="Username">

                    <label>Password : </label>
                    <input class="form-control required" width="300px" id="password" name="password" type="password" placeholder="Password">

                    <label>Confirm Password : </label>
                    <input class="form-control required" width="300px" id="confirm_password" name="password" type="password" placeholder="Password">

                    <label>Account Type : </label>
                    <select class="form-control" id="admin" name="admin">
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                </form>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <button onclick="createUser()" class="btn btn-primary navbar-btn">
                    <span class="glyphicon glyphicon-user"></span> Create Account
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

