<?php 


$http_referer = $_SERVER['HTTP_REFERER'];

//if (!function_exists('loggedin')) {
	function loggedin() {
		if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
			return true;
		} else {
			return false;
		}
	}
//}

function getuserfield($field) {
	
	$query = "SELECT `$field` FROM `users` WHERE `id`='".$_SESSION['user_id']."'";
	if ($query_run = mysql_query($query)) {
		if ($query_result = mysql_result($query_run, 0, $field)){
			return $query_result;
		}
	}
	
}

?>