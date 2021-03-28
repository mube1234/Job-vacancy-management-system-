<?php
session_start();
?>
<?php
if (isset($_SESSION['id'])) {
# code...

?>
<html>
<head>
    <title>Resume</title>
</head>
<body>
<?php
include ("connection.php");
include ("navbar.php");
?>
<div class="container" style="width: 75%;height: 700px; background: #ffffff;margin-top: 60px;">
    <h2>My Resumes</h2>
    <hr style="background-color: #0f0f99;border-width: thick;height: 8px;">

    <?php
    //profile image display
    $id=$_GET['id'];
    $list_pro="select * from profile WHERE User_id='$id' ";
    $user_list=mysqli_query($conn,$list_pro);


    while ($row_posts=mysqli_fetch_array($user_list)) {

        $image = $row_posts['profile_image'];
        $addr = $row_posts['Adress'];
        echo "
                        
                
               <img class='img-circle'  src='imagepost/$image' style='height: 120px;width: 120px;'>
              ";
        echo "
                        
                <h3>$addr</h3>
              ";



    }

    //finish display
    ?>


    <?php

    // select image
    echo "
                       <div>
                         
                         
                     <form action= '' method='post' enctype='multipart/form-data'>

                            <br>
                            <input type='file' name='profile' size='5'/> 


                           

                            <button style='margin-left: 200px;margin-top: -800px;' name='update' class='panel-primary btn-link'>Update profile</button>

                            </form>
                         </div>


                   " ;

    //finish selecting image
    ?>











    <?php
    $uname=$_SESSION['id'];

    $users="select * from resumes where username='$uname'";
    $users=mysqli_query($conn,$users);


    $com=mysqli_num_rows($users);
    echo "<h4 style='background-color: #986840;color: #d79cff;width: 500px;font-style: italic;text-align: center'></h4>";
    ?>
    <div>


        <?php
        while ($user=mysqli_fetch_array($users))
        {
            $profile_image = $user['profile'];


            ?>
            <br>
            <div style="margin-left: 50px;">

                <i class="glyphicon glyphicon-user"></i> Frist Name:   <td><strong><?php echo $user['fname']?></strong> </td></br></br>
                <i class="glyphicon glyphicon-user"></i> Last Name:   <td><strong>  <?php echo $user['lname']?></strong> </td></br></br>
                <i class="glyphicon glyphicon-envelope"></i>    Email Address: <td><strong>  <?php echo $user['email']?></strong> </td></br></br>

                <i class="glyphicon glyphicon-map-marker"></i>    Current Address:   <td><strong>  <?php echo $user['current_address']?></strong> </td></br></br>
                <i class="glyphicon glyphicon-globe"></i>       Nationality:   <td><strong>  <?php echo $user['nationality']?></strong> </td></br></br>
                <i class="glyphicon glyphicon-pencil"></i>          Gender: <td><strong>  <?php echo $user['gender']?></strong> </td></br></br>
            </div>

            <div style="float: right;margin-top: -250px;margin-right: 220px;">
                <i class="glyphicon glyphicon-heart"></i>        Skill:   <td><strong>  <?php echo $user['skill']?></strong> </td></br></br>
                <i class="glyphicon glyphicon-star"></i>    Graduate From: <td> <strong> <?php echo $user['graduate_from']?></strong> </td></br></br>
                <i class="glyphicon glyphicon-ok-circle"></i>   Graduate Field:   <td><strong>  <?php echo $user['graduate_field']?></strong> </td></br></br>
                <i class="glyphicon glyphicon-tint"></i>    Graduate Year: <td> <strong> <?php echo $user['graduate_year']?></strong> </td></br></br>
                <?php $username=$user['username'];?>
                <td>
            </div>
            <div style="margin-left: 70px">
                <a style="text-align: left" href='#'  class='btn btn-primary glyphicon glyphicon-eye-open'>View All</a>
                <a href="#" class="btn btn-success glyphicon glyphicon-edit">Edit</a></br>


                </td></br></br></br>
            </div>

            </tr>

            <?php
        }
        ?>








        <?php
        if(isset($_POST['update'])){
            $pimage=$_FILES['profile']['name'];
            $image_tmp=$_FILES['profile']['tmp_name'];
            $random_number=rand(1,100);

            if($pimage==''){
                echo "<script>alert('please select profile Image')</script>";
                echo "<script>window.open('resume.php?username=$username','_self')</script>";
                exit();

            }else
            {
                move_uploaded_file($image_tmp,"imagepost/$pimage.$random_number");
                $update="update users set profile_image='$pimage.$random_number' where username='$username'";
                $run=mysqli_query($conn,$update);

                if($run)
                {

                    echo "<script>alert('your profile updated')</script>";
                    echo "<script>window.open('resume.php?username=$username','_self')</script>";

                }

            }

        }

        ?>











    </div>
    <a  class="btn btn-primary" style="float: right;width: 80px;"  href="home.php">Back</a>
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