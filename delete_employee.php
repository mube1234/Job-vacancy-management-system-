<?php
include ('connection.php');
$id=$_GET['id'];
$delete_employee="DELETE FROM user WHERE Id='$id'";

if(mysqli_query($conn,$delete_employee)){
    echo "Employee deleted successfully";
    header("location:management.php");
   // header("Location:http://localhost/vcnp/management.php");
}
else
{
    die("error.".mysqli_error($conn));

}
?>