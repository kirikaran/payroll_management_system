<?php
	$conn = mysqli_connect('localhost', 'root', '','paysheet');
if(isset($_POST['submit'])!="")
  {
    @$attendance=$_POST['attendance'];
    @$at_id=$_REQUEST['mem_id'];
		$sql = mysqli_query($conn,"INSERT INTO attendance(at_id,attendance) VALUES($at_id,$attendance)");
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