<?php
$db = mysqli_connect("http://172.25.53.4/","user","qwerty","project");

// We must check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>