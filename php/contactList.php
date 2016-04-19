<?php
if ($contacts) {
   if (isset($_GET['order'])) {
      $order = $_GET['order'];
      $sort = $_GET['sort'];
   } else {
      $order = $user['order'];
      $sort = $user['sort'];
   }
	require_once "pnation.php";
	$sql = "SELECT * FROM `contacts` WHERE `user_id` = '$user_id' ORDER BY `$order` ".$sort." LIMIT $start, $ipp";
   $count_sql = "SELECT * FROM `contacts` WHERE `user_id` = '$user_id'";
	$q = mysqli_query($db,$sql);
   $c_q = mysqli_query($db,$count_sql);
	$k = mysqli_num_rows($c_q);
?>
<div class="wrap">
<div class="table-users">
   <div class="header"><?echo $user_login?>, you have <?echo $k?> contacts</div>
   <table cellspacing="0">
     <tr>
      <th><a href="?order=id&amp;sort=ASC">ID</a></th>
      <th><a href="?order=firs_name&amp;sort=DESC">Name</a></th>
      <th><a href="?order=email&amp;sort=DESC">Email</a></th>
      <th>Phone</th>
      <th></th>
     </tr>
      <?php
	  while ($contacts = mysqli_fetch_array($q)) {
      ?>
      <tr>
         <td># <?echo $contacts['id']?></td>
         <td><?echo $contacts['firs_name']?> <?echo $contacts['last_name']?></td>
         <td><?echo $contacts['email']?></td>
         <td><?echo $contacts[$contacts['best_phone'].'_phone']?></td>
         <td class="last_td">
         <a class="edit" href='/contact/<?echo $contacts['id']?>/edit'></a>

		   <div class="trash md-trigger" data-modal="modal-11"></div>
         </td>
      </tr>
      <?}?>
      <tr>
         <td><? echo $paginate ?></td>
      </tr>
   </table>
</div>
<div class="btn-cont">
   <a href="/contact/addContact.php" class="btn-add btn"></a>
   <div class="btn-snd btn"></div>
   <div class="btn-set btn"></div>
   <a href="exit?yes" class="btn-ext btn"></a>
</div>
</div>
<?php

} else { ?>
<div class="wrap">
<div class="table-users">
   <div class="header">You contact list are empty. Please add contacts</div>
</div>
<div class="btn-cont">
   <a href="/contact/addContact.php" class="btn-add btn"></a>
   <div class="btn-snd btn"></div>
   <div class="btn-set btn"></div>
   <a href="exit?yes" class="btn-ext btn"></a>
</div>
</div>
<?php
}
?>