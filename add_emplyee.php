<?php
session_start();
?>
<?php
if(isset($_SESSION['id'])) {
    ?>

    <html>
    <title>dashboard</title>
    <?php
    include("navbar.php");
    ?>
    <body style="background: #f2f2f2">
    <div class="row" style="margin-top:60px;">
        <div class="col-md-12">
            <?php
            include('admin_sidebar.php')
            ?>
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading"><h3 style="text-align: center">Add New Employee</h3></div>
                    <div class="panel-body" >


                        <!--          php code here-->

                        <?php
                        include("connection.php");
                        if (isset($_POST['btn_register'])) 
                        {
                            $fname = $_POST['fname'];
                            $mname = $_POST['mname'];
                            $lname = $_POST['lname'];
                            $mobile = $_POST['phone'];
                            $gender = $_POST['gender'];
                            $address = $_POST['address'];
//                            $randnum = rand(1000, 9999);
//                            $password = "jvnp_" . $randnum;
                            $password=md5("123456");
                            $role = $_POST['role'];

                            #check phone number
                            $check_phone = "select * from user where Phone='$mobile'";
                            $run_phone = mysqli_query($conn, $check_phone);
                            $check_test = mysqli_fetch_array($run_phone);
                            $check = mysqli_num_rows($run_phone);
                            if ($check > 0 && $check_test['Phone'] == $mobile) {
                                echo "<script>alert('sorry,user with this phone already exist')</script>";
                                exit();
                            }

                            $add_employee = "INSERT INTO user(Fname,Mname,Lname,Phone,Gender,Address,password,role) VALUES
                                   ('$fname','$mname','$lname','$mobile','$gender','$address','$password','$role')";
                            $sql_result = mysqli_query($conn, $add_employee);
                            if ($sql_result) {
                                echo "<div class='alert alert-success' style='background-color: green;color: white'>
                                <p><i class=\"glyphicon glyphicon-ok\"></i> <b> Done</b> new $role Registered successfully</p> 
                                </div>";
//                    echo "<script>alert('well done $fname,your are successfully registered')</script>";
//                    echo "<script>window.open('login.php','_self')</script>";
                            } else {
                                //die( "<b> <font color='red'>user ca not created successfully</font> </b>");
                                die('falied' . mysqli_error($conn));
                                //echo "<script>window.open('register','_self')</script>";

                            }
                        }


                        ?>


                        <!--end of php-->

                        <form action="" method="post">
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" placeholder="frist name" name="fname"
                                       required="required">

                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" placeholder="middle name" name="mname"
                                       required="required">

                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" placeholder="last name" name="lname"
                                       required="required">

                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input type="number" class="form-control" placeholder="phone" name="phone"
                                       required="required">

                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <select class="form-control" name="gender">
                                    <option disabled>Select gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>

                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                <input type="text" class="form-control" placeholder="Address" name="address"
                                       required="required">

                            </div>
                            <br>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <select class="form-control" name="role">
                                    <option disabled>Select role</option>
                                    <option>Employee</option>
                                    <option>Manager</option>
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" style="float: right" name="btn_register">
                                Register
                            </button>
                            <br><br>
                        </form>


                    </div>
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
    header("location:http://localhost/vcnp/login.php");
}
    ?>