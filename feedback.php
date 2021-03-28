<?php
session_start();
include ("connection.php");
if(isset($_SESSION['id']))
{
    ?>
    <html>
    <title>feedback</title>
    <body style="background: #f2f2f2">
    <?php
    include ("navbar.php");
    include ("connection.php");
    ?>
    <div class="col-md-12"  style="margin-top:60px;">

        <div class="col-md-8">
            <div class="panel">
                <div class="page-header"> <h2 style="margin-left: 20px">Keep in touch with us here</h2></div>
                <!--           php code here-->
                <?php
                if(isset($_POST['submit_btn']))
                {
                    $adder=$_SESSION['id'];
                    $text=$_POST['txt'];


                    $insert_feedback="INSERT INTO feedback (user_Id,text,date) VALUES 
                              ('$adder','$text',NOW())";
                    $insert_query=mysqli_query($conn,$insert_feedback);
                    if ($insert_query)
                    {
                        echo  "<div class='alert alert-success' style='background-color: green;color: white'>
                                <p><i class=\"glyphicon glyphicon-ok\"></i>&nbsp; <b>  Done</b> feedback sent successfully</p> 
                                </div>";
//                    echo "<script>alert('well done $fname,your are successfully registered')</script>";
//                    echo "<script>window.open('login.php','_self')</script>";
                    }
                    else
                    {
                        //die( "<b> <font color='red'>user ca not created successfully</font> </b>");
                        die('falied'. mysqli_error($conn));
                        //echo "<script>window.open('register','_self')</script>";

                    }
                }
                ?>

                <!--           end-->
                <div class="panel-body">
                    <form method="post" action="">

                        <label>your idea here</label>

                        <textarea class="form-control" style="height: 180px;" name="txt"  required="required"></textarea>


                        <br>
                        <button type="submit" class="btn btn-primary" style="float: right" name="submit_btn">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php

}
else{
    header("location:login.php");
//    header("Location:http://localhost/vcnp/login.php");
}
?>
