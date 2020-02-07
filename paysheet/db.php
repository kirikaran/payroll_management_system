<?php
	$connection = mysqli_connect('localhost', 'root', '','paysheet');
	if (!$connection)
	{
		die("Database Connection Failed" . mysql_error());
	}	
?>