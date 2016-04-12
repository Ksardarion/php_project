<<<<<<< HEAD
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

$sql = "SELECT * FROM users WHERE login='$login' LIMIT 1";
$q = mysqli_query($db,$sql);
$userToAuth = mysqli_fetch_array($q);
if (empty($userToAuth['password'])) {
	exit ("Користувача з таким логіном не знайдено");
} else {
    if ($userToAuth['password']==$password) {
    	$_SESSION['user']['login']=$userToAuth['login']; 
    	$_SESSION['user']['id']=$userToAuth['id'];
    	echo "Authorization complete! Hello ".$_SESSION['user']['login'];
    	header('Location: '.$_SERVER['HTTP_REFERER']);
    } else {
       exit ("You enter wrong password");
	}
}
=======
<?php
session_start();
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
	exit ("Ви заповнили не усі дані");
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


include ("db.php");

$sql = "SELECT * FROM users WHERE login='$login' LIMIT 1";
$q = mysqli_query($db,$sql);
$userToAuth = mysqli_fetch_array($q);
if (empty($userToAuth['password'])) {
	exit ("Користувача з таким логіном не знайдено");
} else {
    if ($userToAuth['password']==$password) {
    	$_SESSION['login']=$userToAuth['login']; 
    	$_SESSION['id']=$userToAuth['id'];
    	echo "Ви успішно авторизовані! Зараз ви будете перенаправлені на головну";
    	header('Location: '.$_SERVER['HTTP_REFERER']);
    } else {
       exit ("Ви ввели невірний пароль");
	}
}
>>>>>>> refs/remotes/origin/master
?>