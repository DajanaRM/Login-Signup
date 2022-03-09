$(document).ready(function () {
  $("#reset_password").submit(function (event) {
	   $("input").removeClass("has-error");
	   $(".error").html('');
	   var resetEmail = $('#resetEmail').val()
	   formData = $("#reset_password").serialize();
		console.log(resetEmail);


$.ajax({

        type:"POST",
        url:'??????', /* <----mailer file path*/
		data: formData,
		dataType: "json",
		encode: true
   
        }).done(function (data) {
			console.log(data);
			if (!data.success) {
				console.log(data.errors.resetEmail)
				if (data.errors.resetEmail) {
					$("#resetEmail").addClass("has-error");
					$("#email_err").append(
					'<div role="img" tabindex="0" aria-label="' + data.errors.resetEmail +' "><img src="icons/ic_error_outline_black_18dp.png"/></div>' );
				}}
				
				else window.location = 'forgot_password_form.html?email='+resetEmail;
				})
				.fail(function (data) {
					$("#reset_password").html(
					'<div class="login_form">Could not reach server, please try again later.</div>'
					);
				});
				event.preventDefault();
		})
})
