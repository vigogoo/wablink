<?php
session_start();

include'connect.php';
$id=$_POST['id'];

$sql="SELECT *from item i inner join item_size s on(i.item_id=s.item_id) inner join item_photo p on(i.item_id=p.item_id)  where  p.item_id='$id'";
$results=mysql_query($sql);
while($row=mysql_fetch_array($results)){
	$_SESSION['name']=$row['item_name'];
	 $_SESSION['px']=$row['new_price'];
	  $_SESSION['photo']=$row['photo_name'];
	   $_SESSION['SubCategory']=$row['sub_category_id'];
	 
	//$row['item_name'];
}
	$testing_Cart="select * from cart where Item_id='$id'";
	$Tested=mysql_query($testing_Cart);
	$num=mysql_num_rows($Tested);
		if($num==1){
			
		$uppx="update cart set Qty=Qty+1, UnitP=UnitP+'$_SESSION[px]' where Item_id='$id'";
			mysql_query($uppx);	
			
		}
		if($num==0){
			
	$cart="insert into cart(item_name,unitP,Qty,ItemPhoto,Item_id,SubCategory)values('$_SESSION[name]','$_SESSION[px]',1,'$_SESSION[photo]','$id','$_SESSION[SubCategory]')";
	mysql_query($cart);
		}
			

	
		
	
	


	
?>