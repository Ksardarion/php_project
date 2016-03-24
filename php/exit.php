<html>
<head>
<title>Психологічні тести</title>
<meta charset="UTF-8">
<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./sys/css/normalize.css">
<link rel="stylesheet" href="./sys/css/style.css">
</head>
<body>
<div class="wrapper">
<div class="tabs">
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
      <label for="tab-1" class="tab-label">Ви впевнені що хочете вийти?</label>
    <div class="tab-content">
<?php
if (isset($_GET['conf'])) {
	echo '<a href="?yes" class="tab-label">Так</a><a href="/" class="tab-label">Ні</a>';
}
if (isset($_GET['yes'])) {
	session_start();
	session_unset();
	session_destroy();
	sleep(3);
	header('Location: /');
}
?>
</div>
</div>
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
      <a href="/" for="tab-2" class="tab-label">На головну</a>
    </div>
</div>
</div>
</body>
</html>