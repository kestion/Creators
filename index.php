<?php

	$base_dir = getcwd();
	
	if (isset($_GET['param']))
		$param = $_GET['param'];
	
	include 'interactions/form.php';
	
	$link = mysql_connect('localhost', 'root', '');
	if (!$link) {
	   die('Impossible de se connecter : ' . mysql_error());
	}

	// Rendre la base de données foo, la base courante
	$db_selected = mysql_select_db('creators', $link);
	if (!$db_selected) {
	   die ('Impossible de sélectionner la base de données : ' . mysql_error());
	}
	
	if (isset($_GET['page']))
		$page = $_GET['page'];
	
	
	include 'views/main.php';

?>