<?php include ('db.php');
  $login = $_REQUEST['login'];
  $password = $_REQUEST["password"];
  $user_err =  $password_err = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(trim($login) == 'NULL'){
		$user_err = "Please enter username.";  
	}
	else{
		$login = test_input($login);
	}
	if(empty($_POST['password'])){
	   $password_err = "Please enter password";
	}
	else $password = test_input($password);
	}
  
	function test_input($data) {
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}
	if(empty($user_err) && empty($password_err)) {
		 $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
		 /*query goes here*/
    /*if there is username that matches password go to main page*/
		if(isset($username)){
			 header('Location: main.php');
		}
	}
	/*if username or email and password combination is not good try again */
	else
	   header('Location: login.html?user_err='.$user_err.'&password_err='.$password_err);
?>