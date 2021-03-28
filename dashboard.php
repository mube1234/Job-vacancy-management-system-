<?php
session_start();
?>
<?php
if(isset($_SESSION['id'])) {
?>
<html>
<title>dashboard</title>
<body style="background: #f2f2f2">
<?php
include ("navbar.php");
include ("connection.php");
?>

<div class="col-md-12"  style="margin-top:60px;">

    <?php
    include ("sidebar.php")
    ?>
    <div class="col-md-8" style="background: #ffffff">
        <div style="margin-top: 20px;">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                 <div class="row">
                     <div class="col-sm-3"><i class="glyphicon glyphicon-signal" style="font-size: 4em"></i></div>
                     <div class="col-sm-9 text-right">
                         <?php
                         $view_vac="select * from vacancy";
                         $query=mysqli_query($conn,$view_vac);
                         $total_vacancy=mysqli_num_rows($query);
                         ?>
<!--                         <span class="number counter">--><?php //echo htmlentities($total_vacancy);?><!--</span>-->
                         <div style="font-size:2.5em" class="counter"> <?php echo $total_vacancy;?></div>
                         <div>Vacancy</div>
                     </div>
                 </div>
                </div>
               <a href="vacancy_list.php">
                   <div class="panel-footer">
                       <div class="pull-left">view vacancies</div>
                       <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
                       <div class="clearfix"></div>
                   </div>
               </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-3"><i class="glyphicon glyphicon-user" style="font-size: 4em"></i></div>
                        <div class="col-sm-9 text-right">
                            <?php
                            $view_vac="select * from user where role='Candidate'";
                            $query=mysqli_query($conn,$view_vac);
                            $total_user=mysqli_num_rows($query);
                            ?>
                            <div style="font-size:2.5em" class="counter"> <?php echo $total_user;?></div>
                            <div>Candidates</div>
                        </div>
                    </div>
                </div>
                <a href="user_manage.php">
                    <div class="panel-footer">
                        <div class="pull-left">view candidate</div>
                        <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-3"><i class="glyphicon glyphicon-list" style="font-size: 4em"></i></div>
                        <div class="col-sm-9 text-right">
                            <?php
                            $view_vac="select * from category";
                            $query=mysqli_query($conn,$view_vac);
                            $total_category=mysqli_num_rows($query);
                            ?>
                            <div style="font-size:2.5em" class="counter"> <?php echo $total_category;?></div>

                            <div>Categories</div>
                        </div>
                    </div>
                </div>
                <a href="categories.php">
                    <div class="panel-footer">
                        <div class="pull-left">view categories</div>
                        <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        </div>
    <div class="row" >



        <div>
            <?php
            $vacancy="select * from vacancy  ORDER BY Date DESC LIMIT 6 ";
            $vacan=mysqli_query($conn,$vacancy);
            $vac_count=mysqli_num_rows($vacan);
            ?>
           <table  class=" table-bordered  table-responsive" style="width: 100%;background-color: #375dae;height: 50px;color: #ffffff">
               <tr>
                   <th style="font-size: 18px"><center>Latest Job Vacancies</center></th>
               </tr>
           </table>
            <table  class="table  table-responsive">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th >Date</th>
                    <th>Action</th>



                </tr>

                <?php
                while ($view_vacancy=mysqli_fetch_array($vacan))
                {


                    ?>
                    <tr class="small">
                        <td>1</td>
                        <td>  <?php echo $view_vacancy['Title'] ?></td>
                        <td> <?php echo $view_vacancy['category'] ?></td>
                        <td><?php echo $view_vacancy["Date"] ?></td>



                        <!--                            --><?php //$id=$user['Id'];
                        ?>
                        <td>
                            <a href="vacancy_detail.php?id=<?php echo $view_vacancy["id"]  ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>

                        </td>

                    </tr>
                    <?php
                }
                ?>
            </table>
            <a href="" style="float: right">More</a>
            <div class="clearfix"></div>
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
<script>
    $(function(){

        // Counter for dashboard stats
        $('.counter').counterUp(
            {
            delay: 10,
            time: 1000
        });



    });
</script>