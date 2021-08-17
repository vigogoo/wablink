<?php
include("../../connect.php");
$selx=mysqli_query($conn,"SELECT count(*) total from order_details where status='2'");
$valx=mysqli_fetch_assoc($selx);
$new_orders=$valx['total'];
echo $new_orders;
?>
