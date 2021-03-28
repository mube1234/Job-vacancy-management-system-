<div class=" col-md-4">
<div class="panel panel-primary">
    <div class="panel-heading" style="background-color: #1b6d85">
        <h4 style="font-family: 'Algerian'">Employee Dahboard
            <img  src="images/user1.png" class="img-circle" style="height: 50px;width: 50px;float: right">
        </h4>
        <a href="profile.php?id=<?php echo $_SESSION['id']?>" style="float: right;color: #f2f2f2">
            <i class="glyphicon glyphicon-check" style="color: #60b4f9"></i>
            <?php
            echo $_SESSION['fname'] . " " . $_SESSION['mname'];
            ?></a>
        <div class="clearfix"></div>
    </div>
<?php
$view_event="select * from event";
$query=mysqli_query($conn,$view_event);
$row=mysqli_num_rows($query);

$view_feedback="select * from feedback";
$query=mysqli_query($conn,$view_feedback);
$row2=mysqli_num_rows($query);
?>
    <div class="text-capitalize">
    <ul class="navbar navbar-default nav">
        <li class="list-group-item"> <a href="dashboard.php"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a> </li>
        <li class="list-group-item"> <a href="add_vacancy.php?id=<?php echo  $_SESSION['id']?>"><i class="glyphicon glyphicon-plus"></i> Add New Vacancy</a> </li>
        <li class="list-group-item"> <a href="vacancy_list.php"><i class="glyphicon glyphicon-list"></i> Vacancy list</a> </li>
        <li class="list-group-item"> <a href="categories.php"><i class="glyphicon glyphicon-tasks"></i> Categories</a> </li>

        <li class="list-group-item"><a href="user_manage.php"><i class="glyphicon glyphicon-check"></i>  Manage Users</a></li>
        <li class="list-group-item"> <a href="view_event.php"><i class="glyphicon glyphicon-info-sign"></i> Events <span class="badge" style="background: blue"><?php echo $row?></span>  </a></li>
        <li class="list-group-item"> <a href="profile.php?id=<?php echo  $_SESSION['id']?>"><i class="glyphicon glyphicon-user"></i> My profile</a></p> </li>
        <li class="list-group-item"><a href="#new-item" data-toggle="collapse"><span class="glyphicon glyphicon-cog"></span> Setting <span class="glyphicon glyphicon-menu-right" style="float: right"></span> </a> </li>
        <ul class="nav collapse" id="new-item">
            <li class="list-group-item"><a href="employee_pass_remember.php?id=<?php echo $_SESSION['id']?>" ><div class="col-sm-2"></div><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp; Password rememberance</a> </li>
            <li class="list-group-item"><a href="change_password.php?id=<?php echo $_SESSION['id']?>"  ><div class="col-sm-2"></div><span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;Change password </a> </li>
            <li class="list-group-item"><a  href=""><div class="col-sm-2"></div><span class="glyphicon glyphicon-list"></span>&nbsp; Help Candidate</a> </li>

        </ul>
        <li class="list-group-item"> <a href="view_feedback.php"><i class="glyphicon glyphicon-info-sign"></i> Feedback <span class="badge" style="background: blue"><?php echo $row2?></span>  </a></li>

        <li class="list-group-item"> <a  href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
    </ul>
</div>
</div>

</div>