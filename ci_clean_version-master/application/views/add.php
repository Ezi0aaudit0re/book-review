
<html>
<head>
	<title>Add books</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="#">
	<style type="text/css">
		#author{
			margin-left: 50px;
		}
		hr{
			border: 2px solid orange;
		}
		input{
			width: 300px;
			margin: 20px;
			padding: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<h4 class='pull-right'><a href="/books/allbooks">Home</a> | <a href="books/logout">Logout</a></h4>
		</div>
		<div class="row">
			<div class="col-md-7">
				<h3>Add a New Book and a Review:</h3>
				<form method='post' action='/addreview'>
					<input type='text' name='title' placeholder='Book Title'>
					<h4>Author</h4>
					<div id="author">
						<label>Select from the list:</label>
						<select name='author'>
							<?php
								foreach ($author as $value)
								{
									echo "<option>{$value['author']}</option>";	
								}
							?>
							
						</select><br>
						<label>Or add a new author</label><input type='text' name='author' placeholder="Author Name">
					</div>
					<hr>
					<textarea name="review" placeholder="REVIEW" style="margin: 0px; width: 619px; height: 107px;"></textarea>
					<br>
					<label>Rating: </label>
					<select name='rating'>
						<option name='1' value='1'>1</option>
						<option name='2' value='2'>2</option>
						<option name='3' value='3'>3</option>
						<option name='4' value='4'>4</option>
						<option name='5' value='5'>5</option>
					</select> <strong class="glyphicon glyphicon-star-empty"></strong><br>
					<input type='submit' value='Add book and review' class='btn btn-info'>
				</form>
			</div>
		</div>
	</div>
</body>
</html>