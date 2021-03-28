<?php
session_start();
?>
<?php
if(isset($_SESSION['id'])) {
    ?>
<!DOCTYPE html>
<html>
<title>Vacancy Detail</title>
<body>
<?php
include ("navbar.php");
include ("connection.php");
?>
<?php
$id=$_GET['id']
?>
<div class=" row"  style="margin-top:60px;">
<div class="col-md-12" >

<div class="container">
    <div class=" col-sm-9">
        <div class="panel panel-default">

<!-- for view counting-->

            <?php
//   adding new visitors
            $visitor_ip=$_SERVER['REMOTE_ADDR'];

//            checking if the user is unique
            $select="SELECT * from view_count  where ip_address='$visitor_ip' AND Vac_id='$id'";
            $query=mysqli_query($conn,$select);
            $person_visit=mysqli_num_rows($query);
            if ($person_visit<1)
            {
                $insert="INSERT INTO view_count(ip_address,Vac_id,visit_date) VALUES ('$visitor_ip','$id',NOW())";
                $query=mysqli_query($conn,$insert);
                if (!$query)
                {
                    die('failed'. mysqli_error($conn));
                }

            }


//            retriving existing visitor
            $select="SELECT * from view_count  where Vac_id='$id'";
            $query1=mysqli_query($conn,$select);
            if (!$query1)
            {
                die("failed".$query1);
            }
            $total_visitor=mysqli_num_rows($query1);

            ?>
<!--            for listing vacancy detail-->
            <?php
            $view_vac="select * from vacancy v WHERE id='$id' ";
            $query=mysqli_query($conn,$view_vac);
            $list_vac=mysqli_fetch_array($query);
            ?>
            <div class="panel-heading">
                <center><h4><b><?php echo $list_vac['Title']?></b></h4></center>
                <div class="clearfix"></div>
            </div>
            <small class="text-muted" style="float: right">Date: <?php echo $list_vac['Date']?></small>

                <div class=" panel panel-body" >



                    <p><b>Description:</b> <?php echo $list_vac['Description']?></p>

                    <p><span class="glyphicon glyphicon-calendar"></span> Last date:  <?php echo $list_vac['Date']?></p><br>

                    <div style="float:right;color: #2e6da4">
                        <span class="glyphicon glyphicon-eye-open"></span> <?php echo $total_visitor ?> View &nbsp&nbsp
                        
                        <?php
                        $swift="select * from suggestion where Vac_id='$id'";
                        $fortran=mysqli_query($conn,$swift);
                        $django=mysqli_fetch_array( $fortran);
                        $row=mysqli_num_rows($fortran);

                        ?>

                       <span class="glyphicon glyphicon-comment"></span>  <?php echo $row ?> Comment &nbsp&nbsp
                        <a href=""> <span class="glyphicon glyphicon-share"></span> Share</a>
                       </div>
                    </div>
                </div>

              <div class="col-md-9">
                  <h3>Comment here</h3>



                    <?php
                    if (isset($_POST['btn_send'])) 
                    {
                       $user_id=$_SESSION['id'];
                       $comment=$_POST['complain'];

                       $query="INSERT INTO suggestion(User_id,Vac_id,Comment,date) VALUES ('$user_id','$id',
                       '$comment',NOW())";
                       $result=mysqli_query($conn,$query);
                       if ($result)
                       {

                       }
                       else
                       {
                         die('failed'. mysqli_error($conn));
                       }
                    }
                    else
                      ?>
                <form class="" method="post">
                    <textarea name="complain" type="text" class="form-control" required="required"></textarea><br>
                    <button name="btn_send" class="btn btn-info btn-sm" type="submit" style="float:right">Send</button><br>
                 </form>
                        <div class="clearfix"></div><br>


                        <!--              to display comments-->
                        <?php
                    $select="SELECT * from suggestion s JOIN user u On s.User_Id=u.Id WHERE Vac_id='$id' ORDER BY date DESC ";
                    $query=mysqli_query($conn,$select);
                    while ($row=mysqli_fetch_array($query))
                    {
                                $s_id=$row['id'];

                        ?>
                        <div class="panel panel-body" style="background-color: #f2f2f2">
                            <p><i class="glyphicon glyphicon-user"></i> <?php echo $row['Fname']." ". $row['Mname'] ?></p>
                            <small class="text-muted"><i class="glyphicon glyphicon-comment"></i> <?php echo $row['Comment'] ?></small><br>
                            <small class="text-muted " style="float: right"><i class="glyphicon glyphicon-calendar"></i> <?php echo $row['date'] ?></small><br>


                        <?php

                        if(isset($_SESSION['id']) && ($_SESSION['role']=='Employee') )
                        {
                            ?>
                            <a href="#" onclick='deleteComplain(<?php echo $s_id;?>)' class="btn btn-danger btn-sm" data-toggle="tooltip" style="float: right" title="delete complain">Delete</a>
                            <?php
                        }
                        ?>
                        </div>

                        <?php


                    }
                        ?>
                  <!--    -->
                  
              </div>





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
    <script>//to delete the category
    function deleteComplain(id)
    {
        var ans=confirm("Are you sure to delete these comment");
        if(ans){
            window.location="http://localhost/vcnp/delete_complain.php?id="+id;
        }

    }

</script>