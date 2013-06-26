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
				$header_path = 'users/'.$_SESSION['user_name'].'/views/header.html';
				$footer_path = 'users/'.$_SESSION['user_name'].'/views/footer.html';
				
				$size = explode('x', $header['size']);
				$header_txt = '
	<header style="width:'.$size[0].'px; height:'.$size[1].'px; line-height:'.$size[1].'px; background:#'.$header['background'].'; font-style:'.$header['font_style'].'; font-size:'.$header['font_size'].'px; color:#'.$header['color'].';">
		<p style="float:'.$header['title_pos'].';">
			'.$header['title'].'
		</p>
		<div class="clear"> </div>
	</header>';
	
				$footer_txt = '
	<footer style="width:'.$size[0].'px; text-align:center; line-height:50px; height:50px; background:#'.$header['background'].'; font-style:'.$header['font_style'].'; font-size:'.$header['font_size'].'px; color:#'.$header['color'].';">
		<p>www.creators.com</p>
	</footer>'; 
			 
				$handle = fopen($header_path, "w");
				fwrite($handle, $header_txt);
				fclose($handle);
				
				$handle = fopen($footer_path, "w");
				fwrite($handle, $footer_txt);
				fclose($handle);
			
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
				$nav_path = 'users/'.$_SESSION['user_name'].'/views/nav.html';
				db_insert($nav, 'pages');	
				
				$q = 'SELECT * FROM pages WHERE id_user = "'.$_SESSION['user_id'].'"';
				$res = mysql_query($q)OR die(mysql_error());
				
				$index = 0;
				while($row = mysql_fetch_assoc($res)) // loop to give you the data in an associative array so you can use it however.
				{
				     $rows[$index] = $row;
				     $index++;
				}
				
				$i =0;
				$titles = array();
				foreach($rows as $v)
					{
						$titles[$i] = '<li style="display:inline;">'.$v['title'].'</li>';
						$i++;
					}
				$nav_li= implode('', $titles);
			
				$nav_txt = '
				<nav>
					<ul style="width:100%; padding:0;">
							'.$nav_li.'
					</ul>
				</nav>';
					
				$handle = fopen($nav_path, "w");
				fwrite($handle, $nav_txt);
				fclose($handle);
					
				$res = true;
			}
			
			return $res;
 		}	
		else
			return false;
	}
?>