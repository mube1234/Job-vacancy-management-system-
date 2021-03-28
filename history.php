<?php
session_start();
include ("connection.php");
if(isset($_SESSION['id']))
{
    ?>
    <html>
    <title>history</title>
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
                <div class="panel panel-primary">
                    <div class="panel panel-heading">
                        <h2 style="text-align: center">User history</h2>
                        </div>
                    <div class="panel panel-body">
                        <table class="table table-bordered table-responsive" style="font-size: 14px;">
                            <tr style="background: #f2f2f2">

                                <th>Id</th>
                                <th>Frist name</th>
                                <th>Middle name</th>
                                <th>Last name</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>


                            <?php
                            $view_event="select * from history ";
                            $query=mysqli_query($conn,$view_event);
                            $row=mysqli_num_rows($query);
                            while ($list_event=mysqli_fetch_array($query))
                            {
                                $id=$list_event['user_id'];
                                $fname=$list_event['fname'];
                                $mname=$list_event['mname'];
                                $lname=$list_event['lname'];
                                $role=$list_event['role'];

                                ?>
                                <tr>

                                    <td><?php echo $id?></td>
                                    <td><?php echo   $fname?></td>
                                    <td><?php echo  $mname?></td>
                                    <td><?php echo  $lname?></td>
                                    <td><?php echo  $role?></td>

                                    <td><a href="" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span> Detail</a>

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