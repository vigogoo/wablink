<?php
session_start();

include'connect.php';


			$id=$_POST['id'];

$sql="SELECT *from item i inner join item_size s on(i.item_id=s.item_id) inner join item_photo p on(i.item_id=p.item_id)  where  p.item_id='$id'";
$results=mysql_query($sql) or die (mysql_error());
while($row=mysql_fetch_array($results)){
	$_SESSION['name']=$row['item_name'];
	 $_SESSION['px']=$row['new_price'];
	  $_SESSION['photo']=$row['photo_name'];
	   $_SESSION['SubCategory']=$row['sub_category_id'];
	   $_SESSION['item_size_id']=$row['item_size_id'];
	 
	//$row['item_name'];
}
						
							 echo' 
								<div class="col-item">
								  
								  <div class="product-image-area"> <a class="product-image" title="Sample Product" href="product_detail.php"> <img alt="a" class="img-responsive" 					                                     src="../products-images/ "> </a>
									<div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
									  <div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
									  </a> <a class="quick-view" href="quick_view.php">
									  <div><i class="icon-eye-open"></i><span>Quick view</span></div>
									  </a> <a class="add_to_compare" href="compare.php">
									  <div><i class="icon-random"></i><span>Add to compare</span></div>
									  </a> <a class="addToWishlist wishlistProd_5" href="wishlist.php" >
									  <div><i class="icon-heart"></i><span>Add to Wishlist</span></div>
									  </a> </div>
								  </div>
								  <div class="info">
									<div class="info-inner">
									  <div class="item-title"> <a title=" Sample Product" href="product_detail.php"> <?php echo $_SESSION["photo"];?></a> </div>
									  <!--item-title-->
									  <div class="item-content">
										<div class="ratings">
										  <div class="rating-box">
											<div class="rating" style="width:60%"></div>
										  </div>
										</div>
										<div class="price-box">
										  <p class="special-price"> <span class="price" id="product-price-902"> <?php echo  $_SESSION["px"];?> </span> </p>
										  <p class="old-price"> <span class="price-sep">-</span> <span class="price" id="old-price-902"> $50.00 </span> </p>
										</div>
									  </div>
									  <!--item-content--> 
									</div>
									<!--info-inner-->
									
									<div class="clearfix"> </div>
								  </div>
								</div>
							  
			
			';
            ?>