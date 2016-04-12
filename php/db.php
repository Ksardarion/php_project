<?php
<<<<<<< HEAD

$db = mysqli_connect(HOST,USER,DB_PASS,DB_NAME);



// We must check connection

if (mysqli_connect_errno()){

  echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }

=======
$db = mysqli_connect("http://172.25.53.4/","user","qwerty","project");

// We must check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
>>>>>>> refs/remotes/origin/master
?>