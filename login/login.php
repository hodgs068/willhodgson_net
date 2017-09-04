<?php
require 'core.inc.php';

if (loggedin()) {
	$firstname = getuserfield('firstname');
	$surname = getuserfield('surname');
	echo 'You\'re logged in, '.$firstname.' '.$surname.'. <a href="http://willhodgson.net/login/logout.php">Log out</a><br>';
} else {
	include 'loginform.inc.php';
}
//note: this stands in for "index.php" in the newboston tutorial series
?>