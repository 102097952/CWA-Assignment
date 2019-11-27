<?php
	$host = "feenix-mariadb.swin.edu.au";
	$user = "s102097952";
	$pwd = "310799";
	$sql_db = "s102097952_db";
	
	$conn = @mysql_connect(
		$host, 
		$user,
		$pwd,
		$sql_db
	);
?>