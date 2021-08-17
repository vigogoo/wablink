<?php
session_start();
include("connect.php");
include("security.php");
if(isset($_REQUEST['item_id'])){
  $_SESSION['item_id']=$_REQUEST['item_id'];
  header("Location:product_detail.php");
}
if(isset($_SESSION['item_id'])){
  $item_id=$_SESSION['item_id'];

}else{
  echo "<h1 style='color:red'>No Content Found";
  return;
}

$sel=mysql_query("SELECT *from item i inner join item_size s on(i.item_id=s.item_id)  Where i.item_id='$item_id'") or die(mysql_error());
 $val=mysql_fetch_array($sel);

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
<link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,300,700,800,400,600' rel='stylesheet' type='text/css'>
</head>

<body  style="background-color: #f0f0f0">
<div class="page" style="background-color: #f0f0f0"> 
  <!-- Header -->
  
<?php include "header.php"; ?>
 
<style type="text/css">
 .moreview_thumb{
  cursor: crosshair;
 } 

</style>

  <section class="main-container col1-layout" style="background-color: #f0f0f0">
    <div class="main container">
      <div class="col-main">
        <div class="row">
          <div class="product-view">
            <div class="product-essential">
              <form action="#" method="post" id="product_addtocart_form">
              
                <div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
                  <ul class="moreview" id="moreview">
                  <?php $sl=mysql_query("select * from item_photo where item_id='$item_id' ")or die(mysql_error());
                        while($vl=mysql_fetch_array($sl)){

                          $photo_name=$vl['photo_name'];

                         ?>
                    <li class="moreview_thumb thumb_1">
                    <img class="moreview_source_image" src="images/products/<?php  echo $photo_name; ?>" alt=""> <span class="roll-over">Roll over image to zoom in</span> </li>
                    <?php } ?>
                  </ul>
                  <div class="moreview-control"> <a href="javascript:void(0)" class="moreview-prev"></a> <a href="javascript:void(0)" class="moreview-next"></a> </div>
                </div>
                <div  style="padding-bottom: 40px; padding-top: 20px; height:542.873px;" class="product-shop col-lg-6 col-sm-6 col-xs-12">
                  <div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div>
                  <div class="product-name">
                    <p style="color: #666; text-transform: uppercase; font-size: xx-large;"><?php echo $val['item_name']; ?></p>
                  </div>
                  <div class="ratings">
                    <div class="rating-box">
                      <div class="rating"></div>
                    </div>
                    <p class="rating-links"> <a href="#">1 Review(s)</a>  </p>
                  </div>
                  <p style="background-color: yellow; margin:40px" class="availability in-stock">Availability: <span>In stock</span></p>
                  <div class="price-block">
                    <div class="price-box">
                      <p class="old-price"><spa style="font-size: medium; text-decoration: line-through;" class="price">UGX <?php echo $val['old_price']; ?></span> </p>
                      <p style="padding-left: 20px" class="special-price">  <span style="font-size: large; color: green" class="price">UGX <?php echo $val['new_price']; ?></span> </p>
                    </div>
                  </div>
                  <div class="short-description">
                    <h2>Description</h2>
                    <p style="text-align: justify;"><?php echo $val['details']; ?></p>
                  </div>
                  
                    <div style="text-align: center; margin-top: 60px" >
                     
                      <button onClick="add_to_cart(<?php echo $item_id; ?>)" class="btn btn-success" title="Add to Cart" type="button"><i class='fa fa-shopping-cart'></i> ADD TO CART</button>
                     
                  </div>
              
                </div>
              </form>
            </div>




            <div class="product-collateral" style="margin-bottom: 20px">
            
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
                                <div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" onClick="add_to_cart(<?php echo $item_id; ?>)" title="Add to cart">
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
      </div>
    </div>
  </section>
  <!--End main-container --> 
  <!--Footer -->
 <?php include "footer.php"; ?>
  <!-- End Footer --> 
</div>

<!-- JavaScript --> 
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/parallax.js"></script> 
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script> 
<script type="text/javascript" src="js/cloudzoom.js"></script> 
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
</body>
</html>