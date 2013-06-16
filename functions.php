<?php

	include 'classes/connections.php';
	include 'classes/getters.php';
	include 'classes/setters.php';

	if($action == 'register')
		$errors = registerForm();
	elseif($action == 'login')
		$user = loginForm();
	elseif($action == 'disconnect')
		$user = disconnect();
	elseif($action == 'header')
		$header_res = createHeader();
	elseif($action == 'nav')
		$nav_res = createNav();
	
	function checkEmail($email){
		//check email format
		if (filter_var($email, FILTER_VALIDATE_EMAIL) == $email){
			//check if the domain has MX entries
			$aux = explode('@',$email);
			return checkdnsrr($aux[1],'MX');
		}
		return false;
	}
	
	function db_insert($values, $table)
	{
		$stringy = implode(',', $values);
		$stringy = str_replace(',', '", "', $stringy);
		
		$q = 'INSERT INTO '.$table.' VALUES ("", "'.$stringy.'")';
		$res = mysql_query($q)OR die(mysql_error());
		return true;
	}

?>