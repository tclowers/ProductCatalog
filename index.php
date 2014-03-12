<html>
	<head>
		<title>Product Catalog</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="application.js"></script>
		<link rel="stylesheet" type="text/css" href="application.css" />
	</head>
	<body>
		<div id="wrapper" class='container'>
		<nav class="navbar navbar-default" role="navigation">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
				<li class="nav-item"><a href="index.php?resource=product&action=index">Products</a></li>
				<!--<li class="nav-item"><a href="index.php?resource=customer&action=index">Customers</a></li>
				<li class="nav-item"><a href="index.php?resource=order&action=index">View Orders</a></li>-->
				</ul>
			</div>
		</nav>
			<?php
				//everything is in here
				require 'routes.php'				
			?>
		</div>
	</body>
</html>