<?php
include("../../connect.php");
$selx=mysqli_query($conn,"select count(*) total from order_details where status='0'");
$valx=mysqli_fetch_assoc($selx);
$new_orders=$valx['total'];
if($new_orders>0){
?>
 <embed src="media/success.wav" autoplay="true" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">
 <div style="position:fixed;top:5px;right:50px" class="alert alert-success alert-dismissable">
                 <a href="customerOrders.php"> <i class="icon-check-sign"></i> 
				 <strong>
				 <?php echo $new_orders>1?$new_orders." New orders":$new_orders." New order";  ?>!</strong> View new orders now</a>
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
<?php
}
?>
