<?php
include_once ("php/init.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>I-24 CM</title>
	<link rel="stylesheet" href="public/css/reg.css">
	<script src="public/js/reg.js"></script>
</head>

<body>
<?php
if (!empty($user_id)) {
	echo "Hello ".$user_login;
	echo "<a href='addContact'>Add contact</a>";
	echo "<a href='exit?yes'>LogOut</a>";
	include_once ("php/contactList.php");
?>

<?php
} else {
?>
	<div class="container">
		<div class="title">
	  		<h1>Start page</h1>
	  		<p>of contact mannager</p>
		</div>
		<form id="authForm" action="php/login" method="post">
			<div class="reg-cont">
				<div class="fancy-input">
				  <div class="input-container">
				    <input required="required" name="login"/>
				    <label data-placeholder="Username" data-placeholder-short="Login"><span class="sr-only">Username</span></label>
				  </div>
				</div>
				<div class="fancy-input">
				  <div class="input-container">
				    <input type="password" required="required" name="password"/>
				    <label data-placeholder="Password" data-placeholder-short="Pass"><span class="sr-only">Password</span></label>
				  </div>
				</div>
				<div class="fancy-input hide" style="display: none;">
				  <div class="input-container">
				  	<input type="password" id="pass2" name="password2"/>
				  	<label data-placeholder="Password confirm" data-placeholder-short="confirm"><span class="sr-only">Password confirm</span></label>
				  </div>
				</div>
				<input type="submit" value="login"/>
			</div>
		</form>
		<a href="#" id="signup">registration</a>
	<div>
<?php } ?>
</body>

</html>

