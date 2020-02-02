
 <?php

$conn = mysqli_connect('localhost', 'root', '','paysheet');
if(isset($_POST['submit'])!="")
{
	
	//@$sal_id=$_POST['mem_id'];
	//@$mem_id=$_GET['mem_id'];
	$over_time = $_POST['over_time'];
	$loan_deduction   = $_POST['loan_deduction'];
	$festival_advance= $_POST['festival_advance'];
@$sal_id=$_REQUEST['mem_id'];


	$sql = mysqli_query($conn,"INSERT INTO salary(sal_id,over_time,loan_deduction,festival_advance) VALUES($sal_id,$over_time,$loan_deduction,$festival_advance)");

	if($sql)
{
  ?>
	<script>
		alert('Attendance had been successfully added.');
		window.location.href='view_account.php';
	</script>
  <?php 
}

else
{
  ?>
	<script>
		alert('Invalid.');
		window.location.href='index.php';
	</script>
  <?php 
}
}
?>