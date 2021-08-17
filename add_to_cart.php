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
		post_alert("Item Added To Cart", "success"); 
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
post_alert("Item Added To Cart", "success");
 include "cart.php";
}else{
 include "cart.php";
}
?>


<?php
function post_alert($msg, $type){

if($type=="success"){
?>

  <div  style="position: fixed; top:100px; right:10px; z-index: 1000;" class="alert alert-icon alert-success alert-dismissible fade in message_alert" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <i class="fa fa-check"></i>
                                                <strong><?php echo $msg; ?></strong> 
</div>

<?php }elseif($type=="info"){ ?>

<div style="position: fixed; top:100px; right:10px;; z-index: 1000;" class="alert alert-icon alert-info alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <i class="mdi mdi-information"></i>
                                                <strong><?php echo $msg; ?></strong> 
                                            </div>


<?php }elseif($type=="warning"){ ?>

<div style="position: fixed; top:100px; right:10px;z-index: 1000;" class="alert alert-icon alert-warning alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <i class="mdi mdi-alert"></i>
                                                <strong><?php echo $msg; ?></strong>
                                            </div>

<?php }elseif($type=="error"){ ?>


 <div style="position: fixed; top:100px; right:10px; z-index: 1000;" class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <i class="mdi mdi-block-helper"></i>
                                                <strong><?php echo $msg; ?></strong>
                                            </div>


<?php 
 } 
} 
?>

<script type="text/javascript">
      $(".alert").fadeOut(7000, function() { 
        $(this).remove(); 
    }); 
</script>