<?php
include('connection.php');
session_start();
session_destroy();
header("location:login.php");
//header("location:http://localhost/vcnp/login.php");
?>