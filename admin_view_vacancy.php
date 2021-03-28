<?php
session_start();
?>
<?php
if(isset($_SESSION['id'])) {
?>
<!DOCTYPE html>
<html>
<title>Homepage</title>
<body style="background: #f2f2f2">
<?php
include ("navbar.php");
include ("connection.php");
?>
<div class="row" style="margin-top:60px;">
<div class="col-md-12">
    <?php
    include ("admin_sidebar.php")
    ?>
    <div class="col-sm-8" style="margin-top: 20px;">
        <div class="panel panel-info">
            <div class="panel-heading" style="background-color: #4d656b;color: #ffffff">
                <h3 style="text-align: center;">List of Available Vacancies</h3>
                <div class="clearfix"></div>
            </div>


                    <?php
                    $view_vac="select * from vacancy v JOIN user u ON v.User_Id=u.Id ORDER BY Date DESC ";
                    $query=mysqli_query($conn,$view_vac);
                    while ($list_vac=mysqli_fetch_array($query))
                    {
                    ?>
            <div class=" panel panel-body">


                <p style="float: right">Uploaded on: <?php echo $list_vac['Date']?></p>
               <h4><center><?php echo $list_vac['Title']?></center></h4>

                <p><b>Description:</b> <?php echo $list_vac['Description']?></p>

                <p><span class="glyphicon glyphicon-calendar"></span> Last date:  <?php echo $list_vac['Date']?></p><br>
                <label>By</label> <?php echo $list_vac['Fname']." ".$list_vac['Mname']?></p>

                <a href="vacancy_detail.php?id=<?php echo $list_vac['id']?>" class="btn btn-info"> Read More</a>

            </div>
                        <hr style="background-color: #dbd9d5;height: 5px;">
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