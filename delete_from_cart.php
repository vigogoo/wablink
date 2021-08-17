<?php

session_start(); 
include("connect.php");
//session_destroy();
if(isset($_REQUEST['item_id'])){
if($_REQUEST['item_id']){
$item_id=$_REQUEST['item_id'];
$count=0;
$shopping_cart_items="";
$new_counter=0;
$new_shopping_cart="";//new shopping cart
if(isset($_SESSION['shopping_cart_items_count'])){
   $count=$_SESSION['shopping_cart_items_count'];
   $shopping_cart_items=$_SESSION['shopping_cart_items'];
   $new_counter=$count;
}
}else{
	post_alert("Item Not Found", "warning");
}
$current_position=0;//determines the current position in new array
for($i=0;$i<$count;$i++){
	$id=$shopping_cart_items[$i][0];//current item id
	if($item_id==$id){
        //if current Item is the selected item do nothing(dont add it to new shopping cart)
        $new_counter--;//reduce the size of the array
	}else{
      $new_shopping_cart[$current_position][0]=$shopping_cart_items[$i][0];//add item id
      $new_shopping_cart[$current_position][1]=$shopping_cart_items[$i][1];//add item qty
      $current_position++;

    }
}

$_SESSION['shopping_cart_items']=$new_shopping_cart;
$_SESSION['shopping_cart_items_count']=$new_counter;
//var_dump($_SESSION);
post_alert("Item Removed From Cart", "success");
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