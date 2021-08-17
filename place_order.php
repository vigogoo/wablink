<?php
session_start();
include "connect.php";
include "security.php"; 
include "mail.php"; 
include "email_template.php";
if(isset($_REQUEST['name'],$_REQUEST['emailx'],$_REQUEST['contact'],$_REQUEST['address'],$_REQUEST['instructions'],$_REQUEST['customer_id'])){
	$emailx=$_REQUEST['emailx'];
$name=clean_data($_REQUEST['name']);

$contact=clean_data($_REQUEST['contact']);
$address=clean_data($_REQUEST['address']);
$instructions=clean_data($_REQUEST['instructions']);
$customer_id=clean_data($_REQUEST['customer_id']);


if(!$name || !$emailx || !$contact){
	echo "<p class='alert alert-danger'>Required Fields Missingx<p>";exit;
}

$count=$_SESSION['shopping_cart_items_count'];
$shopping_cart_items=$_SESSION['shopping_cart_items'];

if($count>0){
//var_dump($_REQUEST);
 mysql_query("insert into order_details set customer_id='$customer_id', contact='$contact',location='$address', email='$emailx', time=NOW(), status='0', instruction='$instructions' ")or die(mysql_error());
 $order_details_id=mysql_insert_id();//last inserted id
 $coupon_no="";

for($i=0;$i<$count;$i++){
  $id=$shopping_cart_items[$i][0];
  $qty=$shopping_cart_items[$i][1];

  $best=mysql_query("SELECT *from item i inner join item_size s on(i.item_id=s.item_id) where i.item_id='$id'") or die(mysql_error());
   $ray=mysql_fetch_array($best);
    $np=$ray['new_price'];
    $item_id=$ray['item_id'];
     $item_size=$ray['size'];
     $price=$np;
     $cost=$np*$qty;
     $item_id=$id;
     $bid=$ray['bid'];
     $expiry_date=$ray['expiry_date'];
     $coupon_no=clean_data(sha1($order_details_id));
     $coupon_no=strtoupper(substr($coupon_no, 0, 15));

mysql_query("insert into ordered_item set item_size='$item_size', price='$np',cost='$cost', item_id='$item_id',  quantity='$qty', order_details_id='$order_details_id' ")or die(mysql_error());

mysql_query("insert into coupons set coupon_no='$coupon_no',item_id='$item_id',bid='$bid',customer_id='$customer_id',expiry_date='$expiry_date' ")or die(mysql_error());


}

 $sl=mysql_query("SELECT * from setting where setting_name='email'") or die(mysql_error());
   $vl=mysql_fetch_array($sl);
   $support_email=$vl['setting_value'];
//reset shopping cart
$table="<tr><td>Coupon: </td><td>$coupon_no</td></tr>"."<tr><td>Name </td><td>$name</td></tr>"."<tr><td>Email </td><td>$emailx</td></tr>"."<tr><td>Contact </td><td>$contact</td></tr>";
$body="New Order By ".$name."<br/>Additional Instructions: ".$instructions."<hr/><br/><br/>";

$subject="Just Deals New Customer Order";

$msg=get_email_template($subject, $body, $table);
echo $msg;
//send email
$send=send_mail($emailx,$support_email,$subject,$msg);

$_SESSION['shopping_cart_items_count']=0;
$_SESSION['shopping_cart_items']="";
echo "<p class='alert alert-success'><strong>Coupon : $coupon_no </strong><br/> Your order has been placed successfully. <br/> We shall get back to you as soon as possible.<p>";exit;	

}else{
  echo "<p class='alert alert-danger'><strong>Shopping Cart is Empty</strong> Order was already sent!<p>";exit;	
}



}else{
	echo "<p class='alert alert-danger'>Required Fields Missing<p>";
}
?>