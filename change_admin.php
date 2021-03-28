<?php
session_start();
?>
<!DOCTYPE html>
<html>
<title>Homepage</title>
<body style="background: #f2f2f2">
<?php
include ("navbar.php");
include ("connection.php");
?>
<?php
$id=$_GET['id']
?>
<div class="col-md-12"  style="margin-top:60px;">
    <?php
    include ("admin_sidebar.php")
    ?>
    <div class="col-sm-8" style="margin-top: 10px;">
        <div class="panel panel-success" >
            <div class="panel-heading" style="background-color: #ffffff">
                <center> <h2>Confirm your password</h2></center>

            </div>
            <div class="panel-body" style="width: 60%">

                <?php
                if(isset($_POST['change_admin']))
                {
                    $pass_entered=md5($_POST['cur_pass']);
                    $pass="SELECT * FROM user where Id='$id'";
                    $pass_check=mysqli_query($conn,$pass);
                    $row=mysqli_fetch_array($pass_check);
                    $password=$row['password'];

                    if ($pass_entered==$password)
                    {

                        $prev_pass = "INSERT INTO history(user_id,fname,mname,lname,phone,gender,role) SELECT Id,Fname,Mname,Lname,Phone,Gender,role FROM user WHERE Id='$id'";
                        $checking = mysqli_query($conn, $prev_pass);
                        if ($checking)
                        {
                            echo "<script>alert('done!')</script>";
                            echo "<script>window.open('replace_admin.php')</script>";
                        } else
                            die('failed' . mysqli_error($conn));
                    }
                    else
                    {
                        echo "<div class='alert alert-danger' style='background-color: red;color: white'>
                                <p><i class=\"glyphicon glyphicon-alert\"></i> Password Incorrect try again! </p> 
                                </div>";
                    }
                }
                ?>
                <form method="post">
                    <label>Enter your password*</label>
                    <input class="form-control" type="password" name="cur_pass" placeholder="Current Password" required="required"><br>
                   <button class="btn btn-success" name="change_admin">Next</button>



                </form>


            </div>
        </div>


    </div>

</div>


</body>
</html>
