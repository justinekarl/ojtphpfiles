<body>


<?php include('include/header.php'); ?>

<div class="container" style="margin-top: 100px;">
    <table class="table table-striped" id="qrcodes">
        <thead>
            <tr class="trow">
                <th width="80%">Item</th>
                <th class="remove">Action</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach($qrcodes as $qrcode){ ?>
    <tr class="trow">
        <td height="300px">
            <?php echo str_replace("\n","<br>" ,$qrcode->item); ?>
        </td>
        <td class="remove" align="center">
        	<div class="text-center">
	        	<a href='<?php echo base_url()."index.php/main/clearQr/".$qrcode->id_qr_codes?>' class="btn btn-danger navbar-btn navbar-right">
	                    <span class="glyphicon glyphicon-trash"></span> Delete
	             </a>
        	</div>
            
        </td>
    </tr>
    <?php  }?>
        </tbody>
    </table>
</div>

<footer class="footer">
    <div class="container">
        <div class="col-lg-3">
            <button type="button" class="btn btn-success btn-sm" onclick="generatefromtableQR('qrcodes','qr_codes','Registered Qr Codes')">
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

