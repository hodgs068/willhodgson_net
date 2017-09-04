<?php
	include $_SERVER['DOCUMENT_ROOT']."/master.inc.php";
	$current_file = $_SERVER['SCRIPT_NAME'];
	function produceHTML() {
		include 'test2.php';
	}
?>

<html>
<head>


</head>

<body>

<?php
	echo '<div>';
	//include 'test2.php';
	produceHTML();
	echo '</div>';
?>


	<h1> <?php /* 
	$str = "Who's in <u>charge</u> around here?";
	echo $str;
	echo '<br/>(unescaped text with html entities intact)<br/><br/>';
	$str = addslashes(htmlentities($str));
	echo $str;
	echo '<br/>(string has been escaped and html entities disabled)<br/><br/>';
	$str = html_entity_decode(stripslashes($str));
	echo $str;
	echo '<br/>(the operations have been reversed to their previous state)<br/><br/>';

	*/ ?> </h1>
	

	
	
</body>

</html>







safe temporary place for index nav2 code with login stuff, if test fails put this back into index.php:



<nav id="top_menu2">
			<?php
			$result = mysql_query("SELECT count(1) FROM `users`"); // try to fit back into HTML_Codes function when possible
			$row = mysql_fetch_array($result);
			
			$total = $row[0];
			echo "Total number of registered users so far:  ".$total;
			?>
			<div id="login"><?php include $root.'/login/login.php'; ?></div>
			<hr class="hr" />
		</nav>









