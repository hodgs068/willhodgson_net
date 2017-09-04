<?php
//ob_start(); //
//session_start(); //
$current_file = $_SERVER['SCRIPT_NAME']; //
include $_SERVER['DOCUMENT_ROOT']."/master.inc.php";
	
	
	$mysql_host = 'localhost';
	$mysql_user = 'willhodg_user1';
	$mysql_pass = 'Maple1132';
	
	$mysql_db = 'willhodg_main_db';
	
	$connect = mysql_connect($mysql_host, $mysql_user, $mysql_pass);
	
if (!$connect) {
	die('Could not connect to the server.'.mysql_error());
}
$db_selected = mysql_select_db('willhodg_main_db');
if (!$db_selected) {
	die('Could not connect to the database.'.mysql_error());
}
require 'core.inc.php';


	
	//if(!loggedin()){
		
		if(isset($_POST['username']) &&
							isset($_POST['password']) &&
							isset($_POST['password_again']) &&
							isset($_POST['firstname']) &&
							isset($_POST['surname'])){
			$username=$_POST['username'];
			$password=$_POST['password'];
			$password_again=$_POST['password_again'];
			$password_hash = md5($password);
			
			$firstname=$_POST['firstname'];
			$surname=$_POST['surname'];
			if (!empty($username) &&
							!empty($password) &&
							!empty($password_again) &&
							!empty($firstname) &&
							!empty($surname) ){

				if ((strlen($username) > 30) || (strlen($firstname) > 40) || (strlen($surname > 40))){
					$message = 'Please adhere to the correct maxlength for forms';
				} else {
				
					if($password!=$password_again){
						$message = 'Passwords do not match';	
					} else {
						//start registration process
					
						$query = "SELECT username FROM users WHERE username='$username'";
						$query_run = mysql_query($query);
					
						if(mysql_num_rows($query_run) == 1){
							$message = 'The username '.$username.' already exists.';
						} else {
							$query = "INSERT INTO `users`(`username`, `password_hash`, `firstname`, `surname`) VALUES ('','".mysql_real_escape_string($username)."',
																	'".mysql_real_escape_string($password_hash)."',
																	'".mysql_real_escape_string($firstname)."',
																	'".mysql_real_escape_string($surname)."')";
							if($query_run = mysql_query($query)){
								header('Location: register_success.php');
							} else {
								$message = 'Sorry, we couldn\'t register you at this time. Try again later.';
							}
						}
					}
				}
				
			} else {
				$message = 'All fields are required.';
			}					
		}
?>
<!doctype html>
<html lang="en">
<head>
	<?php headStandard(); ?>
</head>
<body>
	<div id="big_wrapper">
		<?php headerNavCode(); ?>
		<section id="main_section">	
			<form action="register.php" method="POST">
			Username:<br> <input type="text" name="username" maxlength="30" value="<?php if(isset($username)) {echo $username;} ?>"><br><br>
			Password:<br> <input type="password" maxlength="32" name="password"><br><br>
			Password again:<br> <input type="password" name="password_again"><br><br>
			Firstname:<br> <input type="text" name="firstname" maxlength="40" value="<?php if(isset($firstname)) {echo $firstname;} ?>" ><br><br>
			Surname:<br> <input type="text" name="surname" maxlength="40" value="<?php if(isset($surname)) {echo $surname;} ?>" ><br><br>
			<input type="submit" value="Register">
			</form>
			<?php echo $message; ?>

		</section>
		<?php asideCode(); ?>
		<?php footerCode(); ?>
	</div>
</body>
</html>