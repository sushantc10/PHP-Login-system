$(document).on('submit','form.js-register',function(event){
	event.preventDefault();
	var _form = $(this);
	var _error = $('.js-error',_form);
	var dataObj = {
		email:$('input[type="email"]',_form).val(),
		password:$('input[type="password"]',_form).val()
	}

	if(dataObj.email.length < 6){ 
		_error
			.text('Please enter a valid email address..')
			.show();
			return false;
	}else if(dataObj.password.length < 8){
		_error
			.text('Please enter password that is atleast 8 character long..')
			.show();
			return false;
	}
	_error.hide();

	$.ajax({
		type:'POST',
		url:'php_login_system/ajax/register.php',
		data:dataObj,
		dataType:'json',
		asynch:true
	})
	.done(function ajaxDone(data){
		console.log(data);
		if(data.redirect != undefined){
			alert();
			window.location = data.redirect;
		}
	})
	.fail(function ajaxFailed(){
		console.log(e);
	})
	.always(function ajaxAlwaysDoThis(data){
		console.log('Always');
	})
	return false;
})