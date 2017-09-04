<?php
$connect = mysql_connect('localhost','hodgs068_william','}1A7ters9');
if (!$connect) {
	die('Could not connect to the server.'.mysql_error());
}
$db_selected = mysql_select_db('hodgs068_william');
if (!$db_selected) {
	die('Could not connect to the database.'.mysql_error());


}
?>