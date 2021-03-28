<?php
session_start();
?>

<body style="background-color: #f2f2f2">
<?php
include ("connection.php");
include ("navbar.php");
?>
<div class="col-md-12"  style="margin-top:40px;">
    <?php
    ?>
    <?php
    $id=$_SESSION['id'];
    $pro="select * from user where Id='$id'";
    $query_pro=mysqli_query($conn,$pro);


    ?>
    <div class=" container">
    <div class="col-md-12">
        <div class="panel panel-body">
        <h3>My Profile</h3>
            <center>
            <div class="col-md-4">
                <?php
                $pro="select * from user where Id='$id'";
                $query=mysqli_query($conn,$pro);
                while ($row=mysqli_fetch_array($query))
                {
                    $user_image=$row['photo'];
                }
                echo "
                         <img src='images/posted_images/$user_image' alt='profile' class='img-circle' width='120px' height='120px'>
               

                <form action= edit_profile.php?id ='$id' method='post' enctype='multipart/form-data'>

              <p >
                        <input  class=' form-control' type='file' name='u_image' style='width: 35%'/></p>


                    <button id='button_profile' name='update_photo' class='btn btn-info'>Update Photo</button>

                </form>
                "
                ?>
            </div>
        </center>
        <div class="clearfix"></div>
        <hr style="background-color: #1fa815;border-width: thick;height: 5px;">

                <?php
                if (isset($_POST['btn-update']))
                {
                    $fname=$_POST['fname'];
                    $mname=$_POST['mname'];
                    $lname=$_POST['lname'];
                    $mob=$_POST['phone'];
                    $addrs=$_POST['address'];
                    $email=$_POST['email'];
                    $bod=$_POST['bod'];

                    $qua=$_POST['qua'];
                    $skill=$_POST['skill'];


                $update_user="UPDATE user set Fname='$fname',Mname='$mname',Lname='$lname',Phone='$mob',
                                Email='$email',Birth_Date='$bod',Skill='$skill',Qualificacion='$qua',Address='$addrs'
                                WHERE Id='$id'";
                 $update_query=mysqli_query($conn,$update_user);
                    if ($update_query)
                    {
                        echo  "<center><div class='alert alert-success' style='background-color: green;color: white;font-size: 18px;'>
                                <p><i class=\"glyphicon glyphicon-ok-circle\"></i>&nbsp; <b>  Done</b> Profile Updated successfully</p> 
                                </div></center>";
//                    echo "<script>alert('well done $fname,your are successfully registered')</script>";
//                    echo "<script>window.open('login.php','_self')</script>";
                    }
                    else
                    {
                        //die( "<b> <font color='red'>user ca not created successfully</font> </b>");
                        die('falied'. mysqli_error($conn));
                        //echo "<script>window.open('register','_self')</script>";

                    }
                }
                ?>

            <?php
            if(isset($_POST['update_photo']))
            {
                $u_image=$_FILES['u_image']['name'];
                $image_tmp=$_FILES['u_image']['tmp_name'];
                $random_number=rand(1,100);

                if($u_image==''){
                    echo "<script>alert('please select profile Image')</script>";
                    echo "<script>window.open('edit_profile.php','_self')</script>";
                    exit();

                }
                else
                {
                    move_uploaded_file($image_tmp,"images/posted_images/$u_image.$random_number");
                    $update="update user set photo='$u_image.$random_number' where Id='$id'";
                    $run=mysqli_query($conn,$update);

                    if($run)
                    {

                        echo "<script>alert('your profile updated')</script>";
                      echo "<script>window.open('edit_profile.php?id='$id','_self')</script>";

                    }

                }

            }

            ?>



    <form method="post" >
        <div class="col-md-6" >
            <h2>Personal Information</h2><hr>
            <?php
            while ($profile=mysqli_fetch_array($query_pro))
            {

            ?>

           <label>Frist Name:</label> <input type="text" value="<?php echo $profile['Fname']?>" class="form-control" name="fname"><br>
           <label>Middle Name: </label><input type="text" value="<?php echo $profile['Mname']?>" class="form-control" name="mname"><br>
           <label> Last Name:</label> <input type="text" value="<?php echo $profile['Lname']?>" class="form-control" name="lname"><br>
              <label>Phone number:</label> <input type="text" class="form-control" value=" <?php echo $profile['Phone']?>" name="phone"><br>
              <label>Current Address: </label> <input type="text" class="form-control" value=" <?php echo $profile['Address']?>" name="address"><br>


           <label> Email:</label> <input type="email" value="<?php echo $profile['Email']?>" class="form-control" name="email">
           <label> Birth Date:</label> <input type="date" value="<?php echo $profile['Birth_Date']?>" class="form-control" name="bod">
            <label>  Nationality:</label>
            <select class="form-control" name="nationality" value="<?php echo $profile['nationality']?>" >
                <option value="disabled">Select Nationality</option>
                <option>Ethiopia</option>
                <option>Kenya</option>
                <option>Djibouti</option>
                <option>Somalia</option>
                <option>Algeria</option>

            </select>
            <label> Region:</label>
            <select class="form-control" name="region" value="<?php echo $profile['region']?>" >
                <option value="disabled">Select Region</option>
                <option>Oromia</option>
                <option>Amara</option>
                <option>Tigrai</option>
                <option>Afar</option>
                <option>Somali</option>

            </select>
            <label>  Zone:</label>
            <select class="form-control" name="zone" value="<?php echo $profile['zone']?>" >
                <option value="disabled">Select zone</option>
                <option>East Wallaga</option>
                <option>West wallaga</option>
                <option>I/A/B</option>
                <option>B/Bedele</option>
                <option>Bale</option>
            </select>
            <label>Woreda:</label> <input type="text" class="form-control" value=" <?php echo $profile['woreda']?>" name="woreda"><br>
            <label>  Zone:</label>
            <select class="form-control" name="kebele" value="<?php echo $profile['kebele']?>" >
                <option value="disabled">Select kebele</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
            </select>
        </div>

        <div class="col-md-6">
            <h2>Educational Information</h2><hr>
           <label> Document:</label><input type="file" value="<?php echo $profile['Doccument']?>" class="form-control" name="doc">
           <label>  Qualification:</label>
            <select class="form-control" name="qua" value="<?php echo $profile['Qualificacion']?>" >
                <option value="disabled">Select qualification</option>
                <option>Phd</option>
                <option>Masters</option>
                <option>Degree</option>
                <option>Diploma</option>
                <option>Level</option>

            </select>

             <label>Skill:</label> <input class="form-control" type="text" value=" <?php echo $profile['Skill']?>" name="skill">

            <br><br>
        </div>

        <div class="panel-body text-right" style="margin-top: 20px">
            <button class="btn btn-success btn-lg" name="btn-update">Update</button>
            <button class="btn btn-danger btn-lg">Cancel</button>
        </div>
</form>
        </div>
    </div>
    </div>
</div>

<?php
}
?>
</body>

