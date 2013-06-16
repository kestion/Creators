<!DOCTYPE html>

<html>

	<head>
		<title>Creators</title>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script src="assets/js/jquery.js" type="text/javascript"></script>
		<script src="assets/js/script.js" type="text/javascript"></script>
	</head>

	<body>
		<header>
			<h1>
				<?php 
					if(isset($_SESSION['user_is']) && $_SESSION['user_is'] == 1) echo 'Welcome '.$_SESSION['user_name']; 
					else echo 'Welcome to creators';
				?>!
			</h1>
			
			<?php 
				if(isset($_SESSION['user_is']) && $_SESSION['user_is'] == 1)
					include 'modules/connections_alt.php';
				else
					include 'modules/connections.php';
			?>
		</header>
		
		<!--<nav>
			Take a look at our website
		</nav>-->
		
		<article>
			<?php
				if(isset($_GET['page']))
					include 'templates/'.$page.'.php';
				elseif(isset($_SESSION['user_is']) && $_SESSION['user_is'] == 1)
					include 'templates/userpage.php';
				else
					include 'templates/homepage.php';		
			?>
		</article>
		
		<footer>
			Come back whenever you want!
		</footer>
	</body>	
	
</html>