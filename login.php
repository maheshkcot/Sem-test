<?php
session_start();

?>
<html>
<head>
</head>
<body align="center">
<div align="center" width="300px">
<form action="logincheck.php" method="POST">
	<h1> Login</h1><br>
	<span>Username : </span><input type="text" size="30" name="uname"></br>
	<span>Password : </span><input type="password" size="30" name="pass"></br>
	<input type="submit" value="Login"><br>
	/<!-- <input type="reset" value="reset"> -->
	</form>
</div>
</body>
</html>