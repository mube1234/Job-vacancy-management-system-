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
            include("sidebar.php")
            ?>
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-heading" style="background-color: #f2f2f2;">
                        <h2 style="text-align: center">Recent Events</h2>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-responsive" style="font-size: 14px;">
                            <tr style="background: #f2f2f2">

                                <th>Title</th>
                                <th>Start Date</th>
                                <th>Last Date</th>

                            </tr>


                            <?php
                            $view_event = "select * from event ORDER BY date DESC ";
                            $query = mysqli_query($conn, $view_event);
                            $row = mysqli_num_rows($query);
                            while ($list_event = mysqli_fetch_array($query)) {
                                $id = $list_event['id'];
                                $s_date = $list_event['start_date'];
                                $start_date = new DateTime($s_date);
                                $l_date = $list_event['end_date'];
                                $end_date = new DateTime($l_date);
                                ?>
                                <tr>

                                    <td><?php echo $list_event['title'] ?></td>
                                    <td><?php echo $start_date->format('d/m/yy') ?></td>
                                    <td><?php echo $end_date->format('d/m/yy') ?></td>

                                </tr>

                                <?php

                            }

                            ?>
                        </table>

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
    header("location:login.php");
//    header("location:http://localhost/vcnp/login.php");
}
?>