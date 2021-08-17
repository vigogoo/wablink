<?php
if(isset($_REQUEST['id'])){
   $id=$_REQUEST['id'];
}else{
   echo "No result";
return;
}
?>
<?php
include('../../connect.php');
include('../../config.php');
$sel=mysqli_query($conn,"SELECT * from order_details where order_details_id='$id'");
$val=mysqli_fetch_assoc($sel);
if(!$val){
 echo "No details found";
return;
}
$status=$val['status'];
?>
<table width="100%" style="color:#333" align="center" cellspacing="0" cellpadding="10" class="tablesorter">
  <tr>
  <td colspan="6" align="center">
  <table cellspacing="0" cellpadding="5"  border="1" bordercolor="#ccc" width="100%">
  <tr>
    <th scope="col">NAME</th>
    <th scope="col">CONTACT</th>	
    <th scope="col">EMAIL</th>
    <th scope="col">LOCATION</th>
<th scope="col">DATE</th>
  </tr>
  <tr>
    <td><?php echo $val['customer_name'];?></td>
    <td><?php echo $val['contact'];?></td>	
    <td><?php echo $val['email'];?></td>
    <td><?php echo $val['location'];?></td>
    <td style="color:red"><?php echo $val['time'];?></td>
  </tr>
  <tr><th>Instruction</th><td colspan="4"><?php echo $val['instruction'];?></td></tr>
</table>
</td></tr>
  <tr>
    <th scope="col">&nbsp;</th>
    <th scope="col">ITEM</th>
    <th scope="col">SIZE</th>
    <th scope="col">QTY</th>
    <th scope="col">PRICE</th>
	<th scope="col">TOTAL COST</th>
	
  </tr>
  <?php
  $sel=mysqli_query($conn,"SELECT * from ordered_item where order_details_id = '$id'");
  $total_cost=0;
  $total_qty=0;
  while($val=mysqli_fetch_assoc($sel)){
  $size=$val['item_size'];
  $qty=$val['quantity'];
  $price=$val['price'];
  $cost=$val['cost'];
  $total_cost+=$cost;//increment cost
  $total_qty+=$qty;
  $item_id=$val['item_id'];
  $selx=mysqli_query($conn,"SELECT * from item where item_id='$item_id'");
  $valx=mysqli_fetch_assoc($selx);
  $name=$valx['item_name'];
  ?>
  <tr>
    <td><?php
      $sl=mysqli_query($conn,"SELECT * from item_photo where item_id='$item_id'");
      $vl=mysqli_fetch_assoc($sl);
	  if($vl){
	  $photo=$vl['photo_name'];
	  }
      else{
	  $photo="default.png";
	  }
	echo "<img src='$site_name/images/products/$photo' height='100px'>";?></td>
    <td><?php echo $name; ?></td>
    <td><?php echo $size;?>
	</td>
    <td align="center"><?php echo $qty;?></td>
    <td><?php echo number_format($price);?></td>
	<td><?php echo number_format($cost);?></td>
	  </tr>
<?php
}//ends for loop
?>  
<tr>
<th colspan="3" align="center" style="border-top:1px solid #ccc">
TOTAL
</th>
<th align="center" style="border-top:1px solid #ccc;text-align:center">
<?php echo $total_qty; ?>
</th>
<th style="border-top:1px solid #ccc">&nbsp;</th>
<th align="center" style="border-top:1px solid #ccc"><?php echo number_format($total_cost); ?>/=</th></tr>
<tr>
<td style="border-top:1px solid #ccc;text-align:center" colspan="6" align="center">&nbsp;
</td>
</tr>
<tr>
<td colspan="6" align="center">
<?php if($status==0){ ?>
 <input type="button" onClick="updateOrder(<?php echo $id; ?>,'seen')" class="btn btn-primary" value="Mark as Seen" />  
<?php } ?>
 &nbsp;
 <?php if($status !=2){ ?>
 <input type="button" onClick="updateOrder(<?php echo $id; ?>,'clear')" class="btn btn-success" value="Clear order" />
 <?php } ?>
 &nbsp;
 <?php if($status !=2){ ?>
 <input type="button" onClick="updateOrder(<?php echo $id; ?>,'delete')" class="btn btn-danger" value="Delete" />
<?php } ?>
</td>
</tr>
</table>
<script type="text/javascript">
function updateOrder(id,cmd) {
	if(cmd=="seen"){
    var strconfirm = confirm("Are you sure you want to mark this order as seen?");
    if (strconfirm == true) {
       window.location.href = "?cmd=seenItm&order_id="+id;
    }
	}else if(cmd=="clear"){
    var strconfirm = confirm("Are you sure you want to mark this order as cleared. This means that you have confirmed the order.");
    if (strconfirm == true) {
       window.location.href = "?cmd=clearItm&order_id="+id;
    }
	}else if(cmd=="delete"){
    var strconfirm = confirm("Are you sure you want to delete this order. It will be parmanently removed from the system.");
    if (strconfirm == true) {
       window.location.href = "?cmd=deleteItm&order_id="+id;
    }
	}
}
</script>