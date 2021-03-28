<?php
include ('connection.php');
$id=$_GET['id'];
$delete_event="DELETE FROM event WHERE id='$id'";

if(mysqli_query($conn,$delete_event)){
    echo "Event deleted successfully";
    header("location:events.php");
//    header("Location:http://localhost/vcnp/events.php");
}
else
{
    die("error.".mysqli_error($conn));

}
?>