<?php
include_once ("php/init.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>I-24 CM</title>
	<link rel="stylesheet" href="public/css/reg.css">
	<link rel="stylesheet" href="public/css/contactList.css">
	<script src="public/js/reg.js"></script>
	<script src="public/js/sess.js"></script>
</head>

<body>

<?php
if (!empty($user_id)) {
?>
<link rel="stylesheet" type="text/css" href="public/css/component.css" />
<?php
	include_once ("php/contactList.php");
?>
<div class="md-modal md-effect-11" id="modal-11">
	<div class="md-content">
		<h3>WARNING!!!</h3>
		<div>
			<p class="m-p">
			</p>
			<button class="md-ok">OK</button>
			<button class="md-close">CANCEL</button>
		</div>
	</div>
</div>
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
		<a href="#" id="signup">sign up</a>
	<div>
<?php } ?>
<div class="md-overlay"></div>
<script src="public/js/classie.js"></script>
<script src="public/js/modalEffects.js"></script>

</body>

</html>

