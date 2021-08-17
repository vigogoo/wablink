<?php
if(!isset($_SESSION))
session_start(); 
$count=0;
$shopping_cart_items="";
if(isset($_SESSION['shopping_cart_items_count'])){
   $count=$_SESSION['shopping_cart_items_count'];
   $shopping_cart_items=$_SESSION['shopping_cart_items'];
}else{

  $_SESSION['shopping_cart_items_count']=0;
  $_SESSION['shopping_cart_items']=array();
  $shopping_cart_items=$_SESSION['shopping_cart_items'];
  $count=$_SESSION['shopping_cart_items_count'];

}


?>
<div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> <a href="#"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <div class="cart-box"><span class="title">cart</span><span id="cart-total">
                <?php echo ($count==1)?"$count Item":"$count Items"; ?> 
                </span></div>
                </a></div>
              <div>
                <div class="top-cart-content arrow_box">
                  <div class="block-subtitle">MY SHOPPING CART</div>
                  <ul id="cart-sidebar" class="mini-products-list">
<?php
$total_pricecart=0;
for($i=0;$i<$count;$i++){
  $id=$shopping_cart_items[$i][0];
  $qty=$shopping_cart_items[$i][1];

  $bestxxx=mysql_query("SELECT *from item i inner join item_size s on(i.item_id=s.item_id) where i.item_id='$id'") or die(mysql_error());
   $rayxxx=mysql_fetch_array($bestxxx);
    $np=$rayxxx['new_price'];
    $item_idcart=$rayxxx['item_id'];
    $selcart=mysql_query("select * from item_photo where item_id='$item_idcart' ")or die(mysql_error());
    $vlcart=mysql_fetch_array($selcart);
    $cost=$np*$qty;
    $photo_namecart=$vlcart['photo_name'];
    $total_pricecart+=$cost;

?>
          <li class="item even"> 
      <a class="product-image" href="#" title="Product ">
<img style="max-width: 80px" src='images/products/<?php  echo str_replace(".","_thumb.",$photo_namecart); ?>' alt='<?php echo $rayxxx['item_name']; ?>' title='View details for\n<?php echo $rayxxx['item_name']; ?>' class='img-responsive' />
          </a>
                      <div class="detail-item">
                        <div class="product-details"> <a href="#" title="Remove This Item" onClick="delete_from_cart('<?php echo $item_idcart; ?>')" class="glyphicon "><i class="fa fa-times" aria-hidden="true"></i></a> 
                          <p class="product-name"> <a href="#" title="  Sample Product "><?php echo $rayxxx['item_name']; ?></a> </p>
                        </div>
                        <div class="product-details-bottom"> <span class="price">UGX <?php echo $cost; ?></span> <span class="title-desc">Qty:</span> <strong><?php echo $qty; ?></strong> </div>
                      </div>
                    </li>
<?php } ?>
                  </ul>
                  <div class="top-subtotal">Subtotal: <span class="price">UGX <?php echo $total_pricecart; ?></span></div>
                  <div class="actions">
                    <a href="checkout.php"><button class="btn-checkout" type="button"><span>Checkout</span></button></a>
                     <a href="shopping_cart.php"><button style="color: #fff" class="view-cart" type="button"><span>View Cart</span></button></a>
                  </div>
                </div>
              </div>


