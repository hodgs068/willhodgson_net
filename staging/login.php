<?php
include ('Includes/connect.inc.php');
include ('Includes/html_codes.php');
session_start();

if (isset($_POST['submit']) ) {
	$error = array();
	
	//username
	if (empty($_POST['username']) ) {
		$error [] = 'Please enter a Username.';
	}else if (ctype_alnum($_POST['username']) ) {
		$username = $_POST['username'];
	}else{
		$error [] = 'Username must consist of letters and numbers only.';
	}
	
	//password
	if (empty($_POST['password']) ) {
		$error [] = 'Please enter a Password';
	}else{
		$password = mysql_real_escape_string($_POST['password']);
	}
	if (empty($error)) {
		$result = mysql_query (" SELECT * FROM users WHERE username = '$username' AND password = '$password' ") or die (mysql_error());			
		if (mysql_num_rows($result) == 1) {
		while ($row = mysql_fetch_array($result)) {
			$_SESSION['user_id'] = $row['user_id'];
			header("Location:account_itemsactive.php");
		}	
	}else{
		$error_message = '<span class = "error">Username or password is incorrect</span><br /><br />';
	}
	}else{
		$error_message = '<span class = "error">';
		foreach ($error as $key => $values) {
			$error_message.= "$values";
		}
		$error_message.="</span><br/><br/>";
	}
}

?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Log In</title>
	<link rel = "stylesheet" href = "css/main.css">
	<link rel = "stylesheet" href = "css/forms.css">
	<link rel = "stylesheet" href = "css/login.css">
</head>
<body>
	<div id="wrapper">
		<?php headerAndSearchCode(); ?>
		<aside id = "left_side">
			<img src="images/registerbanner.png" />
		</aside>
		
		<section id = "right_side">
			<form id = "generalform" class = "container" method = "POST" action = "">
				<h3>Log In</h3>
				<?php echo @$error_message; ?>
				<div class = "field">
					<label for = "username">Username</label>
						<input type = "text" class = "input" id = "username" name = "username" maxlength = "20"/>
					</div>
						<div class = "field">
							<label for = "password">Password</label>
							<input type = "password" class = "input" id = "password" name = "password" maxlength = "20"/>
					</div>
					<input type = "submit" name = "submit" id = "submit" class = "button" value = "Submit" />
				</form>
			</section>
		</div>
		<?php footerCode(); ?>
	</body>
</html>