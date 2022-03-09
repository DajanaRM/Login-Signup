$(document).ready(function () {
	$("#registration_form").submit(function (event) {

		$("input").removeClass("has-error");
		$(".error").html('');

		formData = $("#registration_form").serialize();
		console.log(formData);


		$.ajax({
			type: "POST",
			url: "registration.php",
			data: formData,
			dataType: "json",
			encode: true,
		}).done(function (data) {
			console.log(data);



			if (!data.success) {
				if (data.errors.fname) {
					$("#fname").addClass("has-error");
					$("#fname_err").append(
						'<div role="img" tabindex="0" aria-label="' + data.errors.fname + ' "><img src="icons/ic_error_outline_black_18dp.png"/></div>'
					);
				}

				if (data.errors.lname) {
					$("#lname").addClass("has-error");
					$("#lname_err").append(
						'<div role="img" tabindex="0" aria-label="' + data.errors.lname + ' "><img src="icons/ic_error_outline_black_18dp.png"/></div>'
					);
				}

				if (data.errors.username) {
					$("#username").addClass("has-error");
					$("#username_err").append(
						'<div role="img" tabindex="0" aria-label="' + data.errors.username + ' "><img src="icons/ic_error_outline_black_18dp.png"/></div>'
					);
				}



				if (data.errors.reg_email) {
					$("#reg_email").addClass("has-error");
					$("#reg_email_err").append(
						'<div role="img" tabindex="0" aria-label="' + data.errors.reg_email + ' "><img src="icons/ic_error_outline_black_18dp.png"/></div>'
					);
				}


				if (data.errors.reg_password) {
					$("#reg_password").addClass("has-error");
					$("#reg_password_err").append(
						'<div role="img" tabindex="0" aria-label="' + data.errors.reg_password + ' "><img src="icons/ic_error_outline_black_18dp.png"/></div>'
					);
				}


				if (data.errors.confirm_password) {
					$("#confirm_password").addClass("has-error");
					$("#confirm_password_err").append(
						'<div role="img" tabindex="0" aria-label="' + data.errors.confirm_password + ' "><img src="icons/ic_error_outline_black_18dp.png"/></div>'
					);
				}

			} else {

				window.location = 'index.php?r=' + new Date().getTime();
				alert('Succesfully Registered. Login to continue');
			}

		})
			.fail(function (data) {
				$("registration_form").html(
					'<div class="alert alert-danger">Could not reach server, please try again later.</div>'
				);
			});

		event.preventDefault();
	});
});
