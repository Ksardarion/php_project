<?php
//current page
$page = $_GET['page'];
//all page count
$sql = "SELECT COUNT(*) FROM `contacts` WHERE `id`= '$user_id'";
$p_count = mysqli_query($db,$sql);
$p_count2 = mysqli_fetch_row($p_count);
$total = intval(($p_count2[0] - 1) / $ipp) + 1;
$page = intval($page);
if (empty($page) or $page < 0) $page = 1;
	if ($page > $total) $page = $total;
$start = $page * $ipp - $ipp;


$sql = "SELECT * FROM `contacts` WHERE `id` = '$user_id' LIMIT $start, $ipp";
$p_conts = mysqli_query($db,$sql);
while ($p_conts2 = mysqli_fetch_array($p_conts))
?>