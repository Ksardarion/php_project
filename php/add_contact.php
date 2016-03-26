<?php 
require_once('conf.php'); 
require_once('session.php'); 
$fields = array('fname', 'lname', 'email', 'home', 'work', 'cell', 'address1', 'address2', 'city', 'zip', 'country', 'bday'); 
foreach ($fields as $key => $value) { 
$_POST[$key] = trim($value); 
} 
$res_dump = mysqli_query($db, "SELECT * FROM `contacts` WHERE `login` = '" . $_SESSION['login'] . "' "); 
if (empty($_POST['login']) || empty($_POST['email']) || empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['home']) || empty($_POST['work']) || empty($_POST['cell']) || empty($_POST['address1']) || empty($_POST['address2']) || empty($_POST['city']) || empty($_POST['state']) || empty($_POST['zip']) || empty($_POST['country']) || empty($_POST['bday'])){ 
echo "enter all fields"; 
exit(); 
} else { 
$login = $_SESSION['login']; 
$addNewContact = mysqli_query($db, "INSERT INTO `contacts` (`login`, `firstname`, `lastname`, `email`, `home`, `work`, `cell`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `bday`) 
VALUES ('$login', '" . $_POST['fname'] . "', '" . $_POST['lname'] . "', '" . $_POST['email'] . "', '" . $_POST['home'] . "', '" . $_POST['work'] . "', '" . $_POST['cell'] . "', '" . $_POST['address1'] . "', '" . $_POST['address2'] . "', '" . $_POST['city'] . "', '" . $_POST['state'] . "', '" . $_POST['zip'] . "','" . $_POST['country'] . "','" . $_POST['bday'] . "')"); 

if(!$addNewContact){ 
print("Error");#. mysqli_error(); 
} 
else { 
header("location: user-page.php"); 

}
php>