<?php 

  include("db.php");
  include("auth.php");
	$id=$_POST['id'];
  $name      = $_POST['name'];
    $address = $_POST['address'];
    $age   = $_POST['age'];
    $join_date= $_POST['join_date'];
$connection = mysqli_connect('localhost', 'root', '','paysheet');
  $sql = mysqli_query($connection,"UPDATE member SET name='$name', address='$address', age='$age', join_date='$join_date'  WHERE mem_id='$id' ");

  if ($sql)
  {
    ?>
    <script>
      alert('member successfully updated.');
      window.location.href='home_member.php';
    </script>
    <?php 
  }
  else
  {
    ?>
    <script>
      alert('Invalid action.');
      window.location.href='home_member.php';
    </script>
    <?php 
  }
?>