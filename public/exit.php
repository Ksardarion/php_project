<!DOCTYPE html>
<html>
<head>
<title>I-24 CM|Log out</title>
<meta charset="UTF-8">
</head>

<body>
<?php

if (isset($_GET['conf'])) {
	echo '<a href="?yes">Так</a><a href="/">Ні</a>';
}
if (isset($_GET['yes'])) {

	session_start();
  if(!empty($_SESSION['user'])){
    unset($_SESSION['user']);
  }
  if (empty($_SESSION['user'])) {
    header('Location: /');
  }

}

?>

</body>

</html>