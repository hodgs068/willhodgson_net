<?php

	$mysql_host = 'localhost';
	$mysql_user = 'hodgs068_william';
	$mysql_pass = '1A7ters9';
	
	$mysql_db = 'hodgs068_william';
	
	//$dbh=mysql_connect ("localhost", "cpuser_dbuser", "password") or die ('I cannot connect to the database because: ' . mysql_error());
//mysql_select_db ("cpuser_db");
	
	$connect = mysql_connect($mysql_host, $mysql_user, $mysql_pass);
	
	if(!$connect){die('Could not connect to database');}
	
				if ($result == true)
					echo '<body>'.stripslashes("connect test is true").'</body>'; // DEBUG LINE, REMOVE PLEASE
				if ($result == false)
					echo '<body>'.stripslashes("connect test is false").'</body>'; // DEBUG LINE, REMOVE PLEASE
	
	mysql_select_db($mysql_db, $connect);
	
	
	//if (!mysql_connect($mysql_host, $mysql_user, $mysql_pass) && !mysql_select_db($mysql_db)){
	//	die(mysql_error());
	//}




$result = mysql_query("SELECT count(*) FROM side_news");
				if ($result == true)
					echo '<body>'.stripslashes("count test is true").'</body>'; // DEBUG LINE, REMOVE PLEASE
				if ($result == false)
					echo '<body>'.stripslashes("count test is false").'</body>'; // DEBUG LINE, REMOVE PLEASE
		$row = mysql_fetch_array($result);
		$counter = $row[0];
		echo "
		<aside id=\"side_news\">
		<h4>News</h4>
			<ul>";
				
				$result = mysql_query("SELECT item FROM side_news ORDER BY id DESC");
				if ($result == true)
					echo '<body>'.stripslashes("test is true").'</body>'; // DEBUG LINE, REMOVE PLEASE
				if ($result == false)
					echo '<body>'.stripslashes("test is false").'</body>'; // DEBUG LINE, REMOVE PLEASE
				
				while ($row = mysql_fetch_row($result)){ //note: this will shift the query result's internal pointer / iterator
					$item = $row[0];
					if ($counter > 1) {
						echo '<body>'.stripslashes($item).'</body><br/>'; 
						$counter--;
					} else {
						echo '<body>'.stripslashes($item).'</body>'; // will avoid adding that last break 
					}
				}
			echo "</ul>
	</aside>
	";

?>

<?php

?>
<!doctype html>
<html lang="en">
<head>

</head>
<body>

Test Text Here

</body>
</html>