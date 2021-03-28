<?php
session_start();
?>
<?php
if (isset($_SESSION['id'])) {
# code...

?>
<html>
<head>
    <title>Profile</title>
</head>
<body>
<?php
include ("connection.php");
include ("navbar.php");
?>
<div class="col-md-12"  style="margin-top:60px;">
    <?php
    include ("sidebar.php");
    ?>
    <?php
    $id=$_SESSION['id'];
    $pro="select * from user u where Id='$id'";
    $query_pro=mysqli_query($conn,$pro);
    ?>
<div class="col-md-8 container" style="background-color: #192c71;color: #ffffff">
    <center><h3>Profile</h3></center>

    <a href="edit_profile.php?id=<?php echo $id?>" class="btn btn-success " style="float: right;margin-right: 20px;"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;
    <div class="clearfix"></div>
    <hr style="background-color: #1fa815;border-width: thick;height: 5px;">
    <div class="col-md-6" >
        <h2>Personal Information</h2><hr>
        <?php
        while ($profile=mysqli_fetch_array($query_pro))
        {
        ?>

        <i class="glyphicon glyphicon-user"></i> Frist Name:   <td><strong><?php echo $profile['Fname']?></strong> </td></br></br>
        <i class="glyphicon glyphicon-user"></i> Middle Name:   <td><strong>  <?php echo $profile['Mname']?></strong> </td></br></br>
        <i class="glyphicon glyphicon-user"></i> Last Name:   <td><strong>  <?php echo $profile['Lname']?></strong> </td></br></br>
        <i class="glyphicon glyphicon-phone"></i>    Phone number: <td><strong>  <?php echo $profile['Phone']?></strong> </td></br></br>

       <!--        <i class="glyphicon glyphicon-globe"></i>       Nationality:   <td><strong>  --><?php //echo $user['nationality']?><!--</strong> </td></br></br>-->
        <i class="glyphicon glyphicon-star"></i>          Gender: <td><strong>  <?php echo $profile['Gender']?></strong> </td></br></br>
        <i class="glyphicon glyphicon-envelope"></i>          Email: <td><strong>  <?php echo $profile['Email']?></strong> </td></br></br>
        <i class="glyphicon glyphicon-star"></i>          DOB: <td><strong>  <?php echo $profile['Birth_Date']?></strong> </td></br></br>
        <i class="glyphicon glyphicon-star"></i>          Nationality: <td><strong>  <?php echo $profile['nationality']?></strong> </td></br></br>
        <i class="glyphicon glyphicon-star"></i>         Region: <td><strong>  <?php echo $profile['region']?></strong> </td></br></br>
        <i class="glyphicon glyphicon-star"></i>         Zone: <td><strong>  <?php echo $profile['zone']?></strong> </td></br></br>
        <i class="glyphicon glyphicon-star"></i>         Woreda: <td><strong>  <?php echo $profile['woreda']?></strong> </td></br></br>
        <i class="glyphicon glyphicon-map-marker"></i>    Current Address:   <td><strong>  <?php echo $profile['Address']?></strong> </td></br></br>

        <i class="glyphicon glyphicon-star"></i>         Kebele: <td><strong>  <?php echo $profile['kebele']?></strong> </td></br></br>
    </div>

        <div class="col-md-6">
            <h2>Educational Information</h2><hr>
            <i class="glyphicon glyphicon-file"></i> Document:   <td><strong><?php echo $profile['Doccument']?></strong> </td></br></br>
            <i class="glyphicon glyphicon-certificate"></i> Qualification:   <td><strong>  <?php echo $profile['Qualificacion']?></strong> </td></br></br>
            <i class="glyphicon glyphicon-user"></i> Skill:   <td><strong>  <?php echo $profile['Skill']?></strong> </td></br></br>
<!--            <i class="glyphicon glyphicon-phone"></i>    Phone number: <td><strong>  --><?php //echo $profile['Phone']?><!--</strong> </td></br></br>-->
</div>
    <hr style="background-color: #7f9784;border-width: thick;height: 5px;">

</div>
    <?php
    }
    ?>
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
