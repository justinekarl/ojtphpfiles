<body>


<?php include('include/header.php'); ?>

<div class="container" style="margin-top: 100px;">
    <table class="table table-striped" id="user-table">
        <thead>
            <tr class="trow">
                <th>User Id</th>
                <th>Account Number</th>
                <th>Full Name</th>
                <th class="remove">Action</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach($users as $user){ ?>
    <tr class="trow">
        <td>
            <?php echo $user->id_agent; ?>
        </td>
        <td>
            <?php echo $user->student_number; ?>
        </td>
        <td>
            <?php echo $user->full_name; ?>
        </td>
        <td class="remove">
            <?php if($user->not_clear != 1):?>
                <a href='<?php echo base_url()."index.php/main/clearUser/".$user->id_agent?>' class="btn btn-primary navbar-btn navbar-right">
                    <span class="glyphicon glyphicon-ok-sign"></span> Clear
                </a>
            <?php endif; ?>

            <?php /*if($user->not_clear == 1):*/?><!--
                <a href='<?php /*echo base_url()."index.php/main/clearUser/".$user->id_agent*/?>' class="btn btn-warning navbar-btn navbar-right"> Items </a>
            --><?php /*endif; */?>

        </td>
    </tr>
    <?php  }?>
        </tbody>
    </table>
</div>

<footer class="footer">
    <div class="container">
        <div class="col-lg-3">
            <button type="button" class="btn btn-success btn-sm" onclick="generatefromtable('user-table','user_list','Accounts')">
                <span class="glyphicon glyphicon-download-alt"></span> Generate PDF
            </button>
            <a href='<?php echo base_url()."index.php/main/members"?>'class="btn btn-danger navbar-btn">
                <span class="glyphicon glyphicon-arrow-left"></span> Back
            </a>
        </div>
    </div>
</footer>


</body>

</html>

