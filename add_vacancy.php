<?php
session_start();
include ("connection.php");
if(isset($_SESSION['id']))
{
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

<div class="col-md-8">
   <div class="panel">
       <div class="page-header"> <h2 style="margin-left: 20px">Add New Vacancy</h2></div>
       <!--           php code here-->
       <?php
       if(isset($_POST['submit_btn']))
       {
           $adder=$_GET['id'];
           $title=$_POST['title'];
           $des=$_POST['desc'];
           $date=$_POST['due_date'];
           $cat=$_POST['category'];

           $insert_vacancy="INSERT INTO vacancy (User_Id,Title,Description,category,Date,Last_Date) VALUES 
                              ('$adder','$title','$des','$cat',NOW(),'$date')";
           $insert_query=mysqli_query($conn,$insert_vacancy);
           if ($insert_query)
           {
               echo  "<div class='alert alert-success' style='background-color: green;color: white'>
                                <p><i class=\"glyphicon glyphicon-ok\"></i>&nbsp; <b>  Done</b> Vacancy attached successfully</p> 
                                </div>";
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

       <!--           end-->
       <div class="panel-body">
           <form method="post" action="">

           <label>Title</label>
           <input type="text" class="form-control" name="title" required="required" >
                   <label>Your Id</label>
           <input type="text" value="<?php echo $_GET['id']; ?>" hidden="hidden">
           <label>Description</label>
           <textarea class="form-control" style="height: 180px;" name="desc"  required="required"></textarea>
           <label>Due Date</label>
           <input type="date" class="form-control" name="due_date"  required="required">
           <label>Select Category</label>
               <?php
               $cat="select * from category";
               $cat_query=mysqli_query($conn,$cat);

               ?>
           <select class="form-control" name="category" >
<!--               <option>Beeksisa Qacarrii</option>-->
<!--               <option>Beeksisa Jijjiirraa</option>-->
<!--               <option>Carraa Barnootaa</option>-->
<!--               <option>Beeksisa Caalbaasii</option>-->
<!--               <option>guddina sadarkaa</option>-->

           <?php
           while ($row=mysqli_fetch_array($cat_query))
           {
               ?>


                   <option><?php echo $row["name"]?></option>

           <?php
           }
//
//           ?>
           </select>
            <br>
           <button type="submit" class="btn btn-primary" style="float: right" name="submit_btn">Submit</button>
           </form>

       </div>
   </div>
</div>
    </div>
</body>
</html>
    <?php

}
else{
    header("Location:http://localhost/vcnp/login.php");
}
?>
