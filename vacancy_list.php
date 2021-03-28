<?php
session_start();
?>
<?php
if (isset($_SESSION['id'])) {
# code...

?>
<!DOCTYPE html>
<html>
<title>Lists of vacancy</title>
<body style="background: #f2f2f2">
<?php
include ("navbar.php");
include ("connection.php");
?>
<div class="col-md-12"  style="margin-top:60px;">
    <?php
    include ("sidebar.php")
    ?>
    <div class="col-sm-8" style="margin-top: 20px;">
        <div class="panel">
            <div class="panel-heading">
                <h2 style="text-align: center;">Posted Vacancies</h2>
                <a href="add_vacancy.php?id=<?php echo  $_SESSION['id']?>" class="btn btn-primary" style="float: right"><i class="glyphicon glyphicon-plus " ></i> Add Vacancy</a>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-responsive ">
                    <tr >

                        <th>Title</th>

                        <th>Last Date</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>


                    <?php
                    $view_vac="select * from vacancy v JOIN  user u on v.User_Id=u.Id ORDER BY date DESC ";
                    $query=mysqli_query($conn,$view_vac);
                    $row=mysqli_num_rows($query);
                    while ($list_vac=mysqli_fetch_array($query))
                    {
                        $id=$list_vac['id'];
                        ?>
                        <tr style="font-size: 13px;">

                            <td><?php echo $list_vac['Title']?></td>
                            <td><?php echo $list_vac['Last_Date']?></td>
                            <td><?php echo $list_vac['Fname']." ".$list_vac['Mname']?></td>
                            <td><p><a href="" onclick='deleteVacancy(<?php echo $id;?>)'><span class="glyphicon glyphicon-trash"></span> Delete</a></p>
                                <p> <a href="vacancy_detail.php?id=<?php echo $id?>" ><span class="glyphicon glyphicon-edit"></span> Detail</a></p>

                            </td>
                        </tr>

                        <?php

                    }

                    ?>
                </table>
                <?php
                echo $row." ".'vacancy found';
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
<script>//to delete the vacancy
    function deleteVacancy(id)
    {
        var ans=confirm("Are you sure to delete these vacancy ");
        if(ans){
            window.location="http://localhost/vcnp/delete_vacancy.php?id="+id;
        }

    }

</script>