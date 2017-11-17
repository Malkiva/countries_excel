<?php

function get_countries()
	{
		
		$sql = "SELECT * FROM country";
		
		$result = mysql_query($sql);

		if (!$result) {
			exit(mysql_error());
		}

		$row = array();

		for ($i = 0; $i < mysql_num_rows($result); $i++) {

			$row[] = mysql_fetch_assoc($result);	

		}
		return $row;
	}

		


?>







