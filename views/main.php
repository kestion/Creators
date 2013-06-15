<!DOCTYPE html>

<html>

	<head>
		<title>Creators</title>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script src="assets/js/jquery.js" type="text/javascript"></script>
		<script src="assets/js/script.js" type="text/javascript"></script>
	</head>

	<body>
		<header><?php if(!empty($errors)) echo '<style="display:block;">'; ?>
			Welcome to creators!<br />
			<p id="register">Register</p>
			<form action="index.php?action=form&param=register" method="post" 
			id="register_form" <?php if(!empty($errors)) echo '<style="display:block;">' ?>>
				<label for="login">Login</label>
				<input type="text" name="login" placeholder="login" /><br />
				<?php
					if(isset($errors['login']))
						echo $errors['login'];
				?>
				<label for="psswd">Password</label>
				<input type="text" name="psswd" placeholder="password" /><br />
				<label for="psswd_verif">Password</label>
				<input type="text" name="psswd_verif" placeholder="password" /><br />
				<label for="email">Email</label>
				<input type="text" name="email" placeholder="email" /><br />
				<label for="email_verif">Email</label>
				<input type="text" name="email_verif" placeholder="email" /><br />
				<input type="submit" value="register" />
			</form>
		</header>
		<nav>
			Take a look at our website
		</nav>
		<page>
			<?php
				if(isset($_GET['page']))
					include 'templates/'.$page.'.php';
				else
					include 'templates/homepage.php';		
			?>
		</page>
		<footer>
			Come back whenever you want!
		</footer>
	</body>	
	
</html>