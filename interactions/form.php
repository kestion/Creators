<?php

	if($param == 'register')
	{
		$errors = registerForm();
	}
	
	function checkEmail($email){
		//check email format
		if (filter_var($email, FILTER_VALIDATE_EMAIL) == $email){
			//check if the domain has MX entries
			$aux = explode('@',$email);
			return checkdnsrr($aux[1],'MX');
		}
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

?>