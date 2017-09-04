<?php
	ob_start(); //
	session_start(); //
	$current_file = $_SERVER['SCRIPT_NAME']; //
	include $_SERVER['DOCUMENT_ROOT'].'/master.inc.php';
?>
<!doctype html>
<html lang="en">
<head>
	<?php headStandard(); ?>
	<script src="js/game.js"></script>
</head>
<body>
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
			<p><h1>Control Character with WASD keys:</h1></p>
			<canvas id="canvas" width="900" height="700"></canvas>
		</section>

		<?php footerCode(); ?>
	</div>
</body>
</html>