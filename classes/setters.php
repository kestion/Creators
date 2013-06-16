<?php
	function createHeader()
	{
		if(isset($_POST) && !empty($_POST))
 		{
 			$errors = array();
			$header = array();
			$header['id_user'] = $_SESSION['user_id'];
			
			if(!empty($_POST['background']) && ctype_alnum($_POST['background']))
				$header['background'] = mysql_real_escape_string($_POST['background']);
			else 
				$errors['background'] = 'invalid value';
				
			if(!empty($_POST['logo']) && ctype_alnum($_POST['logo']))
				$header['logo'] = mysql_real_escape_string($_POST['logo']);
			else 
				$errors['logo'] = 'invalid value';
			
			if(!empty($_POST['title']) && ctype_alpha($_POST['title']))
				$header['title'] = mysql_real_escape_string($_POST['title']);
			else 
				$errors['title'] = 'invalid value';
			
			if(!empty($_POST['title_pos']) && ctype_alpha($_POST['title_pos']))
				$header['title_pos'] = mysql_real_escape_string($_POST['title_pos']);
			else 
				$errors['title_pos'] = 'invalid value';
			
			if(!empty($_POST['logo_pos']) && ctype_alpha($_POST['logo_pos']))
				$header['logo_pos'] = mysql_real_escape_string($_POST['logo_pos']);
			else 
				$errors['logo_pos'] = 'invalid value';
			
			if(!empty($_POST['font_size']) && ctype_digit($_POST['font_size']))
				$header['font_size'] = mysql_real_escape_string($_POST['font_size']);
			else 
				$errors['font_size'] = 'invalid value';
				
			if(!empty($_POST['color']) && ctype_alnum($_POST['color']))
				$header['color'] = mysql_real_escape_string($_POST['color']);
			else 
				$errors['color'] = 'invalid value';
			
			if(!empty($_POST['font_style']) && ctype_alpha($_POST['font_style']))
				$header['font_style'] = mysql_real_escape_string($_POST['font_style']);
			else 
				$errors['font_style'] = 'invalid value';
			
			if(!empty($_POST['size']) && ctype_alnum($_POST['size']))
				$header['size'] = mysql_real_escape_string($_POST['size']);
			else 
				$errors['size'] = 'invalid value';
		
			if(!empty($errors))
				$res =$errors;
			else
			{
				db_insert($header, 'headers');	
				$res = true;
			}
			
			return $res;
 		}	
		else
			return false;
	}

		function createNav()
	{
		if(isset($_POST) && !empty($_POST))
 		{
 			$errors = array();
			$nav = array();
			$nav['id_user'] = $_SESSION['user_id'];
			
			if(!empty($_POST['title']) && ctype_alnum($_POST['title']))
				$nav['title'] = mysql_real_escape_string($_POST['title']);
			else 
				$errors['title'] = 'invalid value';
				
			if(!empty($errors))
				$res =$errors;
			else
			{
				db_insert($nav, 'pages');	
				$res = true;
			}
			
			return $res;
 		}	
		else
			return false;
	}
?>