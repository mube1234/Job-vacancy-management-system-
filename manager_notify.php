<?php
session_start();
?>
<?php
if(isset($_SESSION['id'])) {
?>
    <html>
    <head>
        <title>Contact</title>
    </head>
<body style="background:  #adadad">
    <?php
    include ("navbar.php");
    include ("connection.php");
    ?>
    <?php
     $id=$_SESSION['id'];
    ?>
    <div class="container" style="margin-top:60px;">
        <div class="col-md-12">
            <div class="col-md-7">
                <div class="panel panel-body" >
                    <?php
                    if (isset($_POST['btn_notify'])){
                        $title=$_POST['notify'];
                        $status='0';
                        $insert="INSERT INTO notification (text,status,user_id) VALUES ('$title',' $status','$id')";
                        $insert_query=mysqli_query($conn,$insert);
                        if($insert_query)
                        {
                            echo "<div class='alert alert-success' style='background-color: #1fa815;color: #ffffff'>
                                        <p>Notification  sent successfully!</p></div>";

                        }
                        else
                        {
                            die("You have already sent this notification".mysqli_error($conn));
                        }
                    }
                    ?>
                    <form method="post">

                        <center> <h1>Send Notification</h1></center>
                        <textarea class="form-control" name="notify" placeholder="your idea here" style="height: 200px;"></textarea><br>
                        <button class="btn btn-info" style="float: right"  name="btn_notify">Send</button>

                    </form>
               </div>
            </div>

            <!-- to view notifications and replies -->
            <div class="col-md-5">
                <div class="panel panel-body">
                    <h3>Sent notifications</h3>
                    <?php
                    $select_notification="select * from notification n join replay r on n.not_id=r.not_id "; 
                      $query = mysqli_query($conn, $select_notification);
                      $count=mysqli_num_rows($query);
            echo $count ." "."<b>replay found </b>"; 
                        while ($list_not = mysqli_fetch_array($query)) {

                            $title = $list_not['text'];
                            $replay=$list_not['replay_text'];
                            $date=$list_not['date'];
                             $user=$list_not['user_id'];
                            ?>
                              
                            <div class="alert alert-success  alert-dismissable  "><i class="glyphicon glyphicon-ok"></i> <a href="notification_detail.php?id=<?php echo $id ?>"><?php echo $title ?></a>
                                  
                                <small class="text-muted" style="float: right;"><?php echo $date ?></small><hr>
                               <small class="text-muted" style="background-color:#e2e2e2 ; "> <i class="glyphicon glyphicon-info-sign"></i> <?php echo   $replay?></small>
                               <p> <?php echo   $user?></p>
                            </div>
                            <?php
                        }

                        ?>
                 

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