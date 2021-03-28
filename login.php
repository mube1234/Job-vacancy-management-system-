<?php
session_start();
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

<body style="background-color: #f2f2f2">
<div class="col-md-12">

        <div class="row">
            <div class="panel panel-body" style=" background-color: #455f65;">
                <center><h4 style="color: white;font-style: italic;">WELCOME TO BEDELE TOWN  JOB VACANCY NETWORK PLATFORM(JVNP) </h4>

                </center>
            </div>
        </div>

    <div class="row" >
    <div class="col-sm-6">
        <label>Back to home </label><a href="index.php"><kbd> here</kbd></a>
        <div class="panel panel-body" style="  border:2px solid #e6e6e6;">
            <div class="header ">

               <center> <img src="icons/logo.png" class="img-circle"  style="height: auto;width: 300px;"></center>
                <center>Login</center>
            </div>
            <div class="1-part">

                <?php
               include ('connection.php');
                if(isset($_POST['btn_login'])) {
                    $phone = $_POST['phone'];
                    $password = md5($_POST['password']);
                    $result = mysqli_query($conn, "SELECT * FROM user WHERE Phone='$phone' and password='$password'");
                    if (mysqli_num_rows($result)==1) {
                        $user = mysqli_fetch_array($result);
                        $_SESSION['id'] = $user['Id'];
                        $_SESSION['fname'] = $user['Fname'];
                        $_SESSION['mname'] = $user['Mname'];
                        $_SESSION['lname'] = $user['Lname'];
                        $_SESSION['role'] = $user['role'];

                        header("location:index.php");

//                        header("location:http://localhost/vcnp/index.php?");

                    } #if user does not exist
                    else {
                        ?>
                        <div class="alert alert-danger">Phone number or password is incorrect</div>
                        <?php
                    }
                }
                ?>


                <form action="" method="post">
                    <label>Phone Number</label>
                    <input type="text" name="phone" placeholder="+251 " required="required" class="form-control input-md"><br>

                    <div class="overlap-text">
                        <label>Password</label>
                        <a style="text-decoration: none;float: right;color: #187FAB;" data-toggle=tooltip title="Reset password" href="reset_password.php">Forgot password?</a>

                        <input type="password" name="password" placeholder="***********" required="required" class="form-control input-md"><br>

                    </div>
                    <button   class="btn btn-primary" name="btn_login">Login</button>
                   <small class="text-muted"> Not registered yet?</small><a href="create_account.php" class="btn btn-link" name="login">Sign up</a>

<!--                    --><?php //include("login.php"); ?>

                </form>

            </div>

        </div>
    </div>
    </div>
</div>
</body>
</html>