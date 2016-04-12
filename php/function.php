<<<<<<< HEAD
<?php	
function trimPOST(){ 
	$arr = array(); 
	foreach ($_POST as $key => $field) { 
		$arr[$key] = trim($_POST[$key]); 
	} 
	return $arr; 
=======
<?php	
function trimPOST(){ 
	$arr = array(); 
	foreach ($_POST as $key => $field) { 
		$arr[$key] = trim($_POST[$key]); 
	} 
	return $arr; 
>>>>>>> refs/remotes/origin/master
}