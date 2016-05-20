<?php
include_once ("../php/init.php");
if (empty($user_id)) {
  exit("You are not authorize. Please <a href='/'>sign in</a> or <a href='reg'>sign up</a>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create new event</title>
  <link rel="stylesheet" href="/public/css/addContact.css">
  <script src="/public/js/printEmail.js"></script>
</head>
<body>
<div class="title">
  <h1>new event</h1>
  <p>Please, enter only real email`s</p>
</div>
<form action="/php/spam.php" method="post">
<div class="fancy-input">
  <div class="input-container">
    <input id="eCapt" pattern=".{3,}" required="required" name="eCapt" />
    <label class="ilab" data-placeholder="Event Caption" data-placeholder-short="Caption"><span class="sr-only">Event Caption</span></label>
  </div>
</div>
  <textarea name="eMails" id="eMails" cols="30" rows="10"></textarea>
  <textarea name="eText" id="eText" cols="30" rows="10"></textarea>
  <input type="submit" value="send" id="send">
  </form>
</body>
</html>