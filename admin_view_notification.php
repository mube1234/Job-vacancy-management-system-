<?php
session_start();
include ("connection.php");
if(isset($_SESSION['id'])) {
    ?>
    <html>
    <title>View Event</title>
    <body style="background: #f2f2f2">
    <?php
    include("navbar.php");
    include("connection.php");
    ?>
    <div class="row" style="margin-top:60px;">
        <div class="col-md-12">
            <?php
            include("admin_sidebar.php")
            ?>
            <?php
            $view_not = "select * from notification WHERE status='0' ORDER BY date DESC ";
            $query = mysqli_query($conn, $view_not);
            $row = mysqli_num_rows($query);
            ?>
            <div class="col-md-6">
                <div class="panel">

                    <h3 style="text-align: center;background-color: ">New Notifications(<?php echo $row?>)</h3>

                    <div class="panel-body">
                        <?php
                        while ($list_not = mysqli_fetch_array($query)) {

                            $title = $list_not['text'];
                            $id=$list_not['not_id'];
                            $date=$list_not['date'];
                            ?>


                            <li class="alert alert-warning  "><a href="notification_detail.php?id=<?php echo $id ?>"><?php echo $title ?></a>
                                <small class="text-muted" style="float: right"><?php echo $date ?></small><br>

                            </li>
                            <?php
                        }

                        ?>
                    </div>
                </div>




                <!--            to view previues notification-->
                <?php
                $view_not = "select * from notification WHERE status='1' ORDER BY date DESC ";
                $query = mysqli_query($conn, $view_not);
                $row = mysqli_num_rows($query);
                ?>

                <div class="panel">
                    <div class="panel-body">
                        <p>Latest notifications you have seen </p>
                        <?php
                        while ($list_not = mysqli_fetch_array($query)) {

                            $title = $list_not['text'];
                            $id=$list_not['not_id'];
                            $date=$list_not['date'];
                            ?>

                            <p class="alert alert-success  alert-dismissable  "><i class="glyphicon glyphicon-ok"></i> <a href="notification_detail.php?id=<?php echo $id ?>"><?php echo $title ?></a>
                                <small class="text-muted" style="float: right"><?php echo $date ?></small>
                            </p>
                            <?php
                        }

                        ?>
                    </div>
                </div>
            </div>
            <!--            -->
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