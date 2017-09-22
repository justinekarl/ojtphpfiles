//on load

 $(document).ready(function() {

    $('#user-table').DataTable();
    $('#logs-table').DataTable();
    $('#qrcodes').DataTable();


		 $('#update_authentication').click(function () {
		 	 var oldPassword = $('#old_password').val();
             var newPassword = $('#new_password').val();
             var confirmPassword = $('#confirm_password').val();

             if(oldPassword.length === 0 || newPassword.length === 0
			 || confirmPassword.length === 0){
                 showPopUp('All Fields are Required');

			 }else if(confirmPassword !== newPassword){
                 showPopUp('New Password and Confirm Password not the Same');
             }else{
			 	formData = [];
			 	formData.push({name:"data", value: JSON.stringify({oldPassword : oldPassword, newPassword : newPassword, confirmPassword:confirmPassword})})
				 $.ajax({
                     type: 'POST',
                     url: 'updateAuthentication/',
                     data: formData,
                     success: function(o) {
                         o = JSON.parse(o);
                         if(o.data === true){
                             showPopUp(o.message);
						 }else{
                             showPopUp(o.message);
						 }
					 }
                 });
             }
		 })

 });
/*

$(function() {
    function reposition() {
        var modal = $(this),
            dialog = modal.find('.modal-dialog');
        modal.css('display', 'block');

        // Dividing by two centers the modal exactly, but dividing by three
        // or four works better for larger screens.
        dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 4));
    }
    // Reposition when a modal is shown
    $('.modal').on('show.bs.modal', reposition);
    // Reposition when the window is resized
    $(window).on('resize', function() {
        $('.modal:visible').each(reposition);
    });
});
*/


function createUser(){
    var ctr=0;
    $('.required').each(function(){
        if($(this).val().length === 0){
            ctr++;
        }
    });
    if(ctr !== 0){
        showPopUp("All Fields Are Required");
        return false;
    }

    var formData = $('#form_create_user').serializeArray();
    $.ajax({
        type: 'POST',
        url: 'createUser/',
        data: formData,
        success: function(o) {
            o = JSON.parse(o);
            if(o.data === true){
                showPopUp(o.message);
            }else{
                showPopUp(o.message);
            }
        }
    });

}

function showPopUp(message){
    $('#message_id').text(message);
    $('#generic_message').modal('toggle');
}

function showConfirmPopUp(message,id){
    $('#confirm_message_id').text(message);
    $('#generic_confirm').modal('toggle');
    $('#confirm_yes').attr('onclick', "triggerClick('"+id+"')");
}

function triggerClick(id){
    document.getElementById(id).click();
}

function showUserOption(){
    $('#manage_user_option').modal('toggle');
}

function showLogsOption(){
    $('#manage_logs_options').modal('toggle');
}



//generate pdf

function generatefromtable(tableId,reportName,extraParameter) {
    var tbl = $('#'+tableId).clone();
    tbl.find('tr.trow').find('th.remove').remove();
    tbl.find('tr.trow').find('td.remove').remove();
    //$('tr.trow').find('th.remove').remove();


    console.log(tbl.find('tr').length);
    var tableStr = tbl.html().replace(/<br>/gi, " ");


    /* for(var ctr = 0; ctr<tbl.find('tr').length; ctr++){
         tableStr = CustomReplace(tableStr, "linebreak", "                                                                                                                ", 1);
         tableStr = CustomReplace(tableStr, "linebreak", "                            ", 1);
         tableStr = CustomReplace(tableStr, "linebreak", "                                                                                                          ", 1);
         tableStr = CustomReplace(tableStr, "linebreak", "                                                                                                              ", 1);
     }*/



    //  console.log(tableStr);
    $('#'+'report_reference').html(tableStr);


    var data = [], fontSize = 8, height = 0, doc;
    doc = new jsPDF('p', 'pt', 'a4', true);
    doc.setFont("times", "normal");

    doc.setFontSize(12);
    //doc.setFontType("bold");
    //doc.text(180, 65, "ENGINEERING AND S.S.I LABORATORY");
    doc.text(250, 65,extraParameter);

    doc.setFontSize(12);
    doc.text(210, 20, "System Plus College Foundation");
    doc.setFontSize(12);
    doc.text(230, 35, "College Of Engineering");
    doc.setFontSize(8);
    doc.text(250, 50, "___ Semester ___ S.Y.");


    doc.setFontSize(8);
    doc.text(24, 820, "________________");
    doc.text(35, 830, "Prepared by:");
    doc.text(239, 820, "________________");
    doc.text(260, 830, "Noted by:");
    doc.text(439, 820, "________________");
    doc.text(450, 830, "Approved by:");

    var currentdate = new Date();
    var date = currentdate.getDate() + "/" + (currentdate.getMonth()+1)  + "/" + currentdate.getFullYear();

    doc.text(260, 840, date);
    doc.setFontSize(fontSize);
    data = [];
    data = doc.tableToJson('report_reference');

    //alert(tbl.html());
    //var res = tbl.tableToJSON();
    //console.log('this');
    //console.log(res);
    //data = res.data;
    //tableToJson($(tbl.html()));


    height = doc.drawTable(data, {
        xstart : 35,
        ystart : 5,
        tablestart : 95,
        marginleft : 5,
        xOffset : 5,
        yOffset : 10
    });
    doc.text(50, height + 20, '');

    //doc.setFontSize(12);
    //doc.setFontType("bold");
    //doc.text(180, 65, "ENGINEERING AND S.S.I LABORATORY");
    //doc.text(24, 90,extraParameter);

    doc.save(reportName+".pdf");
}

/////
function CustomReplace(strData, strTextToReplace, strReplaceWith, replaceAt) {
    var index = strData.indexOf(strTextToReplace);
    for (var i = 1; i < replaceAt; i++)
        index = strData.indexOf(strTextToReplace, index + 1);
    if (index >= 0)
        return strData.substr(0, index) + strReplaceWith + strData.substr(index + strTextToReplace.length, strData.length);
    return strData;
}


function generatefromtableQR(tableId,reportName,extraParameter) {
    var tbl = $('#'+tableId).clone();
    tbl.find('tr.trow').find('th.remove').remove();
    tbl.find('tr.trow').find('td.remove').remove();
    //$('tr.trow').find('th.remove').remove();
    // var tableStr = convertToText(tbl.html().replace(/br/gi, "xxxxx"));
    //var tableStr = tbl.html()

    //var tableStr = tbl.html().replace(/<br>/gi, "                     ");

    console.log(tbl.find('tr').length);
    var tableStr = tbl.html().replace(/<br>/gi, " ");


   /* for(var ctr = 0; ctr<tbl.find('tr').length; ctr++){
        tableStr = CustomReplace(tableStr, "linebreak", "                                                                                                                ", 1);
        tableStr = CustomReplace(tableStr, "linebreak", "                            ", 1);
        tableStr = CustomReplace(tableStr, "linebreak", "                                                                                                          ", 1);
        tableStr = CustomReplace(tableStr, "linebreak", "                                                                                                              ", 1);
    }*/



  //  console.log(tableStr);
    $('#'+'report_reference').html(tableStr);


    var data = [], fontSize = 8, height = 0, doc;
    doc = new jsPDF('p', 'pt', 'a4', true);



    doc.setFont("times", "normal");

    doc.setFontSize(12);
    //doc.text(250, 65, "ENGINEERING");
    doc.text(250, 65,extraParameter);

    doc.setFontSize(12);
    doc.text(210, 20, "System Plus College Foundation");
    doc.setFontSize(12);
    doc.text(230, 35, "College Of Engineering");
    doc.setFontSize(8);
    doc.text(250, 50, "___ Semester ___ S.Y.");


    doc.setFontSize(8);
    doc.text(24, 820, "________________");
    doc.text(35, 830, "Prepared by:");
    doc.text(239, 820, "________________");
    doc.text(260, 830, "Noted by:");
    doc.text(439, 820, "________________");
    doc.text(450, 830, "Approved by:");

    var currentdate = new Date();
    var date = currentdate.getDate() + "/" + (currentdate.getMonth()+1)  + "/" + currentdate.getFullYear();

    doc.text(260, 840, date);
    doc.setFontSize(fontSize);
    data = [];
    data = doc.tableToJson('report_reference');

    console.log(data);
    height = doc.drawTable(data, {
        xstart : 35,
        ystart : 5,
        tablestart : 95,
        marginleft : 5,
        xOffset : 5,
        yOffset : 10,
    });


    //doc.text(value, x + settings.padding, y);
    doc.text(50, height + 120,'');
    doc.save(reportName+".pdf");
}

function selectAll(){
    $('.checkBoxTransction').prop('checked', $('#selectAll').is(':checked'));
}

function showConfirmPopUpAll(message,methodCall){
    $('#confirm_message_id').text(message);
    $('#generic_confirm').modal('toggle');
    $('#confirm_yes').attr('onclick', methodCall);
}

function deleteAll(){
    var ids = [];
    $('.checkBoxTransction').each(function(){
        if($(this).is(':checked')){
            ids.push(this.value);
        }
    })
    if(ids.length > 0){
        var form = [{name:"ids", value:JSON.stringify(ids)}];
        var url = window.location.origin+"/index.php/main/";
        $.ajax({
            type: 'POST',
            url: url + 'deleteLogs/',
            data: form,
            success: function(o) {
                location.replace(url+"getTransaction/transactions");
            }
        });
    }else{
        showPopUp("None Selected");
    }
}

function deleteAllQR(){
    var ids = [];
    $('.checkBoxTransction').each(function(){
        if($(this).is(':checked')){
            ids.push(this.value);
        }
    })
    if(ids.length > 0){
        var form = [{name:"ids", value:JSON.stringify(ids)}];
        var url = window.location.origin+"/index.php/main/";
        $.ajax({
            type: 'POST',
            url: url + 'deleteQR/',
            data: form,
            success: function(o) {
                location.replace(url+"manage_qr_code");
            }
        });
    }else{
        showPopUp("None Selected");
    }
}

function deleteAllUser(admin){
    var ids = [];
    $('.checkBoxTransction').each(function(){
        if($(this).is(':checked')){
            ids.push(this.value);
        }
    })
    if(ids.length > 0){
        var form = [{name:"ids", value:JSON.stringify(ids)}];
        var url = window.location.origin+"/index.php/main/";
        $.ajax({
            type: 'POST',
            url: url + 'deleteAllUser/',
            data: form,
            success: function(o) {
                if(admin === 1){
                    location.replace(url+"get_all_admin");
                }else{
                    location.replace(url+"get_all_users");
                }
            }
        });
    }else{
        showPopUp("None Selected");
    }
}

function showPassword(id,o){
    $(o).hide();
    $('#'+id).show();
}