<?php

	define("HOST", "localhost");
	define("USER", "malkivan");
	define("PASSWORD", "123");
	define("DB", "countries");


	$db = mysql_connect(HOST, USER, PASSWORD);
		if (!$db) {
			
			exit('WRONG CONNECTION');

		}

	if (!mysql_select_db('countries', $db)) {
	
		 exit(DB);
	
	}

	mysql_query('SET NAMES utf8');

?>