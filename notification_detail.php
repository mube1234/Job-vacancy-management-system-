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
    <?php
    $id=$_GET['id'];
    ?>
    <div class="row" style="margin-top:60px;">
        <div class="col-md-12">
            <?php
            include("sidebar.php")
            ?>
            <?php
            $view_not = "select * from notification n JOIN user u on n.user_id=u.Id WHERE not_id='$id' ";
            $query = mysqli_query($conn, $view_not);
            if ($query)
            {
                $update_status="update notification set status='1' where not_id='$id'";
                $query_update = mysqli_query($conn, $update_status);
                while ($query_detail=mysqli_fetch_array($query)) {
                    $txt = $query_detail['text'];
                    $date = $query_detail['date'];
                    $sender = $query_detail['Fname'];
                    $senderM = $query_detail['Mname'];
                    ?>
                    <div class="alert alert-warning">
                        <center>
                       <label> Title:</label><strong><?php echo $txt ?></strong><br>
                       <label>Sent on:</label><small><?php echo $date ?></small><br>
                       <label>Sent from:</label><strong><?php echo $sender." ".$senderM ?></strong><br>
                       <button class="btn btn-default btn-sm" type="submit" style="float: right" data-toggle="modal" data-target="#githubModal" >Replay</button><br>

                                    
                      </div>
                   </center>
                    <?php
                }
            }
            else
            {
                die('failed'.mysqli_error($conn));
            }
            ?>


<!-- new modal here -->


<!--        modal-->

        <div class="modal fade" id="githubModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-remove"></i></button>
                        <h4 class="modal-title">Replay text</h4>
                    </div>
                    <div class="modal-body">
                       <label>Reply here</label>
                        <form action="" method="post">
                        <input type="text" name="replay" placeholder="replay here" class="form-control" required="required"><br>
                        <button type="submit" class="btn btn-info" name="btn_enter">send</button>
<!--                            php code should be here-->
                            <?php
                            if(isset($_POST['btn_enter']))
                            {
                                $text=$_POST['replay'];
                                $user_id=$_SESSION['id'];

                               
                $name_insert="INSERT INTO replay(user_id,not_id,replay_text,date) VALUES ('$user_id','$id','$text',NOW())";
                                $name_result=mysqli_query($conn,$name_insert);
                                if($name_result)
                                {
                                    echo "<script>alert(' Done,replay sent successfully')</script>";
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