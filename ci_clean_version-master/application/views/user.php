
<html>
<head>
	<title>User information</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="#">	
</head>
<body>
	<div class="container">
		<div class="row">
			<h4 class='pull-right'><a href="/books/books">Home</a> | <a href="#">Add book and review</a> | <a href="/books/logout">Logout</a></h4>
		</div>
		<div class="row">
			<div class="col-xs-4">
				<h4>User Alias: <?=$userinfo[0]['alias']?> </h4>
				<h5>Name: <?=$userinfo[0]['first_name'] . " " . $userinfo[0]['last_name']?></h5>
				<h5>Email: <?=$userinfo[0]['email']?></h5>
				<h5>Total Reviews: <?=$totalreviews['COUNT(review)']?></h5>
			</div>
		</div>
		<hr>
		<div class="row">
			<h4>Posted reviews on the following books</h4>
			<ul>
				<?php
					foreach ($reviews as $value)
					{
						echo "<li><a href='#'>{$value['review']}</a></li>";
					}
				?>
			</ul>
		</div>
	</div>
</body>
</html>