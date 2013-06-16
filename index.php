<?php

 session_start(); 

	$base_dir = getcwd();

	$link = mysql_connect('localhost', 'root', '');
	if (!$link) {
	   die('Impossible de se connecter : ' . mysql_error());
	}

	$db_selected = mysql_select_db('creators', $link);
	if (!$db_selected) {
	   die ('Impossible de sélectionner la base de données : ' . mysql_error());
	}
	
	if (isset($_GET['action']))
		$action = $_GET['action'];
	else
		$action = '';
	
	include 'functions.php';
	
	if(isset($_SESSION['user_is']) && $_SESSION['user_is'] == 1)
	{
		$header=getHeader($_SESSION['user_name']);
		$nav=getNav($_SESSION['user_name']);
	}
	
	if (isset($_GET['page']))
		$page = $_GET['page'];
	
	var_dump($_SESSION);
	
	include 'views/main.php';

?>