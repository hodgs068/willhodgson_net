<?php
	ob_start(); //
	session_start(); //
	$current_file = $_SERVER['SCRIPT_NAME']; //
	include $_SERVER['DOCUMENT_ROOT'].'/master.inc.php';
	
	$offset = 0;
	$message = '';
	if(isset($_POST['text']) && isset($_POST['searchfor']) && isset($_POST['replacewith'])){
		$text = $_POST['text'];
		$search = $_POST['searchfor'];
		$replace = $_POST['replacewith'];
		$search_length = strlen($search);
		if (!empty($text) && !empty($search) && !empty($replace)){
				while(($strpos = strpos($text, $search, $offset)) !==false ){ // I don't understand the !==false statement
					$offset = $strpos + $search_length;
					$text = substr_replace($text, $replace, $strpos, $search_length);
				}
				//echo $text;
				$message = $text;
		} else {
			//echo 'Please fill in all fields.';
			$message = 'Please fill in all fields';
		}
	}
?>
<!doctype HTML>
<head>
	<?php headStandard(); ?>
	<title>Find and replace with PHP</title>
	<link rel="stylesheet" type="text/css" href="main.css">
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
			<form action="find_and_replace.php" method="POST">
				<textarea name="text" rows="6" cols="30"></textarea><br><br>
				Search for:<br>
				<input type="text" name="searchfor"><br><br>
				Replace with:<br>
				<input type="text" name="replacewith"><br><br>
				<input type="submit" value="Find and Replace">
			</form>
			<?php echo $message; ?>
		</section>
		<?php asideCode(); ?>
		<?php footerCode(); ?>
	</div>
</html>