<?php

	$dsn = 'mysql:host=localhost;dbname=epicsystem';
	$user = 'root';
	$pass = '';


	$option = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);

	try {
		$con = new PDO($dsn, $user, $pass, $option);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch(PDOException $e) {
		echo 'Failed To Connect' . $e->getMessage();
	}

// if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
// {
    //     //Tell the browser to redirect to the HTTPS URL.
    //     header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
    //     //Prevent the rest of the script from executing.
    //     exit;
    // }
    
    
    
