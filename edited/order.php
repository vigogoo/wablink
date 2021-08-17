<?php
session_start();

include'connect.php';
$id=$_POST['id'];

$sql="SELECT *from cart c inner join item_size s on (c.item_size_id=s.item_size_id) where c.cart_id='$id'";
$results=mysql_query($sql) or die (mysql_error());
while($row=mysql_fetch_array($results)){
	$_SESSION['name']=$row['item_name'];
	$_SESSION['price']=$row['new_price'];
	$_SESSION['size']=$row['item_size'];
	$_SESSION['sub']=$row['unitP'];
	 $_SESSION['px']=$row['Qty'];
	  
	  
	//$row['item_name'];
}
	$testing_Cart="select * from ordered_item where cart_id='$id'";
	$Tested=mysql_query($testing_Cart);
	$num=mysql_num_rows($Tested);
		
		if($num==0){
			
	$order="insert into ordered_item(item_size,price,cost,quantity)values('$_SESSION[size]','$_SESSION[price]',1,'$_SESSION[price]','$_SESSION[sub]','$_SESSION[px]')";
	mysql_query($order);
		}
	
?>