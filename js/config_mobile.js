/*$(document).ready(function(){
	$('#ui-datepicker-div').css('background','#cccddd');
});*/





function callContollerFuntion(url,form){
    var myData = $("#"+form).serialize();
    $.ajax({
        type: 'post',
        url: url,
        data: myData,
        success:function(msg){
        	console.log(msg);
    		$("#content").html(msg);
    		$( "#sign_up_pop" ).popup();
    		$( "#sign_up_pop" ).trigger("create");
    		$( "#sign_up_pop" ).popup('open');
    		if(msg=="<b> <font color='red'> Request for Account Sent For Approval </font> </b>"){
    			window.location = "/TechLabInventory/index.php/main/mobileSignUp";
    		}
        }
    });
}



function changePassword(){
	var msg ='';
	if($('#oldpassword').val().trim().length == 0 || $('#newpassword').val().trim().length == 0 || 
			$('#confirmpassword').val().trim().length ==0){
		msg = ' All Fields Required ';
		pop(msg);
	}else{
		if($('#newpassword').val() != $('#confirmpassword').val()){
			msg = ' New and Confirm Password not the same ';
			pop(msg);
		}else{
				$.ajax({
					   type: 'POST',
					   url: 'changePasswordMobile/'+$('#newpassword').val()+'/'+$('#oldpassword').val(),
					   success: function(content) {
						   pop(content);
						   $( "#change_password_up_pop" ).popup('close');
						   
					   }
				   });
		}
	}
	
	/*$("#content").html(msg);
	$( "#change_password_up_pop").popup();
	$( "#change_password_up_pop").trigger("create");
	$( "#change_password_up_pop").popup('open');*/
	
}

function showPhotoDetail(photo_path,description){
	
	//$("#content").html(msg);
	//item_photo
	$('#item_photo').attr('src',photo_path);
	$("#item_description").text(description);
	$( "#show_item_detail" ).popup();
	$( "#show_item_detail" ).trigger("create");
	$( "#show_item_detail" ).popup('open');
	
	

}


function borrowItemMobile(user_id){
	
	var parameter='';
	var checker = false;
	var redirect = 0;
	$('.itemtoborrow').each(function( index,item) {
	  
	   var limit = this.size;
	   if(limit >= this.value && this.value != 0 && this.value != ''){
		   var value = this.name.split(",");
		   var tool_id = value[0];
		   var category_id = value[1];
		   parameter = parameter+user_id+'.'+this.value+'.'+tool_id+':'
		   console.log(parameter);
		   checker = true;
	   }
	 });
	
	if(checker){
		parameter = parameter.substring('', parameter.length - 1);
		//alert(parameter);
		//20.1.26:20.1.27
		$.ajax({
			   type: 'POST',
			   url: 'borrow/'+parameter,
			   //data: 'oldpassword=' + $('#oldpass').val() + '&&' + 'newpassword1=' + $('#newpass1').val() + '&&' + 'newpassword2=' + $('#newpass2').val(),
			   success: function(msg) {
				   //alert('redirect final value'+msg);
					if(msg == 0){
						//requestSent();
						//alert('Request Sent')
						//alert("viewItemBeforeBorrow/"+parameter);
						window.location.replace("viewItemBeforeBorrow/"+parameter);
						
					}else{
						window.location.replace("userPendingItems/"+user_id);
					}
			   }
		   });
	}
	//alert('this is the final value of checker ' + checker);
}

function addToCartMobile(id){
	if($(id).val().trim().length == 0){
		pop('Quantity Needed');
	}else{
		if($(id).val() > parseInt($(id).attr('class'))){
			pop('Remaining Item Not Enough');
		}else{
		   var value = $(id).attr('name').split(",");
		   var tool_id = value[0];
		   var category_id = value[1];
		   var parameter = tool_id+'.'+$(id).val();
		   
		   $.ajax({
			   type: 'POST',
			   url: 'addToCart/'+parameter,
			   success: function(msg) {
				   pop('Added To Cart');
				   $(id).val('')
			   }
		   });
			
		}
		
	}
	
}



function editToolQuantity(id){
	if($(id).val().trim().length == 0 || $(id).val() ==0 ){
		alert('Quantity Needed');
	}else{
		if($(id).val() > parseInt($(id).attr('class'))){
			alert('Remaining Item Not Enough');
		}else{
		   var value = $(id).attr('name').split(",");
		   var tool_id = value[0];
		   var category_id = value[1];
		   var parameter = tool_id+'.'+$(id).val();
		   
		   $.ajax({
			   type: 'POST',
			   url: 'editCart/'+parameter,
			   success: function(msg) {
				   $(id).val('');
				   alert('Quantity Updated');
				   window.location.reload();
				   
				    
			   }
		   });
			
		}
		
	}
}

function cancelRequest(tool_id){
	 $.ajax({
		   type: 'POST',
		   url: 'cancelCartRequestMobile/'+tool_id,
		   success: function(msg) {
			   $('#location_edit').val('viewCart');
			   pop('Request Cancelled');
			   window.location.reload();
		   }
	   });
}

function setBgForDatePicker(){
	$('#ui-datepicker-div').css('background','#cccddd');
}


function showSearch(){
	$( "#show_search_item" ).popup();
	$( "#show_search_item" ).trigger("create");
	$( "#show_search_item" ).popup('open');
}

function showConfirmed(){
	$( "#confirmed_request").popup();
	$( "#confirmed_request").trigger("create");
	$( "#confirmed_request").popup('open');
}

function confirmCart(){
	   // var myData = $("#confirmRequestMobile").serialize();
	    //alert($("#confirmRequestMobile").serialize());
	    $.ajax({
	        type: 'post',
	        url: 'confirmRequestMobile',
	        data: $("#confirmRequestMobile").serialize(),
	        success:function(msg){
	        	alert('TOOLS/EQUIPMENT REQUEST SENT');
	        	window.location.replace("mobileContent/");
	        }
	    });
	}

function popWithWindowsReplace(message){

	var asd = "<table align='center'> <tr> <td align='center'> <span class='ui-bar ui-overlay-c ui-corner-all'> <h1>"+message+" </h1> </span> </td></tr> <tr><td align='center'> <button onclick='hidesWithWindowsReplace('mobileContent/')' id='alert_ok' class='myButton'> close </button> </td></tr></table>";
	  
	
	var $this = $( this ),
			theme = $this.jqmData("theme") || $.mobile.loader.prototype.options.theme,
			msgText = $this.jqmData("msgtext") || $.mobile.loader.prototype.options.text,
			textVisible = $this.jqmData("textvisible") || $.mobile.loader.prototype.options.textVisible,
			textonly = !!$this.jqmData("textonly");
			html = $this.jqmData("html") || "";
			
		$.mobile.loading( 'show', {
				text: "hello",
				textVisible: "textvisible",
				theme: theme,
				textonly: textonly,
				html: asd
		});
	
	}


function hidesWithWindowsReplace(location){
alert(location);
$.mobile.loading( 'hide' );
disable();
$.mobile.loading( 'hide' );
window.location.replace("mobileContent/");
}


function pop(message){

		var asd = "<table align='center'> <tr> <td align='center'> <span class='ui-bar ui-overlay-c ui-corner-all'> <h1>"+message+" </h1> </span> </td></tr> <tr><td align='center'> <button onclick='hides()' id='alert_ok' class='myButton'> close </button> </td></tr></table>";
		  
		
		var $this = $( this ),
				theme = $this.jqmData("theme") || $.mobile.loader.prototype.options.theme,
				msgText = $this.jqmData("msgtext") || $.mobile.loader.prototype.options.text,
				textVisible = $this.jqmData("textvisible") || $.mobile.loader.prototype.options.textVisible,
				textonly = !!$this.jqmData("textonly");
				html = $this.jqmData("html") || "";
				
			$.mobile.loading( 'show', {
					text: "hello",
					textVisible: "textvisible",
					theme: theme,
					textonly: textonly,
					html: asd
			});
		
		}


function hides(){
	$.mobile.loading( 'hide' );
	disable();
	$.mobile.loading( 'hide' );
	}



function redirectSignUp(){
	
	
	
	
}