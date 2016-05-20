<?php
  //Set limit for eX this script(time-out)
	set_time_limit (1200);
  // Sender mail
	$mail = "I-24CM Event Invitator <events@ksardonline.ru>";
	$tmail = htmlspecialchars($mail);
	
if (!empty($_POST) && !isset($sent)) {
// Set vars
	$eCapt = $_POST['eCapt'];
	$eMails = $_POST['eMails'];
	$eText = $_POST['eText'];

	if (empty($eCapt)) {
    $mail_msg = '<b>Please, enter message subject</b>';
  	} elseif (empty($eMails)) {
    $mail_msg = '<b>Please, chose or enter adresses</b>';
  	} elseif (empty($eText)) {
    $mail_msg = '<b>Please, enter message</b>';
  	} else {
    $mail_msg = 'Your message was sent.<br>Click <a href="'.$_SERVER['REQUEST_URI'].'">here</a>, if your browser are not supports redirect.';
    $headers = "MIME-Version: 1.0\r\n";
    $headers.= "Content-type: text/html; charset=utf-8\r\n";
    $headers.= "From: $tmail";
	
	$eText=preg_replace("/ +/"," ",$eText);
	$eText=preg_replace("/(\r\n){3,}/","\r\n\r\n",$eText);
	$eText=str_replace("\r\n","<br>",$eText);
	
	$emails=explode(",", $eMails);
	$count_emails = count($emails);
    for ($i=0; $i<=$count_emails-1; $i++){
    	$email=trim($emails[$i]);

		if($emails[$i]!="") {
    		if(mail($email,$eCapt,$eText,$headers)){
    		 $report.= "<li><span style=\"color:green;\">Send: ".$emails[$i]."</span></li>";
    		} else {
    		 $report.= "<li><span style=\"color:red;\">Not send: ".$emails[$i]."<span></li>	";
    		}
			sleep(5);
		}
    }
	
	$log = fopen("log.txt","w");
	fwrite($log,$report);
	fclose($log);

    $sent = 1;
  	}
} else {
  $mail_msg='All fields need enter';

  $eText=$eCapt=$eMails=$yourmail='';
}

if (!isset($sent)) {
if(isset($_GET['messent'])){
echo $text.="<b style=\"text-align:center;margin-top:200px;display:block;\">Message(-s) was sent<br><br><u>Log:</u></b> <ol style=\"display:block;width:300px;margin:10px auto;\">";
readfile("log.txt");
echo"</ol>";
}
} else {
  $ret_uri = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  header("Refresh: 0; URL=http://".$ret_uri."?messent");
  exit;
}

?>