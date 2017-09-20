<body>


<?php include('include/header.php'); ?>

<div class="container" style="margin-top: 100px;">
    <table class="table table-striped" id="qrcodes">
        <thead>
            <tr class="trow">
                <th width="80%">Item</th>
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
            </tr>
        </thead>
        <tbody>
    <?php foreach($qrcodes as $qrcode){ ?>
    <tr class="trow">
        <td height="300px">
            <?php echo str_replace("\n","<br>" ,$qrcode->item); ?>
        </td>


        <td class="remove text-center">
            <div class="row">
                <div class="col-lg-6 text-right">
                    <button type="button" class="btn btn-danger navbar-btn btn-sm" onclick="showConfirmPopUp('Delete QrCode?','qr_<?php echo $qrcode->id_qr_codes?>')" >
                        <span class="glyphicon glyphicon-trash"></span> Delete </button>

                    <a style="display: none" id="qr_<?php echo $qrcode->id_qr_codes;?>" href='<?php echo base_url()."index.php/main/clearQr/".$qrcode->id_qr_codes?>' class="btn btn-danger navbar-btn navbar-right">
                        <span class="glyphicon glyphicon-trash"></span> Delete
                    </a>
                </div>
                <div class="col-lg-6 text-left">
                    <input type="checkbox" class="checkBoxTransction" value="<?php echo $qrcode->id_qr_codes;?>">
                </div>
        </td>

    </tr>
    <?php  }?>
        </tbody>
    </table>
</div>

<footer class="footer">
    <div class="container">
        <div class="col-lg-8">
            <button type="button" class="btn btn-success btn-sm" onclick="generatefromtableQR('qrcodes','qr_codes','Registered Qr Codes')">
                <span class="glyphicon glyphicon-download-alt"></span> Generate PDF
            </button>
            <a href='<?php echo base_url()."index.php/main/members"?>'class="btn btn-danger navbar-btn">
                <span class="glyphicon glyphicon-arrow-left"></span> Back
            </a>
        </div>

        <div class="col-lg-4 text-right">
            <button type="button" class="btn btn-danger navbar-btn" onclick="showConfirmPopUpAll('Delete Selected QRCodes?','deleteAllQR()');">
                <span class="glyphicon glyphicon-trash"></span> Delete Selected
            </button>
        </div>
    </div>
</footer>


</body>

</html>

