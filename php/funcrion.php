<?php
sha1()
09.03.16	
function trimPOST(){ 
$array = array(); 
foreach ($_POST as $key => $field) { 
$array[$key] = trim($_POST[$key]); 
} 
return $array; 
}
php>