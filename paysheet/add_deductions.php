<?php

	$conn = mysqli_connect('localhost', 'root', '','paysheet');
if(isset($_POST['submit'])!="")
  {
		
		//@$sal_id=$_POST['mem_id'];
		//@$mem_id=$_GET['mem_id'];
    @$attendance=$_POST['attendance'];
    @$sal_id=$_REQUEST['mem_id'];
   
		$sql = mysqli_query($conn,"INSERT INTO salary(sal_id,attendance) VALUES($sal_id,$attendance)");

		if($sql)
    {
      ?>
        <script>
            alert('Attendance had been successfully added.');
            window.location.href='index.php';
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