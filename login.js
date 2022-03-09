$(document).ready(function () {
	$("#login_form").submit(function (event) {
		$("input").removeClass("has-error");		
		$(".error").html('');
		/*create data from input fields' names*/
		formData = $("#login_form").serialize();
		console.log(formData);


		$.ajax({
			type: "POST",
			url: "login_validation.php",
			data: formData,
			dataType: "json",
			encode: true,
		}).done(function (data) {
			console.log(data);



			if (!data.success) {
				if (data.errors.user) {
					$("#user").addClass("has-error");
					/*return errors*/
					$("#user_err").append(
						'<div role="img" tabindex="0" aria-label="' + data.errors.user + ' "><img src="icons/ic_error_outline_black_18dp.png"/></div>');

				}

				if (data.errors.pass) {
					$("#pass").addClass("has-error");
					$("#pass_err").append(
						'<div role="img" tabindex="0" aria-label="' + data.errors.pass + ' "><img src="icons/ic_error_outline_black_18dp.png"/></div>');

				}
			}

			else {

				window.location.replace("main.php");


			}

		})
			.fail(function (data) {
				$("login_form").html(
					'<div class="login_form">Could not reach server, please try again later.</div>'
				);
			});

		event.preventDefault();
	});
});