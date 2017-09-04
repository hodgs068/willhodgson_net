<?php

	$mysql_host = 'localhost';
	$mysql_user = 'hodgs068_william';
	$mysql_pass = '1A7ters9';
	
	$mysql_db = 'hodgs068_william';
	
	$connect = mysql_connect($mysql_host, $mysql_user, $mysql_pass);
	
	if(!connect){die('Could not connect to database');}
	
	mysql_select_db($mysql_db, $connect);
	
	
	
	
	
	
	
	//if (!mysql_connect($mysql_host, $mysql_user, $mysql_pass) && !mysql_select_db($mysql_db)){
	//	die(mysql_error());
	//}


?>