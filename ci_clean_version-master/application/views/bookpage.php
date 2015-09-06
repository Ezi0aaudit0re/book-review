
<html>
<head>
	<title>Book page</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="#">
	<style type="text/css">
		
		input,select{
			padding: 5px;
			margin: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="pull-right">
				<h5><a href="/books/books">Home</a> | <a href="/books/logout">Logout</a></h5>
			</div>
		</div>
		<div class="row">
			<h4>Book Name: <?=$name?></h4>
			<h5>Author: <?=$author?></h5>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-8 pull-left">
				<h4>Reviews</h4><br>
				<ul>
					<?php
						foreach ($review as $value) {
						
						
					?>
					<li>
						<div class="panel panel-warning">
		  					<div class="panel-heading">
							    <h3 class="panel-title"><?=$value['rating']?> <strong class="glyphicon glyphicon-star-empty"></strong></h3>
							</div>
							<div class="panel-body">
							    <?php
							    	echo "<a href=/books/users/{$value['id']}>" . $value['alias'] . "</a> says: " . $value['review'] . "<br><hr>";
							    	echo $value['created_at'];
							    ?>
							</div>
						</div>
					</li><hr>
					<?php } ?>
				</ul>
			</div>
			<div class="col-md-4 pull-right" id='review'>
				<form action='/reviewadd/<?=$info[0]['id'];?>' method='post'>
					<h4>Review</h4>
					<textarea placeholder="Add a Review" name="review" style="margin: 0px; width: 365px; height: 96px;"></textarea>
					<br>
					<label>Rating</label>
					<select name='rating'>
						<option name='1' value='1'>1</option>
						<option name='2' value='2'>2</option>
						<option name='3' value='3'>3</option>
						<option name='4' value='4'>4</option>
						<option name='5' value='5'>5</option>
					</select> <strong class="glyphicon glyphicon-star-empty"></strong><br>
					<input type='submit' value='submit'>
				</form>
			</div>
		</div>
	</div>
</body>
</html>