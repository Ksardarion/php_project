<?php
include_once ("../php/init.php");
if (empty($user_id)) {
  exit("You are not authorize. Please <a href='/'>sign in</a> or <a href='reg'>sign up</a>");
}
if (isset($_GET['cid']) && $_GET['cid'] != 0) {
  $cid = $_GET['cid'];
} else {
  exit("Without cid");
}
$sql = "SELECT * FROM `contacts` WHERE `user_id` = '$user_id' AND `id` = '$cid' LIMIT 1";
$q = mysqli_query($db,$sql);
$contact = mysqli_fetch_array($q);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit "<?echo $contact['firs_name']?> <?echo $contact['last_name']?>"</title>
	<link rel="stylesheet" href="/public/css/addContact.css">
	<script src="/public/js/validation.js"></script>
</head>
<body>
	<div class="title">
  <h1>Edit <?echo $contact['firs_name']?> <?echo $contact['last_name']?> contact</h1>
  <p>Please, enter only valid data</p>
</div>
<form action="/php/add_contact.php?act=edit&amp;cid=<? echo $_GET['cid']?>" method="post">
<div class="fancy-input">
  <div class="input-container">
    <input pattern=".{3,}" required="required" name="fname" value="<?echo $contact['firs_name']?>" />
    <label data-placeholder="<?echo $contact['firs_name']?>" data-placeholder-short="First"><span class="sr-only">First Name</span></label>
  </div>
</div>
<div class="fancy-input">
  <div class="input-container">
    <input min-length=".{3,}" required="required" name="lname" value="<?echo $contact['last_name']?>" />
    <label data-placeholder="<?echo $contact['last_name']?>" data-placeholder-short="Last"><span class="sr-only">Last Name</span></label>
  </div>
</div>
<div class="fancy-input">
  <div class="input-container">
    <input pattern=".{3,}" required="required" name="email" value="<?echo $contact['email']?>" />
    <label data-placeholder="<?echo $contact['email']?>" data-placeholder-short="mail"><span class="sr-only">E-mail</span></label>
  </div>
</div>
<div class="fancy-input">
  <div class="input-container">
    <input min-length=".{3,}" required="required" name="home" value="<?echo $contact['home_phone']?>" />
    <label data-placeholder="<?echo $contact['home_phone']?>" data-placeholder-short="Home"><span class="sr-only">Phone Home</span></label>
  </div>
</div>
<div class="fancy-input">
  <div class="input-container">
    <input pattern=".{3,}" required="required" name="work" value="<?echo $contact['work_phone']?>" />
    <label data-placeholder="<?echo $contact['work_phone']?>" data-placeholder-short="Work"><span class="sr-only">Work Phone</span></label>
  </div>
</div>
<div class="fancy-input">
  <div class="input-container">
    <input min-length=".{3,}" required="required" name="cell" value="<?echo $contact['cell_phone']?>" />
    <label data-placeholder="<?echo $contact['cell_phone']?>" data-placeholder-short="Cell"><span class="sr-only">Cell phone</span></label>
  </div>
</div>
<div>
  <div>
    <label for="bphone"></label>
    <select name="bphone">
      <option value="home" selected>Home phone</option>
      <option value="work">Work phone</option>
      <option value="cell">Cell phone</option>
    </select>
  </div>
</div>
<div class="fancy-input">
  <div class="input-container">
    <input pattern=".{3,}" required="required" name="address1" value="<?echo $contact['address_1']?>" />
    <label data-placeholder="<?echo $contact['address_1']?>" data-placeholder-short="1"><span class="sr-only">Addess 1</span></label>
  </div>
</div>
<div class="fancy-input">
  <div class="input-container">
    <input min-length=".{3,}" required="required" name="address2" value="<?echo $contact['address_2']?>" />
    <label data-placeholder="<?echo $contact['address_2']?>" data-placeholder-short="2"><span class="sr-only">Addess 2</span></label>
  </div>
</div>
<div class="fancy-input">
  <div class="input-container">
    <input pattern=".{3,}" required="required" name="city" value="<?echo $contact['city']?>" />
    <label data-placeholder="<?echo $contact['city']?>" data-placeholder-short="City"><span class="sr-only">City</span></label>
  </div>
</div>
<div class="fancy-input">
  <div class="input-container">
    <input min-length=".{3,}" required="required" name="state" value="<?echo $contact['state']?>" />
    <label data-placeholder="<?echo $contact['state']?>" data-placeholder-short="State"><span class="sr-only">State</span></label>
  </div>
</div>
<div class="fancy-input">
  <div class="input-container">
    <input pattern=".{3,}" required="required" name="zip" value="<?echo $contact['zip']?>" />
    <label data-placeholder="<?echo $contact['zip']?>" data-placeholder-short="Zip"><span class="sr-only">Zip</span></label>
  </div>
</div>
<div class="fancy-input">
  <div class="input-container">
    <input min-length=".{3,}" required="required" name="country" value="<?echo $contact['country']?>" />
    <label data-placeholder="<?echo $contact['country']?>" data-placeholder-short="Country"><span class="sr-only">Country</span></label>
  </div>
</div>
<div class="fancy-input">
  <div class="input-container">
    <input pattern="\d{4}\.\d{2}\.\d{2}" required="required" maxlength="10" id="date" name="bday" value="<?echo $contact['birthday']?>" />
    <label data-placeholder="<?echo $contact['birthday']?>" data-placeholder-short="yyyy.mm.dd"><span class="sr-only">Birthday</span></label>
  </div>
  <input type="submit" value="SAVE"/>
</div>
</form>
</body>
</html>
