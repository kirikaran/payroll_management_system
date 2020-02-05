<?php
  include("auth.php"); 
  include("add_employee.php");

  // $sql = mysqli_query($conn,"SELECT * from salary WHERE sal_id='1'");
  // while($row = mysqli_fetch_array($sql))
  // {
  //   $phil = $row['philhealth'];
  //   $bir = $row['bir'];
  //   $gsis = $row['gsis'];
  //   $love = $row['pag_ibig'];
  //   $loans = $row['loans'];
  // }
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   

    

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
          <b><a href="index.php">Payroll Management System</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b>Admin</b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li class="active">
              <a href="">Member</a>
            </li>
            <li>
              <a href="home_deductions.php">Attendance</a>
            </li>
            <li>
              <a href="home_salary.php">Salary</a>
            </li>
          </ul>
        </nav>
      </div>

        <br>
          <div class="well bs-component">
            <form class="form-horizontal">
              <fieldset>
                <button type="button" data-toggle="modal" data-target="#addEmployee" class="btn btn-success">Add New</button>
                <p align="center"><big><b>List of Members</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
                          <th><p align="center">Name</p></th>
                          <th><p align="center">Address</p></th>
                          <th><p align="center">Age</p></th>
                          <th><p align="center">Join Date</p></th>
						  <th><p align="center">Action</p></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                         $conn = mysqli_connect('localhost', 'root', '','paysheet');
                        
                          
                          $query=mysqli_query( $conn,"select * from member ORDER BY mem_id asc")or die(mysql_error());
                          while($row=mysqli_fetch_array($query))
                          {
                            $id     =$row['mem_id'];
                            $name  =$row['name'];
                            $address  =$row['address'];
                            $age   =$row['age'];
                            $join_date   =$row['join_date'];
                            
                        ?>

                        <tr>
                          <td align="center"><a href="view_employee.php?mem_id=<?php echo $row["mem_id"]; ?>" title="Update"><?php echo $row['name'] ?>
                          <td align="center"><a href="view_employee.php?mem_id=<?php echo $row["mem_id"]; ?>" title="Update"><?php echo $row['address'] ?></a></td>
                          <td align="center"><a href="view_employee.php?mem_id=<?php echo $row["mem_id"]; ?>" title="Update"><?php echo $row['age'] ?></a></td>
                          <td align="center"><a href="view_employee.php?mem_id=<?php echo $row["mem_id"]; ?>" title="Update"><?php echo $row['join_date'] ?></a></td>
                          <td align="center">
                            <a class="btn btn-primary" href="view_employee.php?mem_id=<?php echo $row["mem_id"]; ?>">Update</a>
                            <a class="btn btn-danger" href="delete.php?mem_id=<?php echo $row["mem_id"]; ?>">Delete</a>
                            <a class="btn btn-primary" href="view_account.php?mem_id=<?php echo $row["mem_id"]; ?>">Account</a>
                          </td>
                        </tr>

                        <?php } ?>
                      </tbody>
                      
                        
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

      <!-- this modal is for ADDING an EMPLOYEE -->
      <div class="modal fade" id="addEmployee" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Add Employee</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="#" name="form" method="post">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Name</label>
                  <div class="col-sm-8">
                    <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Address</label>
                  <div class="col-sm-8">
                    <input type="text" name="address" class="form-control" placeholder="Address" required="required">
                  </div>
                </div>
               <div class="form-group">
                  <label class="col-sm-4 control-label">Age</label>
                  <div class="col-sm-8">
                    <input type="number" name="age" class="form-control" placeholder="Age" required="required">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-4 control-label">Join Date</label>
                  <div class="col-sm-8">
                    <input type="date" name="join_date" class="form-control" placeholder="Join Date" required="required">
                  </div>
                </div>
               

                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                    <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                  </div>
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