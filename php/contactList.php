<?php
if ($contacts) {
	// require_once "pnation.php";
	echo "You have some contacts<br />";
	$sql = "SELECT * FROM `contacts` WHERE `user_id` = '$user_id'";
	$q = mysqli_query($db,$sql);
	while ($contacts = mysqli_fetch_assoc($q)) {
		echo $contacts['id']." ";
		echo $contacts['firs_name']." ";
		echo $contacts['last_name']." ";
		echo $contacts[$contacts['best_phone'].'_phone']."<br />";
	}
	// for ($i=0; $i < $ipp; $i++) { 
	// 	echo $p_conts2[$i]['id']." ";
	// 	echo $p_conts2[$i]['firs_name']." ";
	// 	echo $p_conts2[$i]['last_name']." ";
	// 	echo $p_conts2[$i][$p_conts2[$i]['best_phone'].'_phone']."<br />";
	// }
} else {
	echo "You contact list are empty. Please add contacts";
}
?>