<body>


<?php include('include/header.php'); ?>

<div class="container" style="margin-top: 100px;">
    <table class="table table-striped" id="user-table">
        <thead>
            <tr class="trow">
                <th>User Id</th>
                <th>Account Number</th>
                <th>Full Name</th>
                <th>Username</th>
                <th class="remove">Password</th>
                <?php if (!$admin):?>
                    <th class="remove">
                        <div class="row">
                            <div class="col-lg-6 text-right">
                                Action
                            </div>
                            <div class="col-lg-6 text-left">
                                <input type="checkbox" id="selectAll" onclick="selectAll()">
                            </div>
                        </div>
                    </th>
                <?php endif;?>
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
        <td>
            <?php echo $user->user_name; ?>
        </td>
        <td class="remove">
            <span style="display: none" id="user_<?php echo $user->id_agent; ?>">
                 <?php echo $user->password ?>
            </span>

            <button type="button" class="btn btn-danger btn-sm" onclick="showPassword('user_<?php echo $user->id_agent; ?>',this)">
                <span class="glyphicon glyphicon-zoom-in"></span> Show Password
            </button>
        </td>
        <?php if (!$admin):?>
          <!--  <td class="remove">
                <?php /*if($user->not_clear != 1):*/?>
                    <a href='<?php /*echo base_url()."index.php/main/clearUser/".$user->id_agent*/?>' class="btn btn-primary navbar-btn navbar-right">
                        <span class="glyphicon glyphicon-ok-sign"></span> Clear
                    </a>
                <?php /*endif; */?>
            </td>-->

            <td class="remove text-center">
                <?php if($user->not_clear != 1):?>
                    <div class="row">
                        <div class="col-lg-6 text-right">
                            <button type="button" class="btn btn-danger navbar-btn btn-sm" onclick="showConfirmPopUp('Clear Selected User?','clear_<?php echo $user->id_agent?>')" >
                                <span class="glyphicon glyphicon-trash"></span> Delete
                            </button>

                            <a style="display: none" id="clear_<?php echo $user->id_agent;?>" href='<?php echo base_url()."index.php/main/clearUser/".$user->id_agent?>' >

                            </a>

                        </div>
                        <div class="col-lg-6 text-left">
                            <input type="checkbox" class="checkBoxTransction" value="<?php echo $user->id_agent;?>">
                        </div>
                <?php endif; ?>
            </td>
        <?php endif;?>
    </tr>
    <?php  }?>
        </tbody>
    </table>
</div>

<footer class="footer">
    <div class="container">
        <div class="col-lg-8">
            <button type="button" class="btn btn-success btn-sm" onclick="generatefromtable('user-table','user_list','Accounts')">
                <span class="glyphicon glyphicon-download-alt"></span> Generate PDF
            </button>
            <a href='<?php echo base_url()."index.php/main/members"?>'class="btn btn-danger navbar-btn">
                <span class="glyphicon glyphicon-arrow-left"></span> Back
            </a>
        </div>
        <?php if (!$admin):?>
        <div class="col-lg-4 text-right">
            <button type="button" class="btn btn-danger navbar-btn" onclick="showConfirmPopUpAll('Delete Selected Users?','deleteAllUser()');">
                <span class="glyphicon glyphicon-trash"></span> Delete Selected
            </button>
        </div>
        <?php endif;?>
    </div>
</footer>


</body>

</html>

