<?php
include ('connection.php');
$id=$_GET['id'];
$delete_category="DELETE FROM category WHERE Id='$id'";

if(mysqli_query($conn,$delete_category)){
    echo "category deleted successfully";
    header("location:categories.php");
//    header("Location:http://localhost/vcnp/categories.php");
}
else
    {
    die("error.".mysqli_error($conn));

}
?>