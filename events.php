<?php
session_start();
include ("connection.php");
if(isset($_SESSION['id']))
{
    ?>
    <html>
    <title>Events</title>
    <body style="background: #f2f2f2">
    <?php
    include ("navbar.php");
    include ("connection.php");
    ?>
<div class="row"  style="margin-top:60px;">
    <div class="col-md-12" >
        <?php
        include ("admin_sidebar.php")
        ?>
    <div class="col-md-8">
        <div class="panel">
            <div class="panel-heading" style="background-color: #f2f2f2;">
                <h2 style="text-align: center">Events</h2>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#githubModal"><i class="glyphicon glyphicon-plus-sign"></i> Add New event </button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#githubModal2"><i class="glyphicon glyphicon-plus-sign"></i> Add Something </button>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-responsive" style="font-size: 14px;">
                                <tr style="background: #f2f2f2">

                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>Last Date</th>
                                    <th>Action</th>
                                </tr>


                                <?php
                                $view_event="select * from event";
                                $query=mysqli_query($conn,$view_event);
                                $row=mysqli_num_rows($query);
                                while ($list_event=mysqli_fetch_array($query))
                                {
                                    $id=$list_event['id'];
                                    $s_date=$list_event['start_date'];
                                    $start_date=new DateTime($s_date);
                                    $l_date=$list_event['end_date'];
                                    $end_date=new DateTime($l_date);
                                    ?>
                                    <tr>

                                        <td><?php echo $list_event['title']?></td>
                                        <td><?php echo $start_date->format('d/m/yy')?></td>
                                        <td><?php echo $end_date->format('d/m/yy')?></td>

                                        <td><a href="" onclick='deleteEvent(<?php echo $id;?>)' class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                            <a href="" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a>

                                        </td>
                                    </tr>

                                    <?php

                                }

                                ?>
                            </table>

                        </div>

                    </div>
                </div>




                <!--        modal-->

                <div class="modal fade" id="githubModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #1b6d85;color: #ffffff">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove"></i></button>
                                <h4 class="modal-title">publish new event here</h4>
                            </div>
                            <div class="modal-body">

                                <form action="" method="post">
                                    <label>Tilte</label>
                                    <input type="text" name="title" placeholder="Title" class="form-control"><br>
                                    <label>Start date</label>
                                    <input type="date" name="start_date" placeholder="Start Date" class="form-control"><br>
                                    <label>End date</label>
                                    <input type="date" name="end_date" placeholder="End Date" class="form-control"><br>

                                    <button type="submit" class="btn btn-primary" name="btn_enter">Publish</button>
                                    <!--                            php code should be here-->
                                    <?php
                                    if(isset($_POST['btn_enter']))
                                    {
                                        $id=$_SESSION['id'];
                                        $title=$_POST['title'];
                                        $start_date=$_POST['start_date'];
                                        $end_date=$_POST['end_date'];
                                        $name_insert="INSERT INTO event(user_id,title,start_date,end_date) VALUES ('$id','$title','$start_date','$end_date')";
                                        $name_result=mysqli_query($conn,$name_insert);
                                        if($name_result)
                                        {
                                            echo "<script>alert(' Done,event attached successfully')</script>";
                                        }
                                        else
                                        {

                                            die('falied'. mysqli_error($conn));
                                        }
                                    }

                                    ?>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i>  Cancel</button>

                            </div>
                        </div>
                    </div>
                </div>

                <!--        end of modal-->
        <!--       second modal-->

        <div class="modal fade" id="githubModal2" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #333333;color: #ffffff">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title">publish new event here</h4>
                    </div>
                    <div class="modal-body">

                        <form action="" method="post">
                            <textarea class="form-control" name="text" placeholder="your text here"></textarea><br>


                            <button type="submit" class="btn btn-primary" name="btn_enter">Publish</button>
                            <!--                            php code should be here-->
                            <?php
                            if(isset($_POST['btn_enter']))
                            {
                                $id=$_SESSION['id'];
                                $title=$_POST['text'];
                                $name_insert="INSERT INTO event(user_id,title,start_date,end_date) VALUES ('$id','$title','$start_date','$end_date')";
                                $name_result=mysqli_query($conn,$name_insert);
                                if($name_result)
                                {
                                    echo "<script>alert(' Done,event attached successfully')</script>";
                                }
                                else
                                {

                                    die('falied'. mysqli_error($conn));
                                }
                            }

                            ?>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i>  Cancel</button>

                    </div>
                </div>
            </div>
        </div>

        <!--        end of modal-->



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
<script>//to delete the category
    function deleteEvent(id)
    {
        var ans=confirm("Are you sure to delete these Event? ");
        if(ans){
            window.location="http://localhost/vcnp/delete_event.php?id="+id;
        }

    }

</script>