<?php
$db = mysqli_connect("localhost","ksard","i24zbest","php_project");

// We must check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>