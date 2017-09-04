
<?php

	



?>










<?php

	require 'conf.inc.php';
	
	echo '<img src="'.$images.'header.gif" />';



?>


<?php
	
	include 'header.inc.php';
	

	
	if(isset($_POST['submit'])){
		echo 'Process 1';
	}
	
	
?>







<br> <br> <br>





<?php


if (isset($_POST['roll']))
	$rand = rand(1,6); 			//inclusive
	echo 'You rolled a '.$rand;

	


?>


<form action="index.php" method="POST">
	<input type="submit" name="roll" value = "Roll dice.">
</form>





<br> <br> <br>
<?php
	
	
	$time = time();
	$actual_time = date('D d M Y @ H:i:s', $time);
	$time_modified = date('D d M Y @ H:i:s', $time - (60*60*24));


	echo 'The current time is: '.$actual_time.'<br>';
	echo 'The time one day ago is: '.$time_modified;
	
?>