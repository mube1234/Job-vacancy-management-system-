
<?php
include ('connection.php');
?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/crousel.css">
<link rel="stylesheet" href="bootstrap/style.css">
<script src="bootstrap/js/jquery-1.11.3.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<?php
$id=$_GET['id'];
?>
<body>
	<div class="container-fluid"  style="margin-top:60px;">
		<div class="col-md-12">

			<div class="col-md-6">

<!--                php code here-->
                <?php

                if(isset($_POST['btn_reset'])){
                    $password=md5($_POST['pass1']);
                    $confirm_pass=md5($_POST['pass2']);


                    if (strlen($_POST['pass1'])<5)
                    {
                        echo "<script>alert('Password should be minimum 6 characters!')</script>";
                        exit();
                    }
                    if ($password != $confirm_pass)
                    {
                        echo "<div class='alert alert-danger' style='background-color: #d80000;color: #ffffff'><p>password should be minimum 6 characters!</p></div>";
                        exit();


                    }
                    $check_phone="select * from user where Id='$id'";
                    $query_phone = mysqli_query($conn,$check_phone);
                    $check2=mysqli_fetch_array($query_phone);
                    $check= mysqli_num_rows($query_phone);

                        $create_candidate = "UPDATE user set password='$password' WHERE Id='$id'";
                        $sql_result = mysqli_query($conn, $create_candidate);
                        if ($sql_result)
                        {
                            //echo  "<b> <font color='green'>user created successfully</font> </b>";
                            echo "<div class='alert alert-success' style='background-color: #1fa815;color: #ffffff'>
                                        <p>New password set successfully!</p>";
                            ?><br>
                            <a href="login.php"><kbd>Login here</kbd></a></div>
                            <div class="clearfix"></div>
                            <?php
                        } else
                        {
                            //die( "<b> <font color='red'>user ca not created successfully</font> </b>");
                            echo "<script>alert(' failed please try again')</script>";
                            //echo "<script>window.open('register','_self')</script>";
                        }

                }
                ?>
<!--                end php here-->


				<form method="post">
                    <div class="panel panel-info">
                    	<div class="panel-heading"> CREATE NEW PASSWORD</div>
                    	<div class="panel-body">
                    		 <label>new password*</label>
                         <input type="password" name="pass1" class="form-control" required="required">
                         <label>confirm password*</label>
                         <input type="password" name="pass2" class="form-control" required="required"><br>
                        
                    		<button type="submit" class="btn btn-info" name="btn_reset">Reset now</button>
                    	</div>
                    </div>
                </form>





			</div>
			
		</div>
		
	</div>

</body>
</html>