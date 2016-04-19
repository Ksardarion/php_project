<?php 

require_once ("init.php");

$q = array('fname', 'lname', 'email', 'home', 'work', 'cell', 'address1', 'address2', 'city', 'zip', 'country', 'bday'); 

foreach ($q as $key => $value) { 

	$_POST[$key] = trim($value); 

}
if ((empty($_POST['email']) || empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['home']) || empty($_POST['work']) || empty($_POST['cell']) || empty($_POST['address1']) || empty($_POST['address2']) || empty($_POST['city']) || empty($_POST['state']) || empty($_POST['zip']) || empty($_POST['country']) || empty($_POST['bday'])) && $_GET['act'] != 'del'){ 

	echo "Please enter all fields"; 

	exit(); 

} elseif(isset($_GET['act']) && $_GET['act'] === 'add') {

	$sql = "INSERT INTO `contacts` (`user_id`, `firs_name`, `last_name`, `email`, `best_phone`, `home_phone`, `work_phone`, `cell_phone`, `address_1`, `address_2`, `city`, `state`, `zip`, `country`, `birthday`)
	VALUES ('$user_id', '" . $_POST['fname'] . "', '" . $_POST['lname'] . "', '" . $_POST['email'] . "', '" . $_POST['bphone'] . "', '" . $_POST['home'] . "', '" . $_POST['work'] . "', '" . $_POST['cell'] . "', '" . $_POST['address1'] . "', '" . $_POST['address2'] . "', '" . $_POST['city'] . "', '" . $_POST['state'] . "', '" . $_POST['zip'] . "','" . $_POST['country'] . "','" . $_POST['bday'] . "')";

	$addNewContact = mysqli_query($db, $sql); 

} elseif(isset($_GET['act']) && $_GET['act'] === 'edit' && isset($_GET['cid'])) {
	$sql = "UPDATE `contacts` SET `firs_name` = '" . $_POST['fname'] . "', `last_name` = '" . $_POST['lname'] . "', `email`= '" . $_POST['email'] . "', `best_phone` = '" . $_POST['bphone'] . "', `home_phone` = '" . $_POST['home'] . "', `work_phone` = '" . $_POST['work'] . "', `cell_phone` = '" . $_POST['cell'] . "', `address_1` = '" . $_POST['address1'] . "', `address_2` = '" . $_POST['address2'] . "', `city` = '" . $_POST['city'] . "', `state` = '" . $_POST['state'] . "', `zip` = '" . $_POST['zip'] . "', `country` = '" . $_POST['country'] . "', `birthday` = '" . $_POST['bday'] . "' WHERE `id` = '".$_GET['cid']."' AND `user_id` = '$user_id'";
	$editContact = mysqli_query($db, $sql);
}
if(isset($_GET['act']) && $_GET['act'] === 'del' && isset($_GET['cid'])) {
	$sql = "DELETE FROM `contacts` WHERE `id` = '".$_GET['cid']."' AND `user_id` = '$user_id'";
	$delContact = mysqli_query($db, $sql);
}

if(!$addNewContact && !$editContact && !$delContact){ 

	print("Error");#. mysqli_error(); 

} else { 

	header("location: ../"); 

}

?>