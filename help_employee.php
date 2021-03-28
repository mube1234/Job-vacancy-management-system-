<?php
session_start();
?>
?>
<?php
if (isset($_SESSION['id'])) {
# code...

?>
<!DOCTYPE html>
<html>
<title>Help employee</title>
<body style="background: #f2f2f2">
<?php
include ("navbar.php");
include ("connection.php");
?>
<div class="col-md-12"  style="margin-top:60px;">
    <?php
    include ("admin_sidebar.php")
    ?>
    <div class="col-sm-8" style="margin-top: 20px;">
        <div class="panel">
            <div class="panel-heading">
                <h3 style="text-align: center;">Employee password rememberance</h3>

            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>

                        <th>Frist name</th>
                        <th>Middle name</th>
                        <th>Last name</th>
                        <th>question</th>
                        <th>answer</th>
                      
                    </tr>


                    <?php
                    $view_vac="select * from forgot_table ft join user u on ft.user_id=u.Id";
                    $query=mysqli_query($conn,$view_vac);
                    $row=mysqli_num_rows($query);
                    while ($list_vac=mysqli_fetch_array($query))
                    {

                        ?>
                        <tr>

                            <td><?php echo $list_vac['Fname']?></td>
                            <td><?php echo $list_vac['Lname']?></td>
                            <td><?php echo $list_vac['Fname']?></td>
                            <td><?php echo $list_vac['question']?></td>
                            <td><?php echo $list_vac['answer']?></td>
                            
                        </tr>

                        <?php

                    }

                    ?>
                </table>
                <?php
                echo $row." ".'user info found';
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
