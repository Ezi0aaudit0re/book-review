
<html>
<head>
	<title>Books</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/assets/allbooks.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 class='pull-left'>Welcome <?=$info[0]['alias'];?> !!</h2>
			<h5 class="pull-right"><a href="/books/add">Add Book and review</a> | <a href="/books/logout">Logout</a></h5>
		</div>
		<div class="row">
			<div class="col-md-8 pull-left">
				<h5>Recent Book Reviews:</h5>
				<?php
					
					foreach ($lastthree as $value)
						
					{ ?>
						
					
				
				<div class="panel panel-warning">
  					<div class="panel-heading">
					    <h3 class="panel-title"><a href="/books/bookpage/<?=$value['id']?>/<?=$value['name']?>/<?=$value['author']?>"><?=$value['name']?></a></h3>
					</div>
					<div class="panel-body">
					    <?php

					    	echo $value['rating'] . " <strong class='glyphicon glyphicon-star-empty'></strong><br><hr>";
					    	echo $value['alias'] . " says: " . $value['review'] . "<br><hr>";
					    	echo "Posted at {$value['created_at']}";
					    ?>
					</div>
				</div>
				<?php } ?>
			</div>
		
		
			<div class="col-md-4  pull-right" id='otherbooks'>
				<h5>Other book with reviews</h5>
				<div id='books' style='overflow-y:scroll'>
					<ul>	
						<?php
							foreach ($books as $value)
							{
								
								echo "<li><a href='/bookpage/{$value['id']}/{$value['name']}/{$value['author']}'>{$value['name']}</a></li>";
							}
						?>
					</ul>	
				</div>
			</div>
		</div>
	</div>
</body>
</html><li>