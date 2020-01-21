<?php
	$connection = mysqli_connect('localhost', 'root', '','payroll');

	if (!$connection)
	{
		die("Database Connection Failed" . mysql_error());
	}

	
	
?>