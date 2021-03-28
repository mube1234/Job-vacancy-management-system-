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
    <div class="col-sm-8">
        <div class="panel panel-danger">
            <div class="panel-heading">
               <center> <h2>Change Password</h2></center>

            </div>
            <div class="panel-body" style="width: 60%">

                <?php
                if(isset($_POST['change_pass']))
                {
                    $prev_pass = "SELECT * FROM user WHERE Id='$id'";
                    $check_current = mysqli_query($conn, $prev_pass);
                    $row=mysqli_fetch_array($check_current);
                    $now_pass=$row['password'];


                    $current_pass=md5($_POST['cur_pass']);
                    $new_pass=md5($_POST['new_pass']);
                    $confirm_pass=md5($_POST['confirm_pass']);



                    if ($current_pass==$now_pass)
                    {
                        if (  $new_pass==$confirm_pass)
                        {
                            $update_pass="update user set password='$new_pass' where Id='$id'";
                            $run_sql=mysqli_query($conn,$update_pass);

                            if($run_sql)
                            {

                                echo  "<div class='alert alert-success' style='background-color: green;color: white'>
                                <p><i class=\"glyphicon glyphicon-ok\"></i>&nbsp; <b>  Done</b> Password changed successfully</p> 
                                </div>";

                            }
                            else
                            {
                               die('failed'.mysqli_error());
                            }

                        }
                        else
                        {

                            echo "<div class='alert alert-danger' style='background-color: red;color: white'>
                                <p><i class=\"glyphicon glyphicon-alert\"></i> Two password does not match </p> 
                                </div>";
                        }
                    }
                    else
                    {
                        echo "<div class='alert alert-danger' style='background-color: red;color: white'>
                                <p><i class=\"glyphicon glyphicon-alert\"></i> Current password incorrect!</p> 
                                </div>";
                    }
                }
                ?>
                <form method="post">
                    <label>Current password*</label>
                    <input class="form-control" type="password" name="cur_pass" placeholder="Current Password" required="required"><br>
                    <label>New Password*</label>
                    <input class="form-control" type="password" name="new_pass" placeholder="New Password" required="required"><br>

                    <label>Confirm New Password*</label>
                    <input class="form-control" type="password" name="confirm_pass" placeholder="Confirm New Password" required="required"><br>
                    <button class="btn btn-success" name="change_pass">Change</button>



                </form>


            </div>
        </div>


    </div>

    </div>


</body>
</html>
