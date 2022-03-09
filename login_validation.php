<?php
	session_start();
 
	$errors = [];
	$data = []; 
	$user =  $password = '';

	if(empty($_POST['user'])){
	   $errors['user'] = "Please type your username or e-mail.";
	}
	if(empty($_POST['pass'])){
	   $errors['pass'] = "Please type your password.";
	}

	$user = $_POST['user'];
	$user = trim($user);
	   /*sql query goes here, select a user with such an email or username, then verify the password, return errors if any */
		if (empty($errors)) {
			/*if login was successful */
			session_regenerate_id();
			$_SESSION['loggedin'] = true;
			$_SESSION['name'] = $username;
			$_SESSION['fname'] = $fname;
			$_SESSION['email'] = $email;
			$_SESSION['user_id'] = $user_id;
			$data['success'] = true;
			$data['message'] = 'Success!';
			$stmt->close(); 
		} 
		else{
		  $data['success'] = false;
		  $data['errors'] = $errors;
		}
		echo json_encode($data); 
   ?>