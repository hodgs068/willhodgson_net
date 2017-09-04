 <?php
//$connect = mysql_connect('localhost','USERNAME','PASSWORD');
//if (!$connect) {
//	die('Could not connect to the server.'.mysql_error());
//}
//$db_selected = mysql_select_db('DB_NAME');
//if (!$db_selected) {
//	die('Could not connect to the database.'.mysql_error());
//
//
//}
//
?>


<?php

	$mysql_host = 'localhost';
	$mysql_user = 'willhodg_user1';
	$mysql_pass = 'Maple1132';
	
	$mysql_db = 'willhodg_main_db';
	
	$connect = mysql_connect($mysql_host, $mysql_user, $mysql_pass);
	
	if(!$connect){die('Could not connect to database');}
	
	mysql_select_db($mysql_db, $connect);
	
	
	//if (!mysql_connect($mysql_host, $mysql_user, $mysql_pass) && !mysql_select_db($mysql_db)){
	//	die(mysql_error());
	//}


?>