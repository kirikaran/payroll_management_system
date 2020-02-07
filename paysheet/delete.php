<?php 
	require('db.php');
	$conn = mysqli_connect('localhost', 'root', '','paysheet');
	$id=$_GET['mem_id'];
	
	$query = "DELETE FROM member WHERE mem_id=$id"; 
	$result = mysqli_query($conn,$query) or die ( mysql_error());
	header("Location: home_member.php"); 
 ?>