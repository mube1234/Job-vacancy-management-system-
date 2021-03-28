<?php
include ('connection.php');
$id=$_GET['id'];
$delete_vacancy="DELETE FROM vacancy WHERE Id='$id'";

if(mysqli_query($conn,$delete_vacancy)){
    echo "user deleted successfully";
    header("location:vacancy_list.php");
//    header("Location:http://localhost/vcnp/vacancy_list.php");
}
else
{
    die("error.".mysqli_error($conn));

}
?>