<?php
  include("auth.php"); //include auth.php file on all secure pages
  include("db.php")
?>

<?php
// $conn = mysqli_connect('localhost', 'root', '','paysheet');
//   $query  = mysqli_query($conn,"SELECT * from salary");
//   while($row=mysqli_fetch_array($query))
//   {
// 							$basic_salary= $basic_salary['basic_salary'];
// 							$over_time=$over_time['over_time'];
// 							$loan_deduction=$loan_deduction['loan_deduction'];
// 							$festival_advance=$festival_advance['festival_advance'];
//   }

//   $query  = mysqli_query($conn,"SELECT * from salary");
//   while($row=mysqli_fetch_array($query))
//   {
//     @$salary           = $row['salary_rate'];
//   }
?>



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

    <title></title>

    <script>
    </script>

    <link href="assets/must.png" rel="shortcut icon">
    <link href="assets/css/justified-nav.css" rel="stylesheet">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
    <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
    <link href="assets/css/search.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

  </head>
  <body>

    <div class="container">
      <div class="masthead">
        <h3>
          <b><a href="index.php">Payroll Management System</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b>Admin</b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li>
              <a href="home_employee.php">Member</a>
            </li>
            <li>
              <a href="home_deductions.php">Attendance</a>
            </li>
            <li class="active">
              <a href="">Salary</a>
            </li>
          </ul>
        </nav>
      </div>

        <br>
          <div class="well bs-component">
            <form class="form-horizontal">
            <?php
              $query = "SELECT * from member where mem_id='".$id."'";
$connection = mysqli_connect('localhost', 'root', '','paysheet');
       

       

          ?>

              <form class="form-horizontal" action="update_salary.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="id" type="hidden"  />
                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Basic Salary  :</label>
                    <div class="col-sm-4">
                      <input type="number" name="basic_salary" class="form-control" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Address  :</label>
                    <div class="col-sm-4">
                      <input type="number" name="over_time" class="form-control"  required="required">
                    </div>
                  </div>
                  <div class="form-group">
					<label class="col-sm-5 control-label">Age :</label>
					<div class="col-sm-4">
						<input type="number" name="loan_deduction" class="form-control" required="required">
					</div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Join Date :</label>
                  <div class="col-sm-4">
                   <input type="number" name="festival_advance" class="form-control"  required="required">
                  </div>
                  </div>
                  
                  </div><br><br>

                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" value="Update" class="btn btn-danger">
                      <a href="home_salary.php" class="btn btn-primary">Cancel</a>
                    </div>
                  </div>
              </form>
            <?php
          
        ?>

      <!-- this modal is for my Colins -->
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
              
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div align="center">
                <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>


      <!-- this modal is for OVERTIME -->
      <div class="modal fade" id="overtime" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">Enter the amount of <big><b>Overtime</b></big> rate per hour.</h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="update_overtime.php" name="form" method="post">
                <div class="form-group">
                    <input type="text" name="rate" class="form-control" value="<?php echo $rate; ?>" required="required">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

      <!-- this modal is for SALARY -->
      <div class="modal fade" id="salary" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">Enter the amount of <big><b>Salary</b></big> rate.</h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="update_salary.php" name="form" method="post">
                <div class="form-group">
                    <input type="text" name="salary_rate" class="form-control" value="<?php echo $salary; ?>" required="required">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

      <!-- this modal is for my Colins -->
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
              
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div align="center">
                <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

    <!-- FOR DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!-- this function is for modal -->
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>

  </body>
</html>