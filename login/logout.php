<?php
	//session_set_cookie_params(0, '/', '.http://williamhodgson.org');
	session_start();
	require 'core.inc.php';
	//require 'http://williamhodgson.org/master.inc.php';
	//$_SESSION['user_id'] = "";
	session_destroy();
	//session_unset();
	//$_SESSION = array();
	header('Location: '.$http_referer);
?>