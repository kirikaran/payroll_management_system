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

              <form class="form-horizontal" action="update_account.php" method="post" name="form">
               
                  <div class="form-group">
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
                      

                    </div>
                  </div><br><br>
                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" value="Update" class="btn btn-danger">
                      <a href="home_employee.php" class="btn btn-primary">Cancel</a>
                    </div>
                  </div>
              </form>
            <?php
          }
        ?>
        


    