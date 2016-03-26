	
	
<?php  
This repository 
Search 
Pull requests 
Issues 
Gist 
@LigeiaPoe 
Unwatch 5 
Star 0 
Fork 0 WiseEngineering/contact-raw-viyatyk PRIVATE 
Code Issues 2 Pull requests 0 Wiki Pulse Graphs 
Tree: 9ab9ddc218 Find file Copy pathcontact-raw-viyatyk/add.php 
9ab9ddc on 10 Nov 2015 
@LigeiaPoe LigeiaPoe working login & reg; modified foreach 
1 contributor 
RawBlameHistory 68 lines (55 sloc) 2.43 KB 
<form method="post" action=""> 
FirstName: 
<input type="text" name="fname" required="" /><br> 
LastName: 
<input type="text" name="lname" required=""/><br> 
E-mail: 
<input type="text" name="email" required=""/><br> 
Phone: 
Home phone: 

<input type="text" name="home"/> 
<br> 
Work Phone: 

<input type="text" name="work"/> 
<br> 
Cell phone: 

<input type="text" name="cell"/> 
<br> 
Addess 1: 
<input type="text" name="address1" required=""/><br> 
Addess 2: 
<input type="text" name="address2" required=""/><br> 
City: 
<input type="text" name="city" required=""><br> 
State: 
<input type="text" name="state" required=""/><br> 
Zip: 
<input type="text" name="zip" required=""/><br> 
Country: 
<input type="text" name="country" required=""/><br> 
Birthday: 
<input type="date" name="bday" placeholder="yyyy.mm.dd" required=""/><br> 

<input type="submit" value="ADD"/> 
</form> 

<?php 
require_once('conf.php'); 
require_once('session.php'); 
$fields = array('fname', 'lname', 'email', 'home', 'work', 'cell', 'address1', 'address2', 'city', 'zip', 'country', 'bday'); 
foreach ($fields as $key => $value) { 
$_POST[$key] = trim($value); 
} 
$res_dump = mysqli_query($mysqli, "SELECT * FROM `contacts` WHERE `login` = '" . $_SESSION['login'] . "' "); 
if (empty($_POST['login']) || empty($_POST['email']) || empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['home']) || empty($_POST['work']) || empty($_POST['cell']) || empty($_POST['address1']) || empty($_POST['address2']) || empty($_POST['city']) || empty($_POST['state']) || empty($_POST['zip']) || empty($_POST['country']) || empty($_POST['bday'])){ 
echo "enter all fields"; 
exit(); 
} else { 
$login_session = $_SESSION['login']; 
$insert = mysqli_query($mysqli, "INSERT INTO `contacts` (`login`, `firstname`, `lastname`, `email`, `home`, `work`, `cell`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `bday`) 
VALUES ('$login_session', '" . $_POST['fname'] . "', '" . $_POST['lname'] . "', '" . $_POST['email'] . "', '" . $_POST['home'] . "', '" . $_POST['work'] . "', '" . $_POST['cell'] . "', '" . $_POST['address1'] . "', '" . $_POST['address2'] . "', '" . $_POST['city'] . "', '" . $_POST['state'] . "', '" . $_POST['zip'] . "','" . $_POST['country'] . "','" . $_POST['bday'] . "')"); 

if(!$insert){ 
print("Error");#. mysqli_error(); 
} 
else { 
header("location: user-page.php"); 

}
php>