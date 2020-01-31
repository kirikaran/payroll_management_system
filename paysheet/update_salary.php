<?php
	include("db.php");
	include("auth.php");
	  $id=$_POST['id'];
	 
	$basic_salary      = $_POST['basic_salary'];
	  $over_time = $_POST['over_time'];
	  $loan_deduction   = $_POST['loan_deduction'];
	  $festival_advance= $_POST['festival_advance'];
  $connection = mysqli_connect('localhost', 'root', '','paysheet');
	$sql = mysqli_query($connection,"UPDATE salary SET basic_salary='$basic_salary', over_time='$over_time', loan_deduction='$loan_deduction', festival_advance='$festival_advance'  WHERE sal_id='$id' ");
  
	if ($sql)
	{
	  ?>
	  <script>
		alert('member successfully updated.');
		window.location.href='home_salary.php';
	  </script>
	  <?php 
	}
	else
	{
	  ?>
	  <script>
		alert('Invalid action.');
		window.location.href='home_employee.php';
	  </script>
	  <?php 
	}
 ?>