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
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
						<div class="receipt-right">
							<h5>TechiTouch.</h5>
							<p>+91 12345-6789 <i class="fa fa-phone"></i></p>
							<p>info@gmail.com <i class="fa fa-envelope-o"></i></p>
							<p>Australia <i class="fa fa-location-arrow"></i></p>
						</div>
					</div>
				</div>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h5>Gurdeep Singh <small>  |   Lucky Number : 156</small></h5>
							<p><b>Mobile :</b> +91 12345-6789</p>
							<p><b>Email :</b> info@gmail.com</p>
							<p><b>Address :</b> Australia</p>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h1>Receipt</h1>
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
                            <td class="col-md-9">Payment for August 2016</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> 15,000/-</td>
                        </tr>
                        <tr>
                            <td class="col-md-9">Payment for June 2016</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> 6,00/-</td>
                        </tr>
                        <tr>
                            <td class="col-md-9">Payment for May 2016</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> 35,00/-</td>
                        </tr>
                        <tr>
                            <td class="text-right">
                            <p>
                                <strong>Total Amount: </strong>
                            </p>
                            <p>
                                <strong>Late Fees: </strong>
                            </p>
							<p>
                                <strong>Payable Amount: </strong>
                            </p>
							<p>
                                <strong>Balance Due: </strong>
                            </p>
							</td>
                            <td>
                            <p>
                                <strong><i class="fa fa-inr"></i> 65,500/-</strong>
                            </p>
                            <p>
                                <strong><i class="fa fa-inr"></i> 500/-</strong>
                            </p>
							<p>
                                <strong><i class="fa fa-inr"></i> 1300/-</strong>
                            </p>
							<p>
                                <strong><i class="fa fa-inr"></i> 9500/-</strong>
                            </p>
							</td>
                        </tr>
                        <tr>
                           
                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> 31.566/-</strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<p><b>Date :</b> 15 Aug 2016</p>
							<h5 style="color: rgb(140, 140, 140);">Thank you for your business!</h5>
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
        


    