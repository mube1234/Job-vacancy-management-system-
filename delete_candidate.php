<?php
include ('connection.php');
$id=$_GET['id'];
$delete_candidate="DELETE FROM user WHERE Id='$id'";

if(mysqli_query($conn,$delete_candidate))
{
    echo "user deleted successfully";
    header("location:user_manage.php");
//    header("Location:http://localhost/vcnp/user_manage.php");
}
else
{
    die("error.".mysqli_error($conn));

}
?>