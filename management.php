<?php
session_start();
?>
<?php
if (isset($_SESSION['id'])) {
    # code...

?>
<?php
    include ("navbar.php");
    include ("connection.php");
    ?>
<html>
<head>
    <title>Management</title>
</head>
<body>
<div class="row" style="margin-top:60px;">
    <div class="col-md-12">
        <?php
        include ('admin_sidebar.php')
        ?>
        <?php
        $users="select * from user WHERE role='Employee'";
        $users=mysqli_query($conn,$users);
        $total_emp=mysqli_num_rows($users);

        $users="select * from user WHERE role='Manager'";
        $users=mysqli_query($conn,$users);
        $total_man=mysqli_num_rows($users);

        $users="select * from user WHERE role='Candidate'";
        $users=mysqli_query($conn,$users);
        $total_can=mysqli_num_rows($users);

        $users="select * from user WHERE role='employee' or role='manager' or role='candidate'";
        $users=mysqli_query($conn,$users);
        $total_both=mysqli_num_rows($users);
        ?>
      <div class="col-md-8" style="background: #ffffff">
        <div class="col-md-3">
            <div class="panel panel-danger text-center text-white  mb-3">
                <div class="panel-heading" >
                   <a href=""> <h5 class="panel-title" style="padding: 10px;"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp; Employee</h5></a>
                </div>
                <div class="panel-body" style="background: #4e435c;color: #ffffff;padding: 20px;">
                    <h3 class="panel-title" style="font-size: 30px;"><?php echo $total_emp ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3" >
            <div class="panel panel-success text-center text-white">
                <div class="panel-heading" >
                   <a href=""> <h5 class="panel-title" style="padding: 10px;"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;&nbsp; Manager</h5></a>
                </div>
                <div class="panel-body" style="background: #155c4a;color: #ffffff;padding: 20px;">
                    <h3 class="panel-title" style="font-size: 30px;"><?php echo $total_man ?></h3>
                </div>
            </div>
        </div>
          <div class="col-md-3" >
              <div class="panel panel-success text-center text-white">
                  <div class="panel-heading" >
                      <a href=""> <h5 class="panel-title" style="padding: 10px;"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp; Candidate</h5></a>
                  </div>
                  <div class="panel-body" style="background: #155c4a;color: #ffffff;padding: 20px;">
                      <h3 class="panel-title" style="font-size: 30px;"><?php echo $total_can ?></h3>
                  </div>
              </div>
          </div>
        <div class="col-md-3">
            <div class="panel panel-warning text-center text-white  mb-3">
                <div class="panel-heading">
                   <a href=""> <h5 class="panel-title" style="padding: 10px;"><span class="glyphicon glyphicon-check"></span>&nbsp;&nbsp;&nbsp;Total worker</h5></a>
                </div>
                <div class="panel-body" style="background: #608550;color: #ffffff;padding: 20px;">
                    <h3 class="panel-title" style="font-size: 30px;"><?php echo $total_both ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
    <h4>Lists of available Employees
    <a href="add_emplyee.php"  class="btn btn-primary "  style="float: right"><i class="glyphicon glyphicon-ok-sign " ></i> Add Employee</a></h4>

                <table  class="table table-bordered table-striped  table-responsive" style="font-size: 13px">
                    <tr style="height: 50px;">

                        <th >Frist name</th>
                        <th >Middle name</th>
                        <th>Last name</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Role</th>
                        <th>Actions</th>

                    </tr>

                    <?php
                    while ($user=mysqli_fetch_array($users))
                    {


                        ?>
                        <tr>
                            <td>  <?php echo $user['Fname'] ?></td>
                            <td>  <?php echo $user['Mname'] ?></td>
                            <td> <?php echo $user['Lname'] ?></td>
                            <td><?php echo $user["Phone"] ?></td>
                            <td> <?php echo $user['Gender'] ?></td>
                            <td><b><?php echo $user["role"] ?></b></td>


                            <?php
                                $id=$user['Id'];
                            ?>
                            <td>
                                <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="view users detail">Detail</a>
                                <a href="#" onclick='deleteEmployee(<?php echo $id;?>)' class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="delete users">Delete</a


                            </td>

                        </tr>
                        <?php
                    }
                    ?>
                </table>

            </div>



        </div>


    </div>
</body>
</html>
  <?php
}
else
{
    header("location:login.php");
//    header("location:http://localhost/vcnp/login.php");
}
    ?>


<script>//to delete the category
    function deleteEmployee(Id)
    {
        var ans=confirm("Are you sure to delete Employee with  Id "+" = "+ Id+"?");
        if(ans){
            window.location="http://localhost/vcnp/delete_employee.php?id="+Id;
        }

    }

</script>
