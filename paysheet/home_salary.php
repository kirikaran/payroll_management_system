<?php
  include("auth.php"); 
  include("db.php")
?>

<?php

?>



<!DOCTYPE html>
<html lang="en">
  <head>

    
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
   
    <link href="assets/css/search.css" rel="stylesheet">
   
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

  </head>
  <body>

    <div class="container">
      <div class="masthead">
        <h3>
          <b><a href="index.php">Paysheet Management System</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b><?php echo $_SESSION['username']; ?></b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li>
              <a href="home_member.php">Member</a>
            </li>
            <li>
              <a href="home_attendance.php">Attendance</a>
            </li>
            <li class="active">
              <a href="">Salary</a>
            </li>
          </ul>
        </nav>
      </div>

        <br>
        <div class="modal-dialog">
        
     
  
        <div class="modal-content">
          <div class="modal-header" style="padding:20px 50px;">
           
            <h3 align="center"><b>Attendance Month</b></h3>
          </div>
          <div class="modal-body" style="padding:40px 50px;">

            <form class="form-horizontal" action="add_salary.php" name="form" method="post">
      <div class="form-group">
                <label class="col-sm-4 control-label">Name</label>
                <div class="col-sm-8">
                <select name="mem_id" id="id">
               
                  
                  
                <?php $connection = mysqli_connect('localhost', 'root', '','paysheet');
      
      $query = "SELECT * from member";
      $result = mysqli_query($connection,$query) or die ( mysql_error());
      while ($row = mysqli_fetch_assoc($result))
      {
        ?>
        <option value="<?php echo $row["mem_id"] ?>"><?php echo $row["name"] ?></option>
        <?php
      }
?>

                </select>
                </div>
               
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">over_time</label>
                <div class="col-sm-3">
                  <input type="number" name="over_time" class="form-control" placeholder="hours" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">loan_deduction</label>
                <div class="col-sm-3">
                  <input type="number" name="loan_deduction" class="form-control" placeholder="amount" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">festival_advance</label>
                <div class="col-sm-3">
                  <input type="number" name="festival_advance" class="form-control" placeholder="amount" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label"></label>
                <div class="col-sm-8">
                  <input type="submit" name="submit" class="btn btn-success"   value="Submit">
                  <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                </div>

            </form>

          </div>
        </div>
      </div>
  </div>
  <div>

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

   
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
   
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>
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