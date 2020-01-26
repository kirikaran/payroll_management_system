<?php
  $conn = mysqli_connect('localhost', 'root', '','paysheet');
 

  if(isset($_POST['submit'])!="")
  {
    $name      = $_POST['name'];
    $address      = $_POST['address'];
    $age     = $_POST['age'];
    $join_date= $_POST['join_date'];

    $sql = mysqli_query($conn,"INSERT into member(name, address, age, join_date)VALUES('$name','$address','$age', '$join_date')");

    if($sql)
    {
      ?>
        <script>
            alert('member had been successfully added.');
            window.location.href='home_employee.php?page=emp_list';
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