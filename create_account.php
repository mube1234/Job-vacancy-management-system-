<?php include ('connection.php')?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/crousel.css">
<link rel="stylesheet" href="bootstrap/style.css">
<script src="bootstrap/js/jquery-1.11.3.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<style>

    body{
        overflow-x: hidden;
    }
    .main-content{

        margin: 10px auto;
        background-color: #fff;
        border:2px solid #e6e6e6;

    }
    .header{

        margin-bottom: 5px;

    }
    .well{
        background-color: #455f65;
    }
    #signup{
        width: 60%;
        border-radius: 30px;
        background-color: #356a8f;

    }


</style>
<body>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-body well">
            <center><h2 style="color: white;">Jova Candidate Registration Page</h2></center></div>
    </div>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-sm-6">
        <label>Back to home </label><a href="index.php"><kbd> here</kbd></a>
        <div class="main-content">
            <div class="header">
              <center>  <h3 style="color: #1ca095">Join Jova </h3></center>
            </div>
            <div class="panel-body l-part">
                <form action="" method="post">


                    <?php

                    if(isset($_POST['sign_up'])){
                        $fname=$_POST['first_name'];
                        $mname=$_POST['middle_name'];
                        $lname=$_POST['last_name'];
                        $phone=$_POST['phone'];
                        $password=md5($_POST['ur_pass']);
                        $confirm_pass=md5($_POST['confirm_pass']);
                        $address=$_POST['address'];
                        $sex=$_POST['gender'];
                        $role="Candidate";

                        if (strlen($_POST['ur_pass'])<5)
                        {
                            echo  "<div class='alert alert-danger' style='background-color: red;color: white'>
                                <p><i class=\"glyphicon glyphicon-remove\"></i>&nbsp; Password should be minimum 6 characters</p> 
                                </div>";

                            exit();


                        }
                        if (strlen($_POST['phone'])<10)
                        {
                            echo  "<div class='alert alert-danger' style='background-color: red;color: white'>
                                <p><i class=\"glyphicon glyphicon-remove\"></i>&nbsp; please enter valid phone number format!</p> 
                                </div>";
                            exit();

                        }
                        if ($password != $confirm_pass)
                        {
                            echo "<div class='alert alert-danger' style='background-color: #d80000;color: #ffffff'><p>password should be minimum 6 characters!</p></div>";
                            exit();


                        }
                        $check_phone="select * from user where Phone='$phone'";
                        $query_phone = mysqli_query($conn,$check_phone);
                        $check2=mysqli_fetch_array($query_phone);
                        $check= mysqli_num_rows($query_phone);
                        if ($check>0 && $check2['Phone']==$phone)
                        {
                            echo "<div class='alert alert-danger' style='background-color: #d80000;color: #ffffff'><p>Phone number already exist,try to use another number</p></div>";
                            exit();
                        }
                        else
                            {
                            $create_candidate = "INSERT INTO user(Fname,Mname,Lname,Phone,Gender,Address,password,role) VALUES
                                    ('$fname','$mname','$lname','$phone','$sex','$address','$password','$role')";
                            $sql_result = mysqli_query($conn, $create_candidate);
                            if ($sql_result)
                            {
                                echo "<div class='alert alert-success'  style='font-size: 20px;background-color: #1ca095'>
                                           <b> <a style='color: #ffffff' href='password_rememberance.php?phone=$phone'>One More Step
                                          
                                           <span class='glyphicon glyphicon-circle-arrow-right'></span> Next</a>  </b>
                                    </div>";
                                exit();

//                                echo "<script>alert('Done One More Step')</script>";
//                                echo "<script>window.open('password_rememberance.php')</script>";
//                                header("Location:http://localhost/vcnp/password_rememberance.php");
                            } else
                                {
                                //die( "<b> <font color='red'>user ca not created successfully</font> </b>");
                                echo "<script>alert('registration failed please try again')</script>";
                                //echo "<script>window.open('register','_self')</script>";
                            }
                        }
                    }
                    ?>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" placeholder="Frist Name" name="first_name" required="required">

                    </div></br>

                    <div class="input-group">
                        <span class="input-group-addon"> <i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" placeholder="Middle Name" name="middle_name" required="required">

                    </div></br>
                    <div class="input-group">
                        <span class="input-group-addon"> <i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" required="required">

                    </div></br>

                    <div class="input-group">
                        <span class="input-group-addon"> <i class="glyphicon glyphicon-phone"></i></span>
                        <input type="text" class="form-control" placeholder="Phone Number" name="phone" required="required"
                               pattern="[0&9]{2}[0-9]{8}" title="Phone number ">

                    </div></br>


                    <div class="input-group">
                        <span class="input-group-addon"> <i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" placeholder="Password" name="ur_pass" required="required">

                    </div></br>


                    <div class="input-group">
                        <span class="input-group-addon"> <i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" placeholder="Confirm password" name="confirm_pass" required="required">

                    </div></br>



                    <div class="input-group">
                        <span class="input-group-addon"> <i class="glyphicon glyphicon-chevron-down"></i></span>
                        <select class="form-control" name="gender" required="required">
                            <option disabled>select your gender</option>
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>

                    </div></br>

                    <div class="input-group">
                        <span class="input-group-addon"> <i class="glyphicon glyphicon-map-marker"></i></span>
                        <input type="text" class="form-control" placeholder="Address" name="address" required="required">

                    </div></br>
                    <div class="input-group">
                        <input type="checkbox"  name="check" required="required">  I agree the terms and condition of this site?

                    </div></br>


                    <a style="text-decoration: none;float: right;color: #187FAB;" data-toggle="tooltip" title="signin" href="login.php">already have account ?</a></br>
                    <button id="signup" style="color: white" class="btn btn-info btn-lg" name="sign_up">Sign up</button>


                </form>






            </div>

        </div>
    </div>
    <div class="col-md-3"></div>
</div>
</body>
</html>