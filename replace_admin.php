<?php
session_start();
?>
<?php
if (isset($_SESSION['id'])) {
    # code...

    ?>
<!DOCTYPE html>
<html>
<title>Admin replacement</title>

<body style="background: #f2f2f2">
<?php
include ("navbar.php");
include ("connection.php");
?>
<div class="col-md-12"  style="margin-top:50px;">
    <?php
    include ("admin_sidebar.php")
    ?>
    <?php
    $id=$_SESSION['id']
    ?>
    <div class="col-sm-8" style="margin-top: 10px;">
        <div class="panel panel-success" >
            <div class="panel-heading" style="background-color: #ffffff">
                <center> <h2>Change Admin</h2></center>

            </div>
            <div class="panel-body" style="width: 60%">

                <?php
                if(isset($_POST['change_now']))
                {
                    $fname = $_POST['fname'];
                    $mname = $_POST['mname'];
                    $lname = $_POST['lname'];
                    $mobile = $_POST['phone'];
                    $gender = $_POST['gender'];
                    $password=md5("12345678");
                    $role='Admin';

                    $change_admin = "INSERT INTO user(Fname,Mname,Lname,Phone,Gender,password,role) VALUES
                                   ('$fname','$mname','$lname','$mobile','$gender','$password','$role')";
                    $sql_result = mysqli_query($conn, $change_admin);
                    if ($sql_result)
                    {
                       $move_admin="DELETE FROM user WHERE Id='$id'";
                        $sql_move_result = mysqli_query($conn, $move_admin);
                         if ($sql_move_result) {
                             echo "<script>alert('Admin changed successfully!')</script>";
                             session_destroy();
                             echo "<script>window.open('login.php')</script>";
                         }
                         else
                         {
                             //die( "<b> <font color='red'>user ca not created successfully</font> </b>");
                             die('falied' . mysqli_error($conn));
                             //echo "<script>window.open('register','_self')</script>";

                         }


//
                    } else
                        {
                        //die( "<b> <font color='red'>user ca not created successfully</font> </b>");
                        die('falied' . mysqli_error($conn));
                        //echo "<script>window.open('register','_self')</script>";

                    }
                }
                ?>
                <form method="post">
                    <label>Frist name*</label>
                    <input class="form-control" type="text" name="fname" placeholder="" required="required"><br>
                    <label>Middle Name*</label>
                    <input class="form-control" type="text" name="mname" placeholder="" required="required"><br>
                    <label>Last name*</label>
                    <input class="form-control" type="text" name="lname" placeholder="" required="required"><br>
                    <label>Phone Number*</label>
                    <input class="form-control" type="text" name="phone" placeholder="Current Password" required="required"><br>
                    <label>Select gender*</label>
                    <select class="form-control">
                        <option>Male</option>
                        <option>Female</option>
                    </select><br>
                    <button class="btn btn-primary " name="change_now" style="float: right"> Change Now</button>



                </form>


            </div>
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
