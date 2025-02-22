<?php
  include("db.php"); //include auth.php file on all secure pages
  include("auth.php");

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
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

  </head>
  <body>

    <div class="container">
      <div class="masthead">
        <h3>
          <b><a href="index.php">Paysheet Management System</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b>Admin</b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li class="active">
              <a href="">Member</a>
            </li>
            <li>
              <a href="home_attendance.php">Attendance</a>
            </li>
            <li>
              <a href="home_salary.php">Salary</a>
            </li>
          </ul>
        </nav>
      </div><br><br>

      <?php
$connection = mysqli_connect('localhost', 'root', '','paysheet');
        $id=$_REQUEST['mem_id'];
        $query = "SELECT * from member where mem_id='".$id."'";
        $result = mysqli_query($connection,$query) or die ( mysql_error());

        while ($row = mysqli_fetch_assoc($result))
        {

          ?>

              <form class="form-horizontal" action="update_member.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="id" type="hidden" value="<?php echo $row['mem_id'];?>" />
                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <h2><?php echo $row['name']; ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Name  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="name" class="form-control" value="<?php echo $row['name'];?>" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Address  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="address" class="form-control" value="<?php echo $row['address'];?>" required="required">
                    </div>
                  </div>
                  <div class="form-group">
					<label class="col-sm-5 control-label">Age :</label>
					<div class="col-sm-4">
						<input type="text" name="age" class="form-control" value="<?php echo $row['age'];?>" required="required">
					</div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Join Date :</label>
                  <div class="col-sm-4">
                   <input type="text" name="join_date" class="form-control" value="<?php echo $row['join_date'];?>" required="required">
                  </div>
                  </div>
                  
                  </div><br><br>

                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" value="Update" class="btn btn-danger">
                      <a href="home_member.php" class="btn btn-primary">Cancel</a>
                    </div>
                  </div>
              </form>
            <?php
          }
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