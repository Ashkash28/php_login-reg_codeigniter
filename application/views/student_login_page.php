<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<?php
	if($this->session->flashdata("login_error"))
	{
		echo $this->session->flashdata("login_error");
	}
	?>
	<h1>Login Here</h1>
	<form action="/students/login" method="post">
		<p>Email:<input type="text" name="email"/></p>
		<p>Password:<input type="password" name="password"/></p>
		<input type="submit" value="Login"/>
	</form>

	<?php
	if($this->session->flashdata("registration_errors"))
	{
		echo $this->session->flashdata("registration_errors");
	}
	?>
	<h1>Please Register here</h1>
	<form action="/students/register" method="post">
		<p>First Name: <input type="text" name="first_name"/></p>
		<p>Last Name: <input type="text" name="last_name"/></p>
		<p>Email: <input type="text" name="email" /></p>
		<p>Password: <input type="password" name="password" /></p>
		<p>Confirm Password: <input type="password" name="confirm_password" /></p>
		<input type='hidden' name='action' value='register' />
		<input type="submit" value="Register" />
	</form>


</body>
</html>