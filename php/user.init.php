<?php
if (!empty($user_id)) {
	$sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
	// $q = mysqli_query($db,$sql);
	$q = $db->query($sql);
	// $user = mysqli_fetch_assoc($q);
	$user = $q->fetch();
	$sql = "SELECT * FROM `contacts` WHERE `user_id` = '$user_id'";
	// $q = mysqli_query($db,$sql);
	$q = $db->query($sql);
	// $contacts = mysqli_fetch_assoc($q);
	$contacts = $q->fetch();
}
if ($user['id']) {
	$ipp = $user['ipp']; //items per page from $user. For pagination;
}
?>