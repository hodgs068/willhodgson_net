<form action="<?php echo $current_file; ?>" method="post">
Username: <input type="text" name="username"> 
Password: <input type="password" name="password">
<input type="submit" value="Log in" name="submit">
</form>

</body>
</html>


<?php
echo 'test1';
if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		if (!empty($username) && !empty($password)) {
			echo 'Ok.';
		} else {
			echo 'You must supply a username';
		}

	}
?>