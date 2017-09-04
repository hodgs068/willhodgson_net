<?php
$connect = mysql_connect('localhost','willhodg_user1','}Maple1132');
if (!$connect) {
	die('Could not connect to the server.'.mysql_error());
}
$db_selected = mysql_select_db('willhodg_main_db');
if (!$db_selected) {
	die('Could not connect to the database.'.mysql_error());


}
?>