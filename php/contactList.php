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
   $q = $db->query($sql);
   $count_sql = "SELECT * FROM `contacts` WHERE `user_id` = '$user_id'";
   $k = $c_q->rowCount($db->query($count_sql));
?>

<div class="wrap">
<a href="/" class="logo"></a>
<div class="table-users">
   <div class="header"><?= $user_login?>, you have <?= $k?> contacts</div>
   <table cellspacing="0">
     <tr>
      <th><a href="?order=id&amp;sort=DESC">ID</a></th>
      <th><a href="?order=firs_name&amp;sort=DESC">Name</a></th>
      <th><a href="?order=email&amp;sort=DESC">Email</a></th>
      <th>Phone</th>
      <th></th>
      <th></th>
     </tr>
      <?php
	  while ($contacts = $q->fetch()) {
      ?>
         <tr>
         <a onclick="window.location='/contact/<?= $contacts['id']?>/'">
            <td># <?= $contacts['id']?></td>
            <td><?= $contacts['firs_name']?> <?= $contacts['last_name']?></td>
            <td><?= $contacts['email']?></td>
            <td><?= $contacts[$contacts['best_phone'].'_phone']?></td>
		 </a>
            <td><input type="checkbox" name="cb<?= $contacts['id']?>" id="cb<?= $contacts['id']?>" /><label for="cb<?= $contacts['id']?>" class="cb-label"></label></td>
            <td class="last_td">
            <a class="edit" href='/contact/<?= $contacts['id']?>/edit'></a>
            <div class="trash md-trigger" data-modal="modal-11"></div>
            </td>
         </tr>
      <?}?>

   </table>
   <? echo $paginate ?>
</div>
<div class="btn-cont">
   <a href="/contact/addContact.php" class="btn-add btn"></a>
   <a href="#" class="btn-snd btn"></a>
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