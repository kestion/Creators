<?php
	function loginForm()
	{
		if(isset($_POST['login']) && isset($_POST['psswd']))
		{
			$login = mysql_real_escape_string($_POST['login']);
			$psswd = mysql_real_escape_string($_POST['psswd']);
			
			$q = 'SELECT * FROM users WHERE login LIKE "'.$login.'" AND password LIKE "'.$psswd.'"';
			$res = mysql_query($q)OR die(mysql_error());
			$user = mysql_fetch_row($res);
			
			if($user == true)
			{
				$_SESSION['user_is'] = 1;
				$_SESSION['user_id'] = $user[0];
				$_SESSION['user_name'] = $user[1];
			}
			
			return $user;
		}
		else
			return false;
	}
	
	function registerForm()
	{
		$errors = array();
		if(isset($_POST) && !empty($_POST))
		{
			if(!empty($_POST['login']) && ctype_alpha($_POST['login']))	
				$login = mysql_real_escape_string($_POST['login']);
			else
				$errors['login'] = 'Login not set';
			
			if(!empty($_POST['psswd']) && !empty($_POST['psswd_verif']))
			{
				if($_POST['psswd'] == $_POST['psswd_verif'])
					$psswd = mysql_real_escape_string($_POST['psswd']);
				else
					$errors['psswd'] = 'Passwords don\'t match';
			}
			else 
				$errors['psswd'] = 'Passwords not set';
		
			if(!empty($_POST['email']) && !empty($_POST['email_verif']))
			{
				if($_POST['email'] == $_POST['email_verif'])
				{
					$email = mysql_real_escape_string($_POST['email']);
					if(checkEmail($email) == false)	
						$errors['email'] = 'Email not valid';
				}
				else
					$errors['email'] = 'Email don\'t match';
			}
			else 
				$errors['email'] = 'Email not set';
			
		}
		else
			return false;
		
		if(empty($errors))
		{
			db_register($login, $psswd, $email);
			make_website($login);
		}
		else
			return $errors;	
	}

	function db_register($login, $psswd, $email)
	{
		$login_verif = 'SELECT login FROM users WHERE login LIKE "'.$login.'"';
		$login_res = mysql_query($login_verif)OR die(mysql_error());
		$login_data = mysql_fetch_row($login_res);
		
		$email_verif = 'SELECT email FROM users WHERE email LIKE "'.$email.'"';
		$email_res = mysql_query($email_verif)OR die(mysql_error());
		$email_data = mysql_fetch_row($email_res);
		
		if($login_data == false || $email_data == false)
		{
			$q = 'INSERT INTO users VALUES ("", "'.$login.'","'.$psswd.'","'.$email.'")';
			$res = mysql_query($q)OR die(mysql_error());
			return true;
		}
		else
			return false;
	}

	function disconnect()
	{
		$_SESSION = array();
		session_destroy(); 
	}
	
	function make_website($login)
	{
			$dir_path = 'users/'.$login;
			$template_path = $dir_path.'/views';
			$media_path = $dir_path.'/media';
			
			$index_path = $dir_path.'/index.php';
			$main_path = $dir_path.'/main.php';
			$header_path = $template_path.'/header.html';
			$nav_path = $template_path.'/nav.html';
			$footer_path = $template_path.'/footer.html';
			
			$index_txt = '<?php include \'main.php\'; ?>';
			$main_txt = '
<!DOCTYPE html>

<html>

	<head>
		<title>'.$login.'</title>
		<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
		<script src="../../assets/js/jquery.js" type="text/javascript"></script>
		<script src="../../assets/js/script.js" type="text/javascript"></script>
	</head>

	<body>
		<?php include "views/header.html" ?>
		<?php include "views/nav.html" ?>
		<?php include "views/footer.html" ?>
	</body>

</html>';
			
			mkdir($dir_path, 0700);
			mkdir($template_path, 0700);
			mkdir($media_path, 0700);
			
			$handle = fopen($index_path, "w");
			fwrite($handle, $index_txt);
			fclose($handle);
			
			$handle = fopen($main_path, "w");
			fwrite($handle, $main_txt);
			fclose($handle);
			
			$handle = fopen($header_path, "w");
			fclose($handle);
			
			$handle = fopen($nav_path, "w");
			fclose($handle);
			
			$handle = fopen($footer_path, "w");
			fclose($handle);
	}
	
?>