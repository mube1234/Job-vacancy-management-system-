
<style>
    .list-group-item{
        background-color: #25415a;

    }
  ul li a{
      color: white;
  }
    ul li a:hover{
        color: black;
    }
</style>
<div class="col-md-4">
    <div class="panel panel-primary">
        <div class="panel-heading" style="background-color: #2c0061">
            <h4 style="font-family: 'Algerian'"><a href="management.php" style="color: lawngreen">Admin Dahboard</a>
            <img  src="images/user1.png" class="img-circle" style="height: 50px;width: 50px;float: right">
            </h4>
            <a href="admin_profile.php" style="float: right;color: lawngreen"><i class="glyphicon glyphicon-check" style="color: lawngreen"></i> <?php
                echo $_SESSION['fname'] . " " . $_SESSION['mname'];
                ?></a>
            <div class="clearfix"></div>
        </div>

        <div class="text-capitalize ">
            <ul class="navbar navbar-inverse nav">
               <li class="list-group-item" ><a href="management.php"  ><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;User Management</a> </li>
                <li class="list-group-item" ><a  href="admin_view_vacancy.php"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;  Vacancy board</a> </li>
                <li class="list-group-item"><a href="add_emplyee.php" ><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp; Add New User</a> </li>
                <li class="list-group-item"><a href=""  ><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp; Manage Schedule</a></li>
                <li class="list-group-item"><a href="events.php?id=<?php echo $_SESSION['id']?>" ><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Events</a> </li>
                <li class="list-group-item"><a href=""  ><span class="glyphicon glyphicon-star"></span> Check Report</a> </li>
                <li class="list-group-item"><a href="history.php" ><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp; History</a> </li>
                <li class="list-group-item"><a href=""><span class="glyphicon glyphicon-object-align-top"></span>&nbsp;&nbsp; External relation</a> </li>

                <li class="list-group-item"><a href="#new-item" data-toggle="collapse"><span class="glyphicon glyphicon-cog"></span> Setting <span class="glyphicon glyphicon-menu-right" style="float: right"></span> </a> </li>
                   <ul class="nav collapse" id="new-item">
                      <li class="list-group-item"><a href="employee_pass_remember.php?id=<?php echo $_SESSION['id']?>" ><div class="col-sm-2"></div><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp; Password rememberance</a> </li>
                      <li class="list-group-item"><a href="change_password_admin.php?id=<?php echo $_SESSION['id']?>"  ><div class="col-sm-2"></div><span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;Change password </a> </li>
                       <li class="list-group-item"><a  href="change_admin.php?id=<?php echo $_SESSION['id']?>"><div class="col-sm-2"></div><span class="glyphicon glyphicon-folder-open"></span>&nbsp; Change Admin</a> </li>
                       <li class="list-group-item"><a  href="help_employee.php"><div class="col-sm-2"></div><span class="glyphicon glyphicon-list"></span>&nbsp; Help employee</a> </li>

                  </ul>

                <li class="list-group-item"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a> </li>
            </ul>
        </div>
    </div>
</div>