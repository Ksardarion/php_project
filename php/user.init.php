<?php
if (!empty($user_id)) {
	$sql = "SELECT * FROM `contacts` WHERE `user_id` = '$user_id'";
	$q = mysqli_query($db,$sql);
	$contacts = mysqli_fetch_assoc($q);
}
?>