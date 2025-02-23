<?php

	// Error Reporting

	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include 'connect.php';

	$sessionUser = '';
	
	if (isset($_SESSION['user'])) {
		$sessionUser = $_SESSION['user'];
	}
	
	// Routes

	$css 	= 'layout/css/'; // Css Directory
	$js 	= 'layout/js/'; // Js Directory
    
	include 'page/functions.php';
	include 'page/head.php';
	

	