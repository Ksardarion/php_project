<?php
session_start();
include_once ("bd.php");
include_once ("../sys/inc/start.php");
if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
    header('Location: /');
    exit('Ви не авторизовані');
}
?>
<html>
<head>
<meta charset="UTF-8">
<title>Налаштування профілю</title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./sys/css/normalize.css">
<link rel="stylesheet" href="./sys/css/style.css">
</head>
<body>
<?php
if (!empty($user['id']))
include("../sys/template/user_menu.php");
?>
<?php
include("../sys/template/left_menu.php");
?>
<div class="wrapper">
<div class="tabs">
	<div class="tab">
      <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
      <label for="tab-1" class="tab-label">Зміна паролю</label>
    <div class="tab-content">
    <?php
    if (!empty($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    echo "$msg";
    }
    ?>
        <form action="save_pass.php" method="post">
            <label>Введіть старий пароль:<br></label>
            <input name="old" type="password" size="15" maxlength="32" required>
            <label>Введіть новий пароль:<br></label>
            <input name="new" type="password" size="15" maxlength="32" required>
            <label>Повторіть новий пароль:<br></label>
            <input name="new2" type="password" size="15" maxlength="32" required>
            <p>
            <input type="submit" name="submit" value="Зберегти">
            </p>
            </form>
    </div>
    </div>
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-2"  class="tab-switch">
      <label for="tab-2" class="tab-label">Зміна e-mail</label>
    <div class="tab-content">
    <?php
    if (!empty($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    echo "$msg";
    }
    ?>
    <p>
        На даний момент можливості змінити реєстраційний e-mail немає!
    </p>
<!--         <form action="save_ank.php" method="post">
            <label>Введіть старий пароль:<br></label>
            <input name="old" type="password" size="15" maxlength="32">
            <label>Введіть новий пароль:<br></label>
            <input name="new" type="password" size="15" maxlength="32">
            <label>Повторіть новий пароль:<br></label>
            <input name="new2" type="password" size="15" maxlength="32">
            <p>
            <input type="submit" name="submit" value="Зберегти">
            </p>
        </form> -->
    </div>
    </div>
</div>
</div>
</body>
</html>
