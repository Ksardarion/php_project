<?php
require_once ("settings.php");
require_once ("db.php");
require_once ("function.php");

session_start();

if (!empty($_SESSION['user']['id'])) {
	$user_id = $_SESSION['user']['id'];
	$user_login = $_SESSION['user']['login'];
	// $remember = $_SESSION['user']['remember'];
	require_once ("user.init.php");
	    // if ($remember) {
	    // 	$remember = false;
	    // 	$http_only = true;
	    // 	$days = 7;
     //        // Save session id in cookies
     //        $sid = session_id();

     //        $expire = time() + $days * 24 * 3600;
     //        $domain = ""; // default domain
     //        $secure = false;
     //        $path = "/";

     //        $cookie = setcookie("sid", $sid, $expire, $path, $domain, $secure, $http_only);
     //    }
}
?>