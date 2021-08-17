<?php
session_start();
include("connect.php");

$last_item= $_SESSION['last_item_id']; //this keeps track of the last item that was picked from the database
$item_counter=0;
		$bes=mysql_query("SELECT *from item i inner join item_size s on(i.item_id=s.item_id)  where i.item_id > $last_item order by i.item_id asc limit 8") or die(mysql_error());
		while($ra=mysql_fetch_array($bes)){
		$np=$ra['new_price'];
		$op=$ra['old_price'];
		$item_id=$ra['item_id'];
		$zel=mysql_query("select * from item_photo where item_id='$item_id' ")or die(mysql_error());
		$zvl=mysql_fetch_array($zel);
		$photo_name=$zvl['photo_name'];
		$percentChange = (1 - $np / $op) * 100; 
         $_SESSION['last_item_id'] = $ra['item_id'];
         $item_counter++;
			?>
<div  class='item product-thumb col-md-3'>
					<div style="border:1px solid #e0e0e0; border-bottom: none" class='image best-deals'><a href='product_detail.php?item_id=<?php echo $ra['item_id']?>'><img  data-original='images/products/<?php	 echo str_replace(".","_thumb.",$photo_name); ?>' alt='<?php echo $ra['item_name']; ?>' title='View details for\n<?php echo $ra['item_name']; ?>' class='img-responsive lazy' /></a>
					
					</div>
						<div style="border:1px solid #e0e0e0; border-top: none; padding-top: 0px; padding-bottom: 10px" class='caption'>
							<div style="text-align: center" class='name'><a title='View details for\n<?php echo $photo_name; ?>' href='product_detail.php?item_id=<?php echo $ra['item_id']; ?>'><span style="font-size: x-large; font-weight: normal;"> <?php echo $ra['item_name']; ?></span></a>
							<p><span class='price-new'> <?php //echo $ra['size']; ?></span></p>
							</div>	
											<div class='percent'>
							<span><?php echo round($percentChange,0); ?>%</span>
							</div>
													<p class='prices'>
														<span class='price-old'>UGX<?php echo $ra['old_price']; ?></span> <br><span class='price-new' style="float:right">UGX<?php echo $ra['new_price']; ?></span>
														  
							</p>
						<div style="text-align: right;">
							<button style="font-size: 12px" type='button'  onClick='add_to_cart(<?php echo $item_id; ?>)' class='btn btn-success' ><i class='fa fa-shopping-cart'></i> ADD TO CART</button>
							
						</div>
							
						</div>
				</div>
<?php } ?>

<?php
if($item_counter>0){
?>
<div style="text-align: center;"><a class="jscroll-next btn btn-success" href="item_loader.php">More Product</a></div>
<?php } ?>


<script src="lazyload/jquery.lazyload.js"></script>
  <script type="text/javascript">
$("img.lazy").lazyload({
    effect : "fadeIn"
});
  </script>