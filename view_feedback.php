<?php
session_start();
include ("connection.php");
if(isset($_SESSION['id'])) {
    ?>
    <html>
    <title>View Feedback</title>
    <body style="background: #f2f2f2">
    <?php
    include("navbar.php");
    include("connection.php");
    ?>
    <div class="row" style="margin-top:60px;">
        <div class="col-md-12">
            <?php
            include("sidebar.php")
            ?>
            <?php
            $view_feedback = "select * from feedback f JOIN user u on f.user_id=u.Id ORDER BY date DESC ";
            $query = mysqli_query($conn, $view_feedback);
            $row = mysqli_num_rows($query);
            ?>
            <div class="col-md-8">
                <div class="panel panel-primary">

                    <div class="panel panel-heading">
                        <h3 style="text-align: center;background-color: ">feedback from candidates</h3>

                    </div>
                    <div class="panel-body">
                        <?php
                        while ($list_feedback = mysqli_fetch_array($query)) {

                            $title = $list_feedback['text'];
                            $id=$list_feedback['user_id'];
                            $date=$list_feedback['date'];
                            $fname=$list_feedback['Fname'];
                            $lname=$list_feedback['Mname'];
                            ?>


                            <li class="alert alert-danger " style="text-decoration: none;list-style: none"><p><?php echo $title ?></p>
                                <small class="text-muted" style="float: right"><?php echo $date ?></small><br>
                                <small class="text-muted" ><?php echo $fname ?></small>
                                <small class="text-muted" ><?php echo $lname ?></small>

                            </li>
                            <?php
                        }

                        ?>
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