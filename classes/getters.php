<?php
	function getHeader($user)
	{
		$q = 'SELECT * FROM headers WHERE id_user = "'.$_SESSION['user_id'].'"';
		$res = mysql_query($q)OR die(mysql_error());
		$rows = mysql_fetch_row($res);
		
		return $rows;
	}
	
	function getNav($user)
	{
		$q = 'SELECT * FROM pages WHERE id_user = "'.$_SESSION['user_id'].'"';
		$res = mysql_query($q)OR die(mysql_error());
		
		$index = 0;
		while($row = mysql_fetch_assoc($res)) // loop to give you the data in an associative array so you can use it however.
		{
		     $rows[$index] = $row;
		     $index++;
		}
		
		if(isset($rows))
			return $rows;
		else
			return false;
	}
	
?>