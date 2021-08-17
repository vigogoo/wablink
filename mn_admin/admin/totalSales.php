<?php
include("../../connect.php");
$selx=mysqli_query($conn,"SELECT count(*) total,(select sum(cost) from ordered_item where order_details_id=o.order_details_id) as total_cost from order_details o where status='1'");
$valx=mysqli_fetch_assoc($selx);
if($valx['total_cost']){
$new_orders=number_format($valx['total_cost'])."/=";
}else{
	$new_orders = "0/=";
}
echo $new_orders;
?>
