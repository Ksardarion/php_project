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



if (empty($login) or empty($password)){

	exit ("Please, enter all fields");

}

$login = stripslashes($login);

$login = htmlspecialchars($login);



$password = stripslashes($password);

$password = htmlspecialchars($password);



$login = trim($login);

$password = trim($password);



$password = md5($password);

$password = strrev($password);

$password = $password."b3p6f";

$remember = $_POST['remember'];

$sql = "SELECT * FROM users WHERE login='$login' LIMIT 1";

$q = mysqli_query($db,$sql);

$userToAuth = mysqli_fetch_array($q);

if (empty($userToAuth['password'])) {

	exit ("Користувача з таким логіном не знайдено");

} else {

    if ($userToAuth['password']==$password) {

    	$_SESSION['user']['login']=$userToAuth['login']; 

    	$_SESSION['user']['id']=$userToAuth['id'];
    	if ($remember) {
    		$_SESSION['user']['remember'] = true;
    	} else {
    		$_SESSION['user']['remember'] = false;
    	}

    	echo "Authorization complete! Hello ".$_SESSION['user']['login'];

    	header('Location: '.$_SERVER['HTTP_REFERER']);

    } else {

       exit ("You enter wrong password");

	}

}

?>