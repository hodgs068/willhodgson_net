<?php
include ('Includes/connect.inc.php');
include ('Includes/html_codes.php');
session_start();

if (isset($_POST['submit']) ) {
	$error = array();
	
	//username
	if (empty($_POST['username']) ) {
		$error [] = 'Please enter a Username.  ';
	}else if (ctype_alnum($_POST['username']) ) {
		$username = $_POST['username'];
	}else{
		$error [] = 'Username must consist of letters and numbers only.';
	}
	//email
	    if(empty($_POST['email'])){
        $error[] = 'Please enter your Email. ';
    }else if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])){
		$email = mysql_real_escape_string($_POST['email']);
    }else{
		$error[] = 'Your e-mail address is invalid.    ';
    }
	//password
	if (empty($_POST['password']) ) {
		$error [] = 'Please enter a Password';
	}else{
		$password = mysql_real_escape_string($_POST['password']);
	}
	if (empty($error)) {
		$result = mysql_query("SELECT * FROM users WHERE email = '$email' or username = '$username'") or die (mysql_error());
		if (mysql_num_rows($result) == 0) {
			$activation = md5(uniqid(rand(), true));
			$result2 = mysql_query("INSERT INTO tempusers (user_id, username, email, password, activation) VALUES ('', '$username', '$email', '$password','$activation') ") or die (mysql_error());
			if (!$result2) {
				die('Could not insert you into database: '.mysql_error() ); 
			}else{
				$message = "To activate your account, please click on this link: \n\n";
				$message .= "http://lisa1986.com".'/activate.php?email='.urlencode($email). "&key=$activation"; 
				mail($email, 'Registration Confirmation', $message);
				header('Location: prompt.php?x=1');
			}
		}else{
			header('Location: prompt.php?x=2');
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
	<title>Register</title>
	<link rel = "stylesheet" href = "css/main.css">
	<link rel = "stylesheet" href = "css/forms.css">
	<link rel = "stylesheet" href = "css/register.css">
</head>
<body>
	<div id = "wrapper">
		<?php headerAndSearchCode(); ?>
		<aside id = "left_side">
			<img src="images/registerbanner.png" />
		</aside>
		<section id = "right_side">
			<form id = "generalform" class = "container" method = "POST" action = "">
			<h3>Register</h3>
			<?php echo @$error_message; ?>
			<div class = "field">
				<label for = "username">Username:</label>
				<input type = "text" class = "input" id = "username" name = "username" maxlength = "20"/>
				<p class = "hint">20 characters maximum (letters and numbers only)</p>
			</div>
			<div class = "field">
			<label for = "email">Email:</label>
			<input type = "text" class = "input" id = "email" name = "email" maxlength = "80"/>
			</div>
			<div class = "field">
			<label for = "password">Password:</label>
			<input type = "password" class = "input" id = "password" name = "password" maxlength = "20"/>
				<p class = "hint">20 characters maximum</p>
			</div>
			<input type = "submit" name = "submit" id = "submit" class = "button" value = "Submit"/>
			</form>
		</section>
		
	</div>
	<?php footerCode(); ?>
</body>
</html>