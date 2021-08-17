<?php
session_start(); 
//session_destroy();
include("connect.php");
?>

<div style="padding: 10px" id="id01">
<span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>

<?php

$search=$_REQUEST['search'];

search($search);

function search($valt){
  $delims = " ?&,;:-'";
  if(strlen($valt)<=2){
      $query="select * from item where (item_name like '$valt%' or item_name like '%$valt%' or item_name like '% $valt%' or item_name like '%$valt %')";  
  }else{
     //$query="select * from item i right outer join sub_category s on(i.sub_category_id=s.sub_category_id) right outer join category c on(c.category_id=s.category_id)";
     $query="select * from item i inner join sub_category s on(i.sub_category_id=s.sub_category_id) inner join category c on(c.category_id=s.category_id)";
   }
      $condition="";
      $string = strtok( $valt, $delims );
      while ( is_string( $string ) ) {
         if ( $string ) {
             //echo "$string<br/>";
		     if(strlen($string)>2){
		        if($condition==""){
		          $condition.=" where (item_name like '$string %' or item_name like '$string%' or item_name like '% $string%' or item_name like '% $string %' or sub_category_name like '$string %' or sub_category_name like '$string%' or sub_category_name like '% $string%' or sub_category_name like '% $string %' or category_name like '$string %' or category_name like '$string%' or category_name like '% $string%' or category_name like '% $string %'";
		        }else{
		     $condition.=" or item_name like '$string %' or item_name like '$string%' or item_name like '% $string%' or item_name like '% $string %' or sub_category_name like '$string %' or sub_category_name like '$string%' or sub_category_name like '% $string%' or sub_category_name like '% $string %' or category_name like '$string %' or category_name like '$string%' or category_name like '% $string%' or category_name like '% $string %'";
		      } 
		   }
         }
		           $string = strtok( $delims );
		  }
		  $condition.=")";
       $query.=$condition;
       $sel=mysql_query($query)or die('<img src="example_loading.gif" alt="Loading" /> Loading...');
       $_SESSION['sql_query']=$query;
       $_SESSION['last_query_id']=0;
	   $_SESSION['page_status']="search";
       $count=0;
	   $item_counter=0;
     while($val=mysql_fetch_array($sel)){
         $_SESSION['last_query_id']=$val['item_id'];
    	 $count++;
		if($count<10){
						//
		}else{
		  break;
		}
					$item_counter++;	

					$item_id=$val['item_id'];
						 $selp=mysql_query("select * from item_size where item_id='$val[item_id]' order by new_price asc") or die(mysql_error());
						 $valp=mysql_fetch_array($selp);


						 $selx=mysql_query("select * from item_photo where item_id='$val[item_id]' ")or die(mysql_error());
		$vlx=mysql_fetch_array($selx);
		$photo_name=$vlx['photo_name'];


		$np=$valp['new_price'];
		$op=$valp['old_price'];
		$percentChange = (1 - $np / $op) * 100; 

						?>
						<div  class='item product-thumb col-md-12' >
					<!--<div style="border:1px solid #e0e0e0; border-bottom: none" class='image best-deals'><a href='product_detail.php?item_id=<?php echo $val['item_id']?>'><img  data-original='images/products/<?php  echo str_replace(".","_thumb.",$photo_name); ?>' alt='<?php echo $val['item_name']; ?>' title='View details for\n<?php echo $val['item_name']; ?>' class='img-responsive lazy' /></a>
					
					</div>-->
						<div style="border:1px solid #e0e0e0; border-top: none; padding: 0 20px 10px 20px; text-align: left;" class='caption'>
							<div style="text-align: left;" class='name'><a title='View details for\n<?php echo $val['item_name']; ?>' href='product_detail.php?item_id=<?php echo $val['item_id']; ?>'><span style="font-size: medium; font-weight: normal; "> <?php echo $val['item_name']; ?></span></a>
							
							</div>	
											
													
						<div>
							<button style="font-size: 12px" type='button'  onClick='add_to_cart(<?php echo $item_id; ?>)' class='btn btn-success' ><i class='fa fa-shopping-cart'></i> Buy</button>
							
						</div>
							
						</div>
				</div>

<?php
    if($item_counter<3){
	    $_SESSION['item_counter']=$item_counter;
	}else{
		$item_counter=0;
		$_SESSION['item_counter']=$item_counter;
	}
 }
 if($count==0){
?>
 <div style="z-index: 1000;" class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <i class="mdi mdi-block-helper"></i>
                                                <strong>Sorry, No items matching your search please try again</strong>
                                            </div>

<?php
 }else{
?>
<div style="text-align: center; margin-top: 10px;margin-bottom:20px; float: left; width: 100%">
<hr />
	<a class="btn btn-primary" href="#">More Featured Item </a>
</div>

<?php
 }
}
?>
</div>
<script src="lazyload/jquery.lazyload.js"></script>
  <script type="text/javascript">
$("img.lazy").lazyload({
    effect : "fadeIn"
});
  </script>
  
  <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>