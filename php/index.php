<?php
	require 'connect.inc.php';
	require 'core.inc.php';
	
	
	if (loggedin()){
		$firstname = getuserfield('firstname');
		$surname = getuserfield('surname');
		echo 'You\'re logged in, '.$firstname.' '.$surname.'. <a href="logout.php">Log out</a><br>'; // note '.' concatenation, learn what it does
	} else {
		include 'loginform.inc.php';
	}
	

	
?>