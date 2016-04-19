<?php
if (!empty($user_id)) {
	$sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
	$q = mysqli_query($db,$sql);
	$user = mysqli_fetch_assoc($q);
	$sql = "SELECT * FROM `contacts` WHERE `user_id` = '$user_id'";
	$q = mysqli_query($db,$sql);
	$contacts = mysqli_fetch_assoc($q);
}
?>