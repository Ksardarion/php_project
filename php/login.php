<?php
session_start();
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

if (empty($login) or empty($password))
{
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


include ("./bd.php");


$result = mysql_query("SELECT * FROM users WHERE login='$login'",$db);
$myrow = mysql_fetch_array($result);
if (empty($myrow['password'])) {
	exit ("Користувача з таким логіном не знайдено");
} else {
    if ($myrow['password']==$password) {
    	$_SESSION['login']=$myrow['login']; 
    	$_SESSION['id']=$myrow['id'];
    	echo "Ви успішно авторизовані! Зараз ви будете перенаправлені на головну";
    	header('Location: '.$_SERVER['HTTP_REFERER']);
    } else {
       exit ("Ви ввели невірний пароль");
	}
}
?>