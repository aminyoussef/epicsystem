<?php

session_start([
    'cookie_lifetime' => 86400
    ]);
	session_unset(); // Unset The Data

	session_destroy(); // Destory The Session

	header('Location: index.php');

	exit();