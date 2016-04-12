<?php

require_once ("init.php");



if (isset($_POST['login'])) { 

	$login = $_POST['login']; 

	if ($login == '') { 

		unset($login);

	} 

}

if (isset($_POST['password'])) { 

	$password=$_POST['password']; 

	if ($password =='') {

	 unset($password);

	} 

}

if (isset($_POST['password2'])) { 

	$password2=$_POST['password2']; 

	if ($password2 =='') {

	 unset($password2);

	} 

}



if (empty($login) or empty($password) or empty($password2)){

	exit ("Please enter all fields");

}

if ($password != $password2) {

	exit ("Confirm password incorrect");

}

//some protection for our site :)

$login = stripslashes($login);

$login = htmlspecialchars($login);

$password = stripslashes($password);

$password = htmlspecialchars($password);

$login = trim($login);

$password = trim($password);

if (strlen($login) < 3 or strlen($login) > 32) {

	exit ("Логін повинен складатися не менш ніж з 3 символів, і не більше ніж з 32");

}

if (strlen($password) < 3 or strlen($password) > 32) {

	exit ("Пароль повинен складатися не менш ніж з 3 символів, і не більше ніж з 32");

}

//some protection for user password

$password = md5($password);

$password = strrev($password);   

$password = $password."b3p6f";



//show error if user with this login are exist

$sql = "SELECT id FROM users WHERE login='$login' LIMIT 1";

$q = mysqli_query($db,$sql);

$userToRegErr = mysqli_fetch_array($q);

if (!empty($userToRegErr['id'])) {

	exit ("Entered login are exist");

}

//all ok. We can create new account

$sql = "INSERT INTO `users` (`login`,`password`) VALUES('$login','$password')";

$q = mysqli_query ($db,$sql);

if ($q=='TRUE'){
	$sql = "SELECT * FROM users WHERE login='$login' LIMIT 1";
	$q = mysqli_query($db,$sql);
	$user = mysqli_fetch_array($q);
	$_SESSION['user']['login']=$login; 

    $_SESSION['user']['id']=$user['id'];

	echo "Registration success";

	header('Location: ../');

} else {

	echo "We have some troubles. Please, try again";

}

?>