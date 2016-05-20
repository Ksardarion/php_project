<?php
class Contact {
	
	function create(){
		$sql = func_get_arg(0);
		$res = DB::connect()->query($sql);
		return $res;
	}
	function edit(){
		$sql = func_get_arg(0);
		$res = DB::connect()->query($sql);
		return $res;
	}
	function delete(){
		$sql = func_get_arg(0);
		$res = DB::connect()->query($sql);
		return $res;
	}
	function clearAll(){
		$sql = "DELETE FROM `contacts` WHERE `user_id` = '$user_id'";
		$res = DB::connect()->query($sql);
	}
}
?>