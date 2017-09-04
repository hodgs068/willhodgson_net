<?php
	ob_start(); //
	session_start(); //
	$current_file = $_SERVER['SCRIPT_NAME']; //
	include $_SERVER['DOCUMENT_ROOT'].'/master.inc.php';
?>
<!doctype HTML>


<head>
	<?php headStandard(); ?>
	<title>jQuery Tutorial</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>

	<div id="big_wrapper">
		<?php headerNavCode(); ?>
		<nav id="top_menu2">
			<?php
			$result = mysql_query("SELECT count(1) FROM `users`"); // try to fit back into HTML_Codes function when possible
			$row = mysql_fetch_array($result);
			$total = $row[0];
			echo $total." users registered so far. | "."<a href='http://williamhodgson.org/login/register.php'>Register now!</a>";
			?>
			<div id="login"><?php include $root.'/login/login.php'; ?></div>
			<hr class="hr" />
		</nav>
		<section id="main_section">	
		
			I agree that with great power comes great responsibility:
			<input type="checkbox" id="agree"><br><br><br>
			<input type="button" id="switch" value="Switch" disabled="disabled"><br><br>
			<p id=switch_color>Change the background of this text field!</p>
			<script type="text/javascript" src="jquery.js"></script>
			<script type="text/javascript" src="test.js"></script>
			
		</section>
		<?php asideCode(); ?>
		<?php footerCode(); ?>
	</div>
</html>