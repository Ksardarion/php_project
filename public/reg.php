<?php
include_once ("../php/init.php");
if (!empty($user_id)) {
  exit("Sorry ".$user_login.", but you have a account. <a href='/'>To my page</a>");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" href="reg.css">
</head>
<body>
  <div class="container">
    <div class="title">
    	<h1>Start page</h1>
    	<p>of contact mannager</p>
    </div>
    <form action="../php/save_user.php" method="post">
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
    	  <div class="fancy-input">
    	    <div class="input-container">
    	      <input type="password" required="required" name="password2"/>
    	      <label data-placeholder="Confirm password" data-placeholder-short="Pass 2"><span class="sr-only">Confirm password</span></label>
    	    </div>
    	  </div>
    	  <input type="submit" value="login"/>
    	</div>
    </form>
  <div>
</body>
</html>

