<html>
<head>
<meta charset="UTF-8">
<title>Реєстрація, зачекайте</title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./sys/css/normalize.css">
<link rel="stylesheet" href="./sys/css/style.css">
</head>
</html>
<?php
if (isset($_POST['login'])) { 
	$login = $_POST['login']; 
	if ($login == '') { 
		unset($login);
	} 
} 
if (isset($_POST['password'])) { 
	$password=$_POST['password']; 
	if ($password =='') {
	 unset($password);
	} 
}
if (isset($_POST['password2'])) { 
	$password2=$_POST['password2']; 
	if ($password2 =='') {
	 unset($password2);
	} 
}
if (isset($_POST['reg_mail'])) { 
    $reg_mail=$_POST['reg_mail']; 
    if ($reg_mail =='') {
     unset($reg_mail);
    } 
}
$sex=$_POST['sex'];
if (empty($login) or empty($password) or empty($password2) or empty($reg_mail))
{
exit ("Ви повинні заповнити усі поля, їх і так не багато!");
}
if ($password != $password2) {
	exit ("Введені паролі не збігаються!");
}
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$login = trim($login);
$password = trim($password);
if    (strlen($login) < 3 or strlen($login) > 32) {
exit    ("Логін повинен складатися не менш ніж з 3 символів, і не більше ніж з 32");
}
if    (strlen($password) < 3 or strlen($password) > 32) {
exit    ("Пароль повинен складатися не менш ніж з 3 символів, і не більше ніж з 32");
}
// Аватар СТАРТ 
// Якщо аватар не завантажено:   
if (!empty($_POST['fupload'])){
    $fupload=$_POST['fupload'];
    $fupload = trim($fupload); 
        if ($fupload =='' or empty($fupload)) {
             unset($fupload);
        }
}   
// Поставимо дефолтну аву якщо її не завантажували       
if (!isset($fupload) or empty($fupload) or $fupload ==''){
   $avatar = "/avatars/net-avatara.jpg";
} else {
//інакше завантажуємо аву користувача
$path_to_90_directory = '/avatars/';         
if(preg_match('/[.](JPG)|(jpg)|(gif)|(GIF)|(png)|(PNG)$/',$_FILES['fupload']['name'])){                 
   	$filename = $_FILES['fupload']['name'];
   	$source = $_FILES['fupload']['tmp_name']; 
   	$target = $path_to_90_directory . $filename;
   	move_uploaded_file($source,    $target);//завантаимо оригінал          
        if(preg_match('/[.](GIF)|(gif)$/',    $filename)) {
            $im    = imagecreatefromgif($path_to_90_directory.$filename) ; //необхідно для подальшого стиснення
        }
        if(preg_match('/[.](PNG)|(png)$/',    $filename)) {
            $im =    imagecreatefrompng($path_to_90_directory.$filename) ;//необхідно для подальшого стиснення
        }
        if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/',    $filename)) {
            $im =    imagecreatefromjpeg($path_to_90_directory.$filename); //необхідно для подальшого стиснення
        }                     
//Створення квадрата 90*90
// dest - результуюче зображення
// w - зображення
// ratio - коеф.пропорційності        
$w = 150;  // виставляємо розмір квадрата       
$w_src = imagesx($im); //вираховуємо ширину
$h_src = imagesy($im); //і висоту
$dest = imagecreatetruecolor($w,$w);           
// якщо фото горизонтальне
if    ($w_src>$h_src) 
imagecopyresampled($dest, $im, 0, 0,round((max($w_src,$h_src)-min($w_src,$h_src))/2), 0, $w, $w, min($w_src,$h_src), min($w_src,$h_src));           
// якщо вертикальне
if    ($w_src<$h_src) 
imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, min($w_src,$h_src), min($w_src,$h_src));
if ($w_src==$h_src) 
imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, $w_src, $w_src);           
$date=time();
imagejpeg($dest,    $path_to_90_directory.$date.".jpg");         
$avatar = $path_to_90_directory.$date.".jpg";//записуємо в змінну шлях до аватара
$delfull = $path_to_90_directory.$filename; 
unlink    ($delfull);
} else {
exit ("Аватар повинен бути у форматі <strong>JPG,GIF або PNG</strong>");
}
}
// Аватар КІНЕЦЬ
$password = md5($password);
$password = strrev($password);//+реверс        
$password = $password."b3p6f";

include ("bd.php");
$result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
exit ("Такий логін вже зареєстровано в системі");
}

$result2 = mysql_query ("INSERT INTO users (login,password,avatar,reg_mail,sex) VALUES('$login','$password','$avatar','$reg_mail','$sex')");
if ($result2=='TRUE')
{
echo "Ви успішно зареєстровані <a href='index.php'>На головну</a>";
}

else {
echo "Стаалася якась помилка!";
     }
?>