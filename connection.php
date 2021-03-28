<?php
$conn=mysqli_connect("localhost","root","")or
        die("doesn't connect to the server");
mysqli_select_db($conn,"vcnp")or
        die("doesn't connect to the database");
$ROOT_URL="http://localhost/vcnp";

?>
