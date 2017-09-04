<?php
	
	require 'connect.inc.php';
	$variable = "firstname";
	//$query = "SELECT `id` FROM `users` WHERE `username`=`$username` AND `password`=`$password_hash`";
	//$query = "SELECT id FROM users WHERE username='$username' AND password='$password_hash'";
	$query = "Select $variable FROM users WHERE id='1'";
	//$query = "Select firstname FROM users WHERE id = '1' ";
	
	$query_success = ($query_run = mysql_query($query));
	
	if ($query_success) echo 'query success'; else echo 'query failure';
	
?>