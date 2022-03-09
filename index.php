<!DOCTYPE html>
<html lang="en" id="welcome_page">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8"/>
		<meta name="description" content="Login and signup forms">
		<title>Sign in</title>
		<link rel="stylesheet" href="styles.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
		<script src="register.js"></script>
		<script src="login.js"></script>
		<script src="forgot_password.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>

	</head>

	<body>  
		<?php include('login_form.html') ?>
		<?php include('registration_form.html') ?>
		
		
		<script>
		/*make registration form hidden if login form is visible*/
			function tog_nav() {
				var element1 = document.getElementById("registration_form");
				var element2 = document.getElementById("login_form");
				if (element1.style.display == "none") {
					element1.style.display = "block";
					element2.style.display = "none";
					$(document).prop('title', 'Sign up')
					}				
				}		
		</script>
		<script>
		/*make login form hidden if registration form is visible*/
			function tog_nav2() {
				var element2 = document.getElementById("registration_form");
				var element1 = document.getElementById("login_form");
				if (element1.style.display == "none") {
					element1.style.display = "block";
					element2.style.display = "none";
					$(document).prop('title', 'Sign in')
				}
			}
		</script>
		<!-- if JavaScript is blocked, warn user that it's required for full functionality -->
		<noscript style="top:0.5rem"> 
			<div id="noscript-warning"  alt="" class='header' style="top:1rem">This website works best with JavaScript enabled</div> </noscript>
		
	</body>
</html>
