
<?php
include ('connection.php');
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/crousel.css">
<link rel="stylesheet" href="bootstrap/style.css">
<script src="bootstrap/js/jquery-1.11.3.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>


<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top" style="background-color: #1f3462;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" style="color: red;font-family: 'Blackadder ITC'">Jova</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php" class="navbar-link">Home</a></li>

                   <?php
                    if(isset($_SESSION['id']) && !empty($_SESSION['id']) )
                    {
                        ?>
                        <li><a href="only_vacancy.php" class="navbar-link">Latest Vacancy</a></li>
                        <?php
                    }
                    else
                    {
                        ?>
                        <li><a href="login.php" class="navbar-link">Login</a></li>
                        <li><a href="create_account.php" class="navbar-link">Sign up</a></li>
                        <?php
                            }
                            ?>







        <?php

                if(isset($_SESSION['id']))
                {

                    if ($_SESSION['role']=='Admin')
                    {

                        ?>
                       <?php
                        $user_id=$_SESSION['id'];
                        $users=mysqli_query($conn,"select * from user where Id='$user_id'");
                        $user=mysqli_fetch_array($users);
                        $id=$user['Id'];
                        ?>
                        <li><a href="admin_view_notification.php" class="navbar-link">Notification<span class="badge" style="background:blue">4</span></a></li>
                        <li><a href="management.php" class="navbar-link">Admin</a></li>

                        <?php
                    }
                    if ($_SESSION['role']=='Employee')
                    {
                        ?>
                        <?php
                        $v=$_SESSION['id'];
                        $users=mysqli_query($conn,"select * from user where Id='$v'");
                        $user=mysqli_fetch_array($users);
                        $id=$user['Id'];
                        ?>
                        <li><a href="dashboard.php" class="navbar-link">Dashboard</a></li>
                        <li><a href="view_notification.php"  id="demo" aria-hidden="true" class="glyphicon glyphicon-bell" style="color: whitesmoke"></a></li>


                        <?php
                    }
                    if ($_SESSION['role']=='Manager')
                    {
                        ?>
                        <?php
                        $v=$_SESSION['id'];
                        $users=mysqli_query($conn,"select * from user where Id='$v'");
                        $user=mysqli_fetch_array($users);
                        $id=$user['Id'];
                        ?>
                        <?php
                        $view_event="select * from event";
                        $query=mysqli_query($conn,$view_event);
                        $row=mysqli_num_rows($query);
                        ?>
                        <li> <a href="managerview_event.php" class="navbar-link"> Events <span class="badge" style="background: blue"><?php echo $row?></span>  </a></li>


                        <li><a href="manager_notify.php" class="navbar-link">Notifiy</a></li>

                        <?php
                    }
                    if ($_SESSION['role']=='Candidate')
                    {
                        ?>
                        <?php
                        $v=$_SESSION['id'];
                        $users=mysqli_query($conn,"select * from user where Id='$v'");
                        $user=mysqli_fetch_array($users);
                        $id=$user['Id'];
                        ?>

                        <li><a href="resume.php?id=<?php echo $id;?>" class="navbar-link">Resume</a></li>
                        <li><a href="feedback.php?id=<?php echo $id;?>" class="navbar-link">Feedback</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle navbar-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['fname']?></php><span class="caret"></span></a>
                            <ul class="dropdown-menu">

                                <li><a href="candidate_profile.php">Profile</a></li>
                                <li><a href="resume.php">Resume</a></li>
                                <li><a href="job_applied.php">History</a></li>
                                <li><a href="logout.php">logout</a></li>

                            </ul>

                        </li>



                        <?php
                    }

                   ?>

                   <?php
                }
       else
           {
                ?>


                <?php
            }
                ?>



            </ul>

        </div><!--/.nav-collapse -->
    </div>
</nav>
</html>
<!-- ========== COMMON JS FILES for counting up ========== -->


<script src="bootstrap/js/js/waypoint/waypoints.min.js"></script>
<script src="bootstrap/js/js/counterUp/jquery.counterup.min.js"></script>

<script>

    function loadDoc() {
        setInterval(function (){

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("demo").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "data_notifacation.php", true);
                xhttp.send();

            },1000);

    }

    loadDoc();
</script>