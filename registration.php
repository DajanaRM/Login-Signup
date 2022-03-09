<?php

$errors = [];
$data = []; 
$username = $fname = $lname = $reg_email = $reg_password = $confirm_password = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	/*check if input field is empty*/
	if($_POST['username'] == 'NULL'){
	$errors['username'] = "Please enter username.";
	 
	}
	/*check the input*/
	elseif(!preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
		$errors['username'] = "Username can only contain letters, numbers, and underscores.";
	} else{
		/*check if username exists in database, connection to database required!!! */
		/*query goes here*/
		/*if username is taken statement goes here: */
			/*$errors['username'] = "Username already exist";*/
		/*} else {
			} $username = test_input($_POST["username"]);*/
	}   
	
	if(empty($_POST["fname"])){
		$errors['fname'] = "Please enter your first name.";
	   
	}
	else if(!preg_match("/^[a-zA-Z-' \-]*$/",$_POST['fname'])){
		$errors['fname'] = "Only letters and white space allowed.";
	}
	else {
		$fname = test_input($_POST["fname"]);
	}

	if(empty($_POST["lname"])){
		$errors['lname'] = "Please enter your last name.";
	   
	}
	else if(!preg_match("/^[a-zA-Z-' \-]*$/",$_POST['lname'])){
		$errors['lname'] = "Only letters and white space allowed.";
	}
	else {
		$lname = test_input($_POST["lname"]);
	}

	if(empty($_POST['reg_email'])) {
	$errors['reg_email'] = "Please enter email.";
		   }
	/*check email format*/
	elseif(filter_var($_POST['reg_email'], FILTER_VALIDATE_EMAIL) === false){
		$errors['reg_email'] = "Invalid email address.";
	}	   
	else{
		/*check if email exists in database, connection to database required!!! */
		/*query goes here*/
		/*if email is already registered statement goes here: */
			/*$errors['reg_email'] = "Email already registered";*/
	  /*}       
		else $reg_email = test_input($_POST["reg_email"]);*/
	}
	if(empty($_POST['reg_password'])){
	   $errors['reg_password'] = "Please enter password.";
	}
	elseif(strlen(trim($_POST["reg_password"])) < 6){
		$errors['reg_password'] = "Password must have atleast 6 characters.";
	} else{
		$reg_password = $_POST["reg_password"];
	}
  
	if(empty($_POST["confirm_password"])){
		$errors['confirm_password'] = "Please confirm password.";     
	} else{
		$confirm_password = test_input($_POST["confirm_password"]);
		if(empty($reg_password_err) && ($reg_password != $confirm_password)){
			$errors['confirm_password'] = "Passwords did not match.";
		}
	  }
	}
	/*function to test inputs*/
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	if(empty($errors)){
	$password = password_hash($_POST["reg_password"],PASSWORD_DEFAULT);
	/* insert into database here */
	$data['success'] = true;
	$data['message'] = 'Success! Log in to continue';
	
	} else{
		  $data['success'] = false;
		  $data['errors'] = $errors;
	}
	echo json_encode($data); 
?>
