<?php
  //Set limit for eX this script(time-out)
	set_time_limit (1200);
  // Sender mail
	$mail="I-24CM Event Invitator <events@ksardonline.ru>";
	$tmail=htmlspecialchars($mail);
	
if (!empty($_POST) && !isset($sent)) {
  
// Set vars
	$eCapt = $_POST['eCapt'];
	$eMails = $_POST['eMails'];
	$eText = $_POST['eText'];
	$yourmail = $tmail;

    // Теперь проверяем заполнение всех полей
	if (empty($eCapt) || $eCapt=="Тема письма") {
    $mail_msg='<b>Вы не ввели тему письма</b>';
  	} elseif (empty($eMails) || $eMails=="Почтовые адрсе") {
    $mail_msg='<b>Не указано адреса получателей</b>';
  	} elseif (empty($eText) || $eText=="Текст письма") {..
    $mail_msg='<b>Вы не ввели текст письма</b>';
  	} else { // Если все поля заполнены верно...
    // Готовим сообщение об успешной отправке... Вдруг у вас какой-то необычный браузер
    $mail_msg='Ваше сообщение отправлено.<br>Нажмите <a href="'.$_SERVER['REQUEST_URI'].'">здесь</a>, если ваш браузер не поддерживает перенаправление.';
    // Готовим заголовки письма... Будем отправлять письма в формате HTML и кодировке UTF-8
    $headers="MIME-Version: 1.0\r\n";
    $headers.="Content-type: text/html; charset=utf-8\r\n";
    $headers.="From: $yourmail";
	
	// Обработка письма. Нужно удалить лишние пробелы и проставить переносы.
	$eText=preg_replace("/ +/"," ",$eText); // множественные пробелы заменяются на одинарные
	$eText=preg_replace("/(\r\n){3,}/","\r\n\r\n",$eText); // убираем лишние переносы (больше 1 строки)
	$eText=str_replace("\r\n","<br>",$eText); // ставим переносы
	
	// Получаем массив адресов. В качестве разделителя у нас используется запятая.
	$emails=explode(",", $eMails);
	$count_emails = count($emails); // Подсчёт количества адресов
	// Запускаем цикл отправки сообщений
    for ($i=0; $i<=$count_emails-1; $i++) // Отчёт начинается в массиве с нуля, поэтому уменьшаем сумму на единицу
    {
    // Подставляем адреса получаетелей и обрезаем пробелы с обоих сторон, если таковые имеются
    $email=trim($emails[$i]);
    // Отправляем письмо и готовим отчёт по отправке
	if($emails[$i]!="") { // Проверка на случай попадения в массив пустого значения
    if(mail($email,$eCapt,$eText,$headers)) $report.="<li><span style=\"color:green;\">Отправлено: ".$emails[$i]."</span></li>"; else $report.="<li><span style=\"color:red;\">Не отправлено: ".$emails[$i]."<span></li>";
	sleep(5); // Делаем тайм-аут в 5 секунд
	}
    }
	
	// Запись отчёта в файл. Файл будет сгенерирован в той же папке, под названием log.txt. Проверьте настройку прав папки.
	$log=fopen("log.txt","w");
	fwrite($log,$report);
	fclose($log);
    // Переменная $sent – признак успешной отправки
    $sent=1;
  }
} else { // Если в массиве POST пусто, форма еще не передавалась
  // Готовим приглашение
  $mail_msg='Все поля обязательны для заполнения.';
  // Поля темы, адресов получаетелей и получателей, и текста в этом случае должны быть пустыми
  $eText=$eCapt=$eMails=$yourmail='';
}

  // Если $sent не существует, выводим форму или отчёт
	if (!isset($sent)) {
  // Если сообщение уже отправлено - выводим отчёт
    if(isset($_GET['messent']))
	{echo $text.="<b style=\"text-align:center;margin-top:200px;display:block;\">Всё окей. Сообщение отправлено. <a href=\"emailer.php\">Ещё?</a><br><br><u>Отчёт:</u></b> <ol style=\"display:block;width:300px;margin:10px auto;\">";
	readfile("log.txt");
	echo"</ol>";
} else {
  // Или выводим форму, если сообщение ещё не отправлено
    echo $text.=<<<post
    <script type="text/javascript">
    function form_validator(form) {
    if (form.eCapt.value=='' || form.eCapt.value=='Тема письма') { alert('Укажите тему письма.'); form.eCapt.focus(); return false; }
    if (form.eMails.value=='' || form.eMails.value=='Почтовые адреса') { alert('Укажите адреса получаталей.'); form.eMails.focus(); return false; }
    if (form.eText.value=='' || form.eText.value=='Текст письма') { alert('Вы не заполнили поле сообщения.'); form.eText.focus(); return false; }
    return true;
    }
    </script>
	<style type="text/css">
	form {display:block;margin:20px auto;width:500px;}
	textarea, input, select {width:100%; margin:5px 0;}
	textarea {height:200px;}
	.red {color:#a00;}
	</style>
    <form method="post" onsubmit="return form_validator(this);">
	<p class="red">$mail_msg</p>
	<input type="text" name="eCapt" id="eCapt" value="Тема письма" title="По какому поводу пишем?" onfocus="if (this.value=='Тема письма') this.value='';" onblur="if (this.value=='') this.value='Тема письма';">
	<textarea name="eMails" id="eMails" title="Кто получатели?" onfocus="if (this.value=='Почтовые адреса') this.value='';" onblur="if (this.value=='') this.value='Почтовые адреса';">Почтовые адреса</textarea>
	<textarea name="eText" id="eText" title="Что пишем?" onfocus="if (this.value=='Текст письма') this.value='';" onblur="if (this.value=='') this.value='Текст письма';">Текст письма</textarea>
	<select name="yourmail">
	<option value="$mail1">$tmail1</option>
	<option value="$mail2">$tmail2</option>
	<option value="$mail3">$tmail3</option>
	</select>
	<input type="submit" value="Отправить" title="Отправить мыл">
	</form>
post;
}
} else { // А если существует...
  // Посылаем в заголовке редирект (303 Refresh) на этот же адрес с дополнительным параметром messent
  $ret_uri=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  header("Refresh: 0; URL=http://".$ret_uri."?messent");
  exit;
}

?>