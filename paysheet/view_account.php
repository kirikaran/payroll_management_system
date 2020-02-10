<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Meta, title, CSS, favicons, etc. -->
    <!-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <!-- <link href="assets/Ex.css" rel="stylesheet"> -->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="example.css">

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
            $mem=$row['mem_id'];
          ?>

          <!-- <table class="table table-bordered table-hover table-condensed" id="myTable">
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
          </table> -->

          <div class="container">
	<div class="row">
		
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
							<img class="img-responsive" alt="#" src="#" style="width: 71px; border-radius: 43px;">
						</div>
					</div>
					
				</div>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h5>Name:<?php echo $member;?></h5>
							<p><b>Mem Id :</b><?php echo $mem;?></p>
							
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							
						</div>
					</div>
				</div>
            </div>
			
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9">Basic Salary 1000*<?php echo $attendance;?> days </td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $basic_salary;?></td>
                        </tr>
                        <tr>
                            <td class="col-md-9">Over Time 100*<?php echo $over_time;?></td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $over;?></td>
                        </tr>
                       
                        <tr>
                            <td class="text-right">
                            <p>
                                <strong>Total Income Amount: </strong>
                            </p>
                           
							</td>
                            <td>
                            <p>
                                <strong><i class="fa fa-inr"></i> <?php echo $income;?></strong>
                            </p>
                           
							</td>
                        </tr>
                        <tr>
                            <td class="col-md-9">Loan Amount </td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $loan_deduction;?></td>
                        </tr>
                         <tr>
                            <td class="col-md-9">Festival Advance </td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $festival_advance;?></td>
                        </tr>
                        <tr>
                           
                            <td class="text-right"><h2><strong>Netpay: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> <?php echo $netpay;?></strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h1>Signature</h1>
						</div>
					</div>
				</div>
            </div>
			
        </div>    
	</div>
</div>

              
            <?php
          }
        ?>

</body>
</html>
        


    
