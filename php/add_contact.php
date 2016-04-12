<?php 
<<<<<<< HEAD

require_once ("init.php");

$q = array('fname', 'lname', 'email', 'home', 'work', 'cell', 'address1', 'address2', 'city', 'zip', 'country', 'bday'); 

foreach ($q as $key => $value) { 

	$_POST[$key] = trim($value); 

}
if (empty($_POST['email']) || empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['home']) || empty($_POST['work']) || empty($_POST['cell']) || empty($_POST['address1']) || empty($_POST['address2']) || empty($_POST['city']) || empty($_POST['state']) || empty($_POST['zip']) || empty($_POST['country']) || empty($_POST['bday'])){ 

	echo "Please enter all fields"; 

	exit(); 

} else {

	$sql = "INSERT INTO `contacts` (`user_id`, `firs_name`, `last_name`, `email`, `best_phone`, `home_phone`, `work_phone`, `cell_phone`, `address_1`, `address_2`, `city`, `state`, `zip`, `country`, `birthday`)
	VALUES ('$user_id', '" . $_POST['fname'] . "', '" . $_POST['lname'] . "', '" . $_POST['email'] . "', '" . $_POST['bphone'] . "', '" . $_POST['home'] . "', '" . $_POST['work'] . "', '" . $_POST['cell'] . "', '" . $_POST['address1'] . "', '" . $_POST['address2'] . "', '" . $_POST['city'] . "', '" . $_POST['state'] . "', '" . $_POST['zip'] . "','" . $_POST['country'] . "','" . $_POST['bday'] . "')";

	$addNewContact = mysqli_query($db, $sql); 

}

if(!$addNewContact){ 

	print("Error");#. mysqli_error(); 

} else { 

	header("location: ../"); 

}

=======
// require_once('settings.php'); 
// require_once('sess.php'); 
$q = array('fname', 'lname', 'email', 'home', 'work', 'cell', 'address1', 'address2', 'city', 'zip', 'country', 'bday'); 
foreach ($q as $key => $value) { 
	$_POST[$key] = trim($value); 
} 
$res_dump = mysqli_query($db, "SELECT * FROM `contact` WHERE `login` = '" . $_SESSION['login'] . "' "); 
if (empty($_POST['login']) || empty($_POST['email']) || empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['home']) || empty($_POST['work']) || empty($_POST['cell']) || empty($_POST['address1']) || empty($_POST['address2']) || empty($_POST['city']) || empty($_POST['state']) || empty($_POST['zip']) || empty($_POST['country']) || empty($_POST['bday'])){ 
	echo "Please enter all fields"; 
	exit(); 
} else {
	$login = $_SESSION['login']; 
	$addNewContact = mysqli_query($db, "INSERT INTO `contact` (`login`, `firstname`, `lastname`, `email`, `home`, `work`, `cell`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `bday`) 
	VALUES ('$login', '" . $_POST['fname'] . "', '" . $_POST['lname'] . "', '" . $_POST['email'] . "', '" . $_POST['home'] . "', '" . $_POST['work'] . "', '" . $_POST['cell'] . "', '" . $_POST['address1'] . "', '" . $_POST['address2'] . "', '" . $_POST['city'] . "', '" . $_POST['state'] . "', '" . $_POST['zip'] . "','" . $_POST['country'] . "','" . $_POST['bday'] . "')"); 
}
if(!$addNewContact){ 
	print("Error");#. mysqli_error(); 
} else { 
	header("location: user-page.php"); 
}
>>>>>>> refs/remotes/origin/master
?>