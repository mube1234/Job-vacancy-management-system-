<?php
include ('connection.php');
$id=$_GET['id'];
$delete_complain="DELETE FROM suggestion WHERE id='$id'";

if(mysqli_query($conn,$delete_complain))
{
    echo "<script>alert('comment deleted successfully')</script>";
    // header("location:vacancy_detail.php");
//    header("Location:http://localhost/vcnp/user_manage.php");
}
else
{
    die("error.".mysqli_error($conn));

}
?>