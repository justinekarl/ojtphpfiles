<body>


<?php include('include/header.php'); ?>
<!--<style>
    input[type='checkbox'] {
        -webkit-appearance:none;
        width:20px;
        height:20px;
        background:white;
        border-radius:5px;
        border:2px solid #555;
    }
    input[type='checkbox']:checked {
        background: #dd000c;
    }
</style>-->

<div class="container" style="margin-top: 100px;">

    <div class="text-center">
       <h1 style="color: #953b39"> <?php echo $title; ?> </h1>
    </div>

    <table class="table bg-danger table-striped" id="logs-table">
        <thead>
            <tr class="trow">
                <th>Item</th>
                <th>Full Name</th>
                <th>Date</th>
                <?php if($type == "transactions"): ?>
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
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
    <?php foreach($logs as $log){ ?>
    <tr class="trow">
        <td>

            <?php echo str_replace("\n","<br/>" ,$log->item); ?>
            <br>
            <?php if(isset($log->borrowed)){ echo $log->borrowed ? "Borrowed" : "Returned";} ?>
        </td>
        <td>
            <?php echo $log->full_name; ?>
        </td>
        <td>
            <?php echo $log->date_created; ?>
        </td>
        <?php if($type == "transactions"): ?>
            <td class="remove text-center">
                <div class="row">
                    <div class="col-lg-6 text-right">
                            <button type="button" class="btn btn-danger navbar-btn btn-sm" onclick="showConfirmPopUp('Delete Selected Log?','log_<?php echo $log->id?>')" >
                                <span class="glyphicon glyphicon-trash"></span> Delete </button>

                        <a style="display: none;" href='<?php echo base_url()."index.php/main/deleteLog/".$log->id?>'
                                class="btn btn-danger navbar-btn" id="log_<?php echo $log->id?>">
                                <span class="glyphicon glyphicon-trash"></span> Delete
                            </a>
                    </div>
                    <div class="col-lg-6 text-left">
                            <input type="checkbox" class="checkBoxTransction" value="<?php echo $log->id;?>">
                    </div>
            </td>

        <?php endif; ?>
    </tr>
    <?php  }?>
        </tbody>
    </table>
</div>

<footer class="footer">
    <div class="container">
        <div class="col-lg-8">
            <button type="button" class="btn btn-primary btn-sm" onclick="generatefromtable('logs-table','<?php echo $title; ?>','<?php echo $title; ?>')">
                <span class="glyphicon glyphicon-download-alt"></span> Generate PDF
            </button>
            <a href='<?php echo base_url()."index.php/main/members"?>'class="btn btn-danger navbar-btn">
                <span class="glyphicon glyphicon-arrow-left"></span> Back
            </a>
        </div>
        <?php if($type == "transactions"): ?>
            <div class="col-lg-4 text-right">
                <button type="button" class="btn btn-danger navbar-btn" onclick="showConfirmPopUpAll('Delete Selected Logs?','deleteAll()');">
                    <span class="glyphicon glyphicon-trash"></span> Delete Selected
                </button>
            </div>
        <?php endif; ?>
    </div>
</footer>


</body>

</html>

