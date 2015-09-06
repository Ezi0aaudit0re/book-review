
<html>
<head>
	<title>Login and registration</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/assets/index.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Welcome !</h1>
		</div>
		<?php
			if(isset($message) && $message==TRUE)
			{
				echo "<div class='alert alert-warning'>$message</div>";
			}
		?>
		<div class="row pull-left">
			<div class="col-xs-6">
				<h3>Login!!</h3>
				<form method='post' action='/add'>
					<input type='text' name='first_name' placeholder="FIRST NAME"><br>
					<input type='text' name='last_name' placeholder="LASAT NAME"><br>
					<input type='text' name='alias' placeholder='ALIAS'>
					<input type='email' name='email' placeholder="EMAIL"><br>
					<input type='password' name='password' placeholder="Password minimum 6 characters"><br>
					<input type='password' name='cpassword' placeholder="Confirm Password"><br>
					<input type='submit' class='btn btn-info'>
				</form>
			</div>
		</div>
		<div class="row  pull-right">
			<div class="col-xs-6" id='signin'>
				<h2>Signin!</h2>
				<form method='post' action='/signin'>
					<input type='email' name='email' placeholder='EMAIL'><br>
					<input type='password' name='password' placeholder='PASSWORD'><br>
					<input type='submit' class='btn btn-info'>
				</form>

			</div>
		</div>
	</div>
</body>
</html>