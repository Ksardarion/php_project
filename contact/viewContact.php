<?php
include_once ("../php/init.php");
if (empty($user_id)) {
  exit("You are not authorize. Please <a href='/'>sign in</a> or <a href='reg'>sign up</a>");
} else {
	if (isset($_GET['cid'])) {
		$cid = $_GET['cid'];
		$sql = "SELECT * FROM `contacts` WHERE `id` = '$cid'";
		$q = mysqli_query($db,$sql);
		$contact = mysqli_fetch_assoc($q);
		if ($contact['user_id'] != $user_id) {
			exit("Is not your contact!");
		}
		?>
		<link rel="stylesheet" href="/public/css/viewContact.css">
		<div class="wrap">
		<div class="table-cnt">
		<div class="header"><?echo $contact['firs_name']." ".$contact['last_name']?></div>
		<table cellspacing="0">
     		<tr><td>ID</td><td># <?echo $contact['id']?></td></tr>
    		<tr><td>Name</td><td><?echo $contact['firs_name']?> <?echo $contact['last_name']?></td></tr>
    		<tr><td>Birthday</td><td><?echo $contact['birthday']?></td></tr>
    		<tr><td>E-mail</td><td><?echo $contact['email']?></td></tr>
    		<tr><td>Best phone</td><td><?echo $contact[$contact['best_phone'].'_phone']?></td></tr>
    		<tr><td>Address 1</td><td><?echo $contact['address_1']?></td></tr>
    		<tr><td>Address 2</td><td><?echo $contact['address_2']?></td></tr>
    		<tr><td>Country</td><td><?echo $contact['country']?></td></tr>
    		<tr><td>State</td><td><?echo $contact['state']?></td></tr>
    		<tr><td>ZIP</td><td><?echo $contact['zip']?></td></tr>
   		</table>
		</div>
		<div class="btn-cont">
   			<div class="btn-snd btn"></div>
   			<div class="btn-set btn"></div>
		</div>
		</div>
		<?php
	} else {
		exit("You are not select a contact");
	}
}
?>