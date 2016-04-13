<?php
if ($contacts) {
	// require_once "pnation.php";
	$sql = "SELECT * FROM `contacts` WHERE `user_id` = '$user_id'";
	$q = mysqli_query($db,$sql);
	$k = mysqli_num_rows($q);
?>
<div class="table-users">
   <div class="header">You have <?echo $k?> contacts</div>
   <table cellspacing="0">
     <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th></th>
     </tr>
   <?php
	while ($contacts = mysqli_fetch_assoc($q)) {
?>

      <tr>
         <td># <?echo $contacts['id']?></td>
         <td><?echo $contacts['firs_name']?> <?echo $contacts['last_name']?></td>
         <td><?echo $contacts['email']?></td>
         <td><?echo $contacts[$contacts['best_phone'].'_phone']?></td>
<!--          <td><a href='/contact/<?echo $contacts['id']?>/edit'>Edit</a></td> -->
         <td class="last_td">
         <a class="edit" href='/contact/<?echo $contacts['id']?>/edit'></a>
		 <div class="trash"></div>
         </td>
      </tr>
<!-- 		echo $contacts['id']." ";
		echo $contacts['firs_name']." ";
		echo $contacts['last_name']." ";
		echo $contacts[$contacts['best_phone'].'_phone']." ";
		echo "<a href='/contact/".$contacts['id']."/edit'>Edit</a><br />"; -->
<?php
	}
?>
   </table>
</div>
<?php
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