      <?php
        
		$conn = mysqli_connect('localhost', 'root', '','paysheet');
    
    
    $result = mysqli_query($conn,$query) or die ( mysql_error());
        

        $query  = mysqli_query($conn, "SELECT * from attendance");
        while($row = mysqli_fetch_assoc($result))
        {
          $attendance   = $row['attendance'];
        }

      $query  = mysqli_query($conn,"SELECT * from salary");
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
          ?>

              <form class="form-horizontal" action="update_account.php" method="post" name="form">
               
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Netpay  :</label>
                    
                    <div class="col-sm-4">
                      <?php echo $basic_salary;?>.00
                      <br></br>
                      <?php echo $deduction;?>.00
                      <br></br>
                      <?php echo $over;?>.00
                      <br></br>
                      <?php echo $income;?>.00
                      <br></br>
                      <?php echo $netpay;?>.00
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

    