<?php
session_start(); 
include("connect.php");
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
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Just deals Uganda</title>


<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS Style -->
<link rel="stylesheet" href="css/animate.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="css/owl.theme.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,300,700,800,400,600' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="page" style="background-color: #f0f0f0;"> 
  <!-- Header -->
 <?php include "header.php"; ?>
  <section class="main-container col1-layout" style="background-color: #f0f0f0">
    <div class="main container">
      <div class="col-main">
        <div class="cart wow animated">
          <div class="page-title">
            <h2 style="color: #666; padding-top: 40px">Shopping Cart</h2>
          </div>
          <div class="table-responsive">
           
              <fieldset>
                <table class="data-table cart-table" id="shopping-cart-table">
                  <thead>
                    <tr class="first last">
                      <th rowspan="1">&nbsp;</th>
                      <th rowspan="1"><span class="nobr">Product Name</span></th>
                   
                      <th colspan="1" class="a-center"><span class="nobr">Unit Price</span></th>
                      <th class="a-center" rowspan="1">Qty</th>
                      <th colspan="1" class="a-center">Subtotal</th>
                      <th class="a-center" rowspan="1">&nbsp;</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="first last">
                      <td class="a-right last" colspan="7"><button onClick="setLocation('#')" class="button btn-continue" title="Continue Shopping" type="button"><span><span>Continue Shopping</span></span></button>
                        <button class="button btn-update" title="Update Cart" value="update_qty" name="update_cart_action" type="submit"><span><span>Update Cart</span></span></button>
                        <button id="empty_cart_button" class="button btn-empty" title="Clear Cart" value="empty_cart" name="update_cart_action" type="submit"><span><span>Clear Cart</span></span></button></td>
                    </tr>
                  </tfoot>
                  <tbody>
               <?php
$total_price=0;
for($i=0;$i<$count;$i++){
  $id=$shopping_cart_items[$i][0];
  $qty=$shopping_cart_items[$i][1];

  $best=mysql_query("SELECT *from item i inner join item_size s on(i.item_id=s.item_id) where i.item_id='$id'") or die(mysql_error());
   $ray=mysql_fetch_array($best);
    $np=$ray['new_price'];
    $item_id=$ray['item_id'];
    $sel=mysql_query("select * from item_photo where item_id='$item_id' ")or die(mysql_error());
    $vl=mysql_fetch_array($sel);
    $cost=$np*$qty;
    $photo_name=$vl['photo_name'];
    $total_price+=$cost;

?>
   <tr class="last even">
                      <td class="image"><a class="product-image"  href="#">
<img style="max-width: 80px" src='images/products/<?php  echo str_replace(".","_thumb.",$photo_name); ?>' alt='<?php echo $ray['item_name']; ?>' title='View details for\n<?php echo $ray['item_name']; ?>' class='img-responsive' />
                      </a></td>
                      <td><h2 class="product-name"> <a href="#women-s-u-tank-top/"><?php echo $ray['item_name']; ?></a> </h2></td>
                      
                      <td class="a-right"><span class="cart-price"> <span class="price">UGX <?php echo $np; ?></span> </span></td>
            <td class="a-center movewishlist">
            <input style="color: #333; background-color: #f0f0f0" maxlength="12" class="input-text qty" title="Qty" size="4" value="<?php echo $qty; ?>" name="cart[15946][qty]"></td>
             <td class="a-right movewishlist"><span class="cart-price"> <span class="price">UGX<?php echo $cost; ?></span> </span></td>
                      <td class="a-center last"><a class="button remove-item" title="Remove item" href="#"></a></td>
    </tr>

  <?php } ?>
                  </tbody>
                </table>
              </fieldset>
       
          </div>
        </div>

        <!-- BEGIN CART COLLATERALS -->
        <div class="cart-collaterals row  wow">
          <div class="col-sm-4">
            <div class="shipping">
            
            
            </div>
          </div>
          <div class="col-sm-4">
            <div class="discount">
              
            </div>
          </div>
          <div style="background-color: #fff; padding-top: 20px" class="col-sm-4">
            <div class="totals">
              <h3>Shopping Cart Total</h3>
              <div class="inner">
                <table id="shopping-cart-totals-table" class="table shopping-cart-table-total">
                  <colgroup>
                  <col>
                  <col width="1">
                  </colgroup>
                  <tfoot>
                    <tr>
                      <td class="a-left" colspan="1"><strong>Grand Total</strong></td>
                      <td class="a-right"><strong><span class="price">UGX <?php echo $total_price; ?></span></strong></td>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td class="a-left" colspan="1"> Subtotal </td>
                      <td class="a-right"><span class="price">UGX <?php echo $total_price; ?></span></td>
                    </tr>
                  </tbody>
                </table>
                <ul class="checkout">
                  <li>
                <a style="text-transform: uppercase; font-size: x-large; text-decoration: none; color: #f9f9f9"  title="Proceed to Checkout" class="btn btn-warning" href="checkout.php"><span><i class="fa fa-check"></i>Proceed to Checkout</span></a>
                  </li>
              
                  
                  <br>
                </ul>
              </div>
              <!--inner--> 
            </div>
            <!--totals--> 
          </div>
          <!--cart-collaterals--> 
          
        </div>


            <div class="product-collateral" style="margin-bottom: 20px; background-color: #fff; padding-top: 30px">
            
              <div class="col-sm-12">
                <div class="box-additional">
                  <div class="related-pro wow animated">
                    <div class="slider-items-products">
                      <div class="new_title center">
                        <h2>Related Products</h2>
                      </div>
                      <div id="related-products-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4"> 


    <?php
    for($i=0;$i<6;$i++){
    $best=mysql_query("SELECT *from item i inner join item_size s on(i.item_id=s.item_id) ") or die(mysql_error());
    while($ray=mysql_fetch_array($best)){
    $np=$ray['new_price'];
    $op=$ray['old_price'];
    $item_id=$ray['item_id'];
    $sel=mysql_query("select * from item_photo where item_id='$item_id' ")or die(mysql_error());
    $vl=mysql_fetch_array($sel);
    $photo_name=$vl['photo_name'];
    $percentChange = (1 - $np / $op) * 100; 

      ?>


                          
                          <!-- Item -->
                          <div class="item">
                            <div class="col-item">
                              
                              <div class="product-image-area"> <a class="product-image"  href="product_detail.php?item_id=<?php echo $ray['item_id']; ?>"> <img src="images/products/<?php  echo str_replace(".","_thumb.",$photo_name); ?>" class="img-responsive" alt="a" /> </a>
                                <div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
                                  <div><i class="icon-shopping-cart"></i><span>Add to cart</span></div>
                                  </a>  </div>
                              </div>
                              <div class="info">
                                <div class="info-inner">
                                  <div class="item-title"> <a href="product_detail.php?item_id=<?php echo $ray['item_id']; ?>" > <?php echo $ray['item_name']; ?> </a> </div>
                                  <!--item-title-->
                                  <div class="item-content">
                                    <div class="ratings">
                                      <div class="rating-box">
                                        <div class="rating"></div>
                                      </div>
                                    </div>
                                    <div class="price-box">
                                      <p class="special-price"> <span style="text-decoration: line-through;" class="price">UGX<?php echo $ray['old_price']; ?></span> </p>
                                      <p class="old-price"> <span class="price-sep">-</span> <span class="price">UGX<?php echo $ray['new_price']; ?></span> </p>
                                    </div>
                                  </div>
                                  <!--item-content--> 
                                </div>
                                <!--info-inner-->
                                
                                <div class="clearfix"> </div>
                              </div>
                            </div>
                          </div>
                          <!-- End Item --> 
                          
<?php }} ?>
                          
                        </div>
                      </div>
                    </div>
                  </div>


                </div>
              </div>
            </div>
      </div>
    </div>
  </section>
  

  <?php include "footer.php"; ?>
  <!-- End Footer --> 
</div>

<!-- JavaScript --> 
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/parallax.js"></script> 
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
</body>

</html>