<?php

session_start(); 
include("connect.php");
//session_destroy();
if(isset($_REQUEST['item_id'])){
if($_REQUEST['item_id']){
$item_id=$_REQUEST['item_id'];
$count=0;
$shopping_cart_items="";
if(isset($_SESSION['shopping_cart_items_count'])){
   $count=$_SESSION['shopping_cart_items_count'];
   $shopping_cart_items=$_SESSION['shopping_cart_items'];
}
}else{
	$_SESSION['shopping_cart_items_count']=0;
	$_SESSION['shopping_cart_items']=array();
	$shopping_cart_items=$_SESSION['shopping_cart_items'];
	$count=$_SESSION['shopping_cart_items_count'];
}
for($i=0;$i<$count;$i++){
	$id=$shopping_cart_items[$i][0];//current item id
	if($item_id==$id){
		$_SESSION['shopping_cart_items'][$i][1]++;
		//var_dump($_SESSION);
		//echo "Item Exists";  
		 include "cart.php";
		exit;
	}
}

$shopping_cart_items[$count][0]=$item_id;
$shopping_cart_items[$count][1]=1;
$count++;
$_SESSION['shopping_cart_items']=$shopping_cart_items;
$_SESSION['shopping_cart_items_count']=$count;
//var_dump($_SESSION);
 include "cart.php";
}else{
 include "cart.php";
}
?>