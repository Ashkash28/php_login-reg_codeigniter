<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Success</title>
	<style>
	p {
		display: block;
	}
	</style>
</head>

<body>
	<h1> Welcome <?= $this->session->userdata('first_name') ?> </h1>

	<div class="user">
		<p>First Name: <?= $this->session->userdata('first_name') ?></p>
		<p>Last Name: <?= $this->session->userdata('last_name') ?></p>
		<p>Email Address: <?= $this->session->userdata('email') ?></p>
	</div>
	
</body>
</html>