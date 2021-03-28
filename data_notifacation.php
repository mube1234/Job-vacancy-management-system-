<?php
include ('connection.php');
?>

<!--                        notificatio here-->
<?php
$notify=mysqli_query($conn,"select * from notification where status='0' ORDER BY date DESC ");
$count=mysqli_num_rows($notify);
echo "<span class='badge ' style='background-color: #b10516'>$count</span>";


