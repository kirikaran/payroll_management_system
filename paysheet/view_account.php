<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  </head>
  <body>     
     
      <?php
    @$id=$_REQUEST['mem_id'];
        
    $conn = mysqli_connect('localhost', 'root', '','paysheet');
    
  

    $query  = "SELECT * from member where mem_id='".$id."'";
    
    $result = mysqli_query($conn,$query) or die ( mysql_error());
        

        $query  = mysqli_query($conn, "SELECT * from attendance where at_id= '".$id."'");
        while($row = mysqli_fetch_array($query))
        {
          $attendance   = $row['attendance'];
        }

      $query  = mysqli_query($conn,"SELECT * from salary where sal_id='".$id."' ");
        while($row=mysqli_fetch_array($query))
        {
          $over_time   = $row['over_time'];
          $loan_deduction   = $row['loan_deduction'];
          $festival_advance   = $row['festival_advance'];
        
        }
      
        while ($row = mysqli_fetch_assoc($result))
        {
            $basic_salary     = 1000*$attendance;
            $deduction  = $loan_deduction +$festival_advance;
            $over=100*$over_time;
            $income   = $over+ $basic_salary;
            $netpay   = $income - $deduction;
            $member=$row['name'];
          ?>

          <table class="table table-bordered table-hover table-condensed" id="myTable">
            <tr>
              <td>Name </td>
              <td><?php echo $member;?></td>
            </tr>
            <tr>
              <td>Basic Salary</td>
              <td><?php echo $basic_salary;?>.00</td>
            </tr>
            <tr>
              <td>Loan Amount </td>
              <td><?php echo $loan_deduction;?>.00</td>
            </tr>
            <tr>
              <td>Festival Advance</td>
              <td><?php echo $festival_advance;?>.00</td>
            </tr>
            <tr>
              <td>Over Time</td>
              <td><?php echo $over;?>.00</td>
            </tr>
            <tr>
              <td>Netpay </td>
              <td> <?php echo $netpay;?>.00</td>
            </tr>
          </table>

              <form class="form-horizontal" action="update_account.php" method="post" name="form">
               
                  <!-- <div class="form-group">
                    <label class="col-sm-5 control-label">Monthly Pay sheet :</label>
                    
                    <div class="col-sm-4">
                   Name            :<?php echo $member;?>
                    <br></br>
                   Basic Salary    :1000*<?php echo $attendance;?>days =<?php echo $basic_salary;?>.00
                      <br></br>
                   Loan Amount     :                                  <?php echo $loan_deduction;?>.00
                      <br></br>
                   Festival Advance:                                <?php echo $festival_advance;?>.00
                      <br></br>
                   Over Time       :100*<?php echo $over_time;?> hours          <?php echo $over;?>.00
                      <br></br>
                  
                   Netpay          :                                          <?php echo $netpay;?>.00
                      <br></br>
                       -->

                 
              </form>
            <?php
          }
        ?>

</body>
</html>
        


    