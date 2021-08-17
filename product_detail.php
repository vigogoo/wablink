<?php
//session_start();
include("connect.php");
include("security.php");





if(isset($_REQUEST['item_id'])){
  $idm=$_REQUEST['item_id'];
  //$_SESSION['item_id']=$idm;
  $hash=sha1($idm);
mysql_query("update item set hash='$hash' where item_id='$idm'");
//echo $hash." ";
//exit();
  header("Location:product_detail.php"."?cmTlOlpdsfH=".$hash);
}


if(isset($_REQUEST['cmTlOlpdsfH'])){
$hash=$_REQUEST['cmTlOlpdsfH']; 
//echo $hash; exit();
$selx=mysql_query("SELECT * from item where hash='$hash'") or die(mysql_error());
 $valx=mysql_fetch_array($selx);
 $itm=$valx['item_id'];
//var_dump($_SESSION);
}



if(isset($itm)){
  $item_id=$itm;


}else{

  //header("Location:index.php");
  echo "<h1 style='color:red'>No Content Found";
  return;
}

$sell=mysql_query("SELECT * from item i inner join item_size s on(i.item_id=s.item_id)  Where i.item_id='$item_id'") or die(mysql_error());

if(mysql_num_rows($sell)<=0){
    header("Location:index.php");
}

 $vall=mysql_fetch_array($sell);
$category_id_related=$vall['category_id'];
$bid=$vall['bid'];
    
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
<title>Product Details</title>



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

<body  style="background-color: #fff">

  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="page" style="background-color: #fff"> 
  <!-- Header -->
  
<?php include "header.php"; ?>
 
<style type="text/css">
 .moreview_thumb{
  cursor: crosshair;
 } 
 .deal-page-title {
 
  letter-spacing: -1px;
  line-height: 42px;
 
    color: #75787b;
  font-size: 16px;
  font-weight: light;
  line-height: 23px;
  max-width: 540px;
  font-family: OpenSans,Helvetica Neue,Helvetica,Tahoma,Arial,FreeSans,sans-serif;
}

.deal-page-title.small-title {
  font-size: 24px;
}

</style>

  <section class="main-container col1-layout" style="background-color: #fff">
    <div class="main container">
      <div class="col-main">
        <div class="row">
         
          <div class="product-view">
            <div class="product-essential">
              <!--<div class="product-name">
                    <h1 class="deal-page-title small-title" ><?php echo $val['item_name']; ?></h1>
                  </div>-->
              <form action="#" method="post" id="product_addtocart_form">
              
                <div class="product-img-box col-lg-6 col-sm-6 col-xs-12" style="padding-right: 20px; border-right: 1px solid #e6e7e8; margin-right: 0;">

                  <ul class="moreview" id="moreview">
                  <?php


 //echo $item_id;
 // exit();
$count=0;
                   $ssl=mysql_query("select * from item_photo where item_id='$item_id' ")or die(mysql_error());
                        while($vvl=mysql_fetch_array($ssl)){
                          $count++;

                          $photo=$vvl['photo_name'];


                         ?>
                    <li class="moreview_thumb thumb_<?php echo $count; ?>">
                    <img class="moreview_thumb_image" src="images/products/<?php  echo $photo; ?>" alt="thumbnail"> <img class="moreview_source_image" src="images/products/<?php  echo $photo; ?>" alt="" > <span class="roll-over"></span> <img  class="zoomImg" src="images/products/<?php  echo $photo; ?>" alt="thumbnail">
                  </li>
                    <?php } ?>
                  </ul>
                  <div class="moreview-control"> <a href="javascript:void(0)" class="moreview-prev"></a> <a href="javascript:void(0)" class="moreview-next"></a> </div>
                </div>
               <?php $biz=mysql_query("select * from business where bid='$bid' ")or die(mysql_error());
    $_biz=mysql_fetch_array($biz);?>
                <div  style="padding-bottom: 40px; padding-top: 20px; height:542.873px;" class="product-shop col-lg-6 col-sm-6 col-xs-12">
                  <div class="product-next-prev"> </div>
                   <div class="product-name">
                    <h1 class="deal-page-title small-title" ><?php echo $vall['item_name']; ?> at <?php echo $_biz['business_name']; ?></h1>
                    <p style="color:#75787b; font-family: OpenSans,Helvetica Neue,Helvetica,Tahoma,Arial,FreeSans,sans-serif; font-size: 1.4rem; font-weight: 400; line-height: 1.5;"><?php echo $_biz['address']; ?></p>
                  </div>
                 <p class="availability in-stock">Availability: <span>In stock</span></p>

              <div class="t-pod row deal-highlights c-txt-gray-dk has-tiles  position-top" data-bhw="DealHighlights" style="border-top: 1px solid #ddd; padding: 10px 0; font-size: 14px; margin-left: 0px !important;">
      
                <div class="four  columns" data-bhc="tile:ums-api-static" >
                                           
                  <div class="text" style="color: #ff2552!important;">
                    Sale Ends <br>
                    <?php include 'test.php'; ?>
                  </div>
                </div>
                

                <div class="four  columns" data-bhc="tile:ums-api-dailyViews" >
                                                    
                  <div class="text" >
                    100+ viewed<br> today
                  </div>
                </div>
                    

                <div class="four  columns" data-bhc="tile:social_proof" >
                                              
                  <div class="text"  >
                    <div class="ratings">
                      <p class="rating-links"> <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ratings</a></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="rating-box">
                      <div class="rating"></div>
                    </div>
                    
                  </div>
                  </div>
                </div>
      
              </div>

              <div class="t-pod row deal-highlights c-txt-gray-dk has-tiles  position-top" data-bhw="DealHighlights" style="border-top: 1px solid #ddd; padding: 10px 0; font-size: 14px; margin-left: 0px !important;">
      
                <div class="four  columns" data-bhc="tile:ums-api-static" >
                                           
                  <div class="text" style="color: #ff2552!important;">
                     <div class="percent">
                      <span>
                      Up to <?php  
                      $percentChange = (1 - $vall['new_price']/ $vall['old_price']) * 100; 
                      echo number_format($percentChange, 0);
                      ?>% off
                      </span>
                    </div>
                  </div>
                </div>
                

                <div class="four  columns" data-bhc="tile:ums-api-dailyViews" >
                                                    
                  <div class="text" >
                    
                  </div>
                </div>
                

                <div class="four  columns" data-bhc="tile:social_proof" >
                                              
                  <div class="text" style="color: #ff2552!important;" >
                     <div class="price-block">
                        <div class="price-box">
                          <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">UGX <?php echo number_format($vall['old_price']); ?></span> </p><br>
                          <p class="special-price" style="color: #ff2552!important;"> <span class="price-label">Special Price</span> <span class="price">UGX <?php echo number_format($vall['new_price']); ?></span> </p>
                        </div>
                      </div>
                  </div>
                </div>
      
              </div>
                  
                  <!--<div class="percent" style="border-top: 1px solid #ddd; padding: 10px 0;">
<span>
<?php  
$percentChange = (1 - $val['new_price']/ $val['old_price']) * 100; 
echo number_format($percentChange, 0);
?>% off
</span>
</div>
                  <div class="price-block">
                    <div class="price-box">
                      <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">UGX <?php echo $val['old_price']; ?></span> </p><br>
                      <p class="special-price"> <span class="price-label">Special Price</span> <span class="price">UGX <?php echo $val['new_price']; ?></span> </p>
                    </div>
                  </div>-->
                  <div class="short-description" style="border-top: 1px solid #ddd; padding: 10px 0;">
                    <h2 style="color: #75787b; !important; font-family: OpenSans,Helvetica Neue,Helvetica,Tahoma,Arial,FreeSans,sans-serif;" >Quick Overview</h2>
                    <p style="color:#75787b; font-family: OpenSans,Helvetica Neue,Helvetica,Tahoma,Arial,FreeSans,sans-serif; font-size: 1.4rem; font-weight: 400; line-height: 1.5;"><?php echo $vall['details']; ?></p>
                  </div>
                  <div class="add-to-box">
                    <div class="add-to-cart">
                      <!--<label for="qty">Quantity:</label>
                      <div class="pull-left">
                        <div class="custom pull-left">
                          <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                          <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                          <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                        </div>
                      </div>-->
                       <a href="checkout.php" onClick="add_to_cart(<?php echo $item_id; ?>)" class="button btn-cart" title="Add to Cart" type="button" ><span><i class="icon-basket"></i> Buy Now</span></a>
                      
                    </div>
                  </div>
                  <!--<div class="social">
                    <!--<div class="fb-share-button" data-href="http://www.justcreativemedia.com/justdeals/product_detail.php?item_id=<?php echo $item_id; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>-->
                    <!--<ul>

                      <li class="fb facebook-share"><a href="https://www.justcreativemedia.com/justdeals/product_detail.php?item_id=<?php echo $item_id; ?>"></a></li>
                      <li class="tw"><a href="#"></a></li>
                      
                    </ul>
                  </div>-->
                </div>
              </form>
            </div>
            <div class="product-collateral">
              <div class="col-sm-12 wow bounceInUp animated">
                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                  <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Product Description </a> </li>
                  
                </ul>
                <div id="productTabContent" class="tab-content">
                  <div class="tab-pane fade in active" id="product_tabs_description">
                    <div class="std">
                      <p><?php echo $vall['item_desc']; ?></p>
                    </div>
                  </div>
                  
                  <div class="tab-pane fade" id="product_tabs_custom">
                    <div class="product-tabs-content-inner clearfix">
                      <p><strong></strong><span>&nbsp;is
                       </span></p>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="product_tabs_custom1">
                    <div class="product-tabs-content-inner clearfix">
                      <p> <strong> </strong><span></span></p>
                    </div>
                  </div>
                </div>
              </div>




            <div class="product-collateral" style="margin-bottom: 20px">
            
              <div class="col-sm-12">
                <div class="box-additional">
                  <div class="related-pro wow animated">
                    <div class="slider-items-products">
                      <div class="new_title center">
                        <h2>Similar Deals <?php //echo $category_id_related; ?></h2>
                      </div>
                      <div id="related-products-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4"> 


    <?php
    
    $bestrelated=mysql_query("SELECT *from item i inner join item_size s on(i.item_id=s.item_id) where expiry_date > CURDATE() && i.category_id='$category_id_related' && i.item_id!='$item_id' limit 12") or die(mysql_error());
    while($rayrelated=mysql_fetch_array($bestrelated)){
    $nprelated=$rayrelated['new_price'];
    $oprelated=$rayrelated['old_price'];
    $item_idrelated=$rayrelated['item_id'];
$biz=mysql_query("select * from business where bid='$bid' ")or die(mysql_error());
    $_biz=mysql_fetch_array($biz);
    $selrelated=mysql_query("select * from item_photo where item_id='$item_idrelated' ")or die(mysql_error());
    $vlrelated=mysql_fetch_array($selrelated);
    $photo_namerelated=$vlrelated['photo_name'];
    $percentChange = (1 - $nprelated / $oprelated) * 100; 

      ?>


                          
                          <!-- Item -->
                          <div class="item">
                            <div class="col-item">
                              <div class="sale-label sale-top-right">-<?php echo round($percentChange,0); ?>%</div>
                              <div class="product-image-area"> <a class="product-image"  href="product_detail.php?item_id=<?php echo $rayrelated['item_id']; ?>"> <img src="images/products/<?php  echo str_replace(".","_thumb.",$photo_namerelated); ?>" class="img-responsive" alt="a" /> </a>
                                <div class="hover_fly"> 
                        <a class="exclusive ajax_add_to_cart_button" href="checkout.php" onClick='add_to_cart(<?php echo $rayrelated['item_id']; ?>)' title="Buy Deal">
                        <div><i class="fa fa-dollar"></i><span>Buy</span></div>
                        </a> <a class="quick-view" href="#" onClick='add_to_cart(<?php echo $item_idrelated; ?>)' title="Add to cart">
                        <div><i class="icon-shopping-cart"></i><span>Add To Cart</span></div>
                                  </a>  </div>
                              </div>
                              <div class="info">
                                <div class="info-inner">
                                  <div class="item-title"> <a href="product_detail.php?item_id=<?php echo $rayrelated['item_id']; ?>" > <?php echo $rayrelated['item_name']; ?> </a>
<p><span class='one-line-truncate' style="text-overflow:ellipsis;display: block; height:18px; font-size: 13px; font-weight: 400; line-height: 18px; overflow; white-space: nowrap; max-height: 18px; margin-bottom: 8px; color: #75787b !important;"><?php echo $_biz['business_name']; ?></span></p>

 </div>
<div class="item-titlex"> 
                          <p><span class='one-line-truncate' style="text-overflow:ellipsis;display: block; height:18px; font-size: 13px; font-weight: 400; line-height: 18px; overflow; white-space: nowrap; max-height: 18px; margin-bottom: 8px; color: #75787b !important;"><?php echo $_biz['address']; ?></span></p>
                        </div>
                                  <!--item-title-->
                                  <div class="item-content">
                                    <div class="ratings">
                                      <div class="rating-box">
                                        <div class="rating"></div>
                                      </div>
                                    </div>
                                    <div class="price-box">
                                     
                                      <p class="old-price"> <span class="price-sep">-</span> <span  class="price">UGX<?php echo number_format($rayrelated['old_price']); ?></span> </p>
                                       <p class="special-price"> <span  class="price">UGX<?php echo number_format($rayrelated['new_price']); ?></span> </p>
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
                          
<?php } ?>
                          
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
<script type="text/javascript" src="jsx/jquery.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/parallax.js"></script> 
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script> 
<script type="text/javascript" src="js/cloudzoom.js"></script> 
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
</body>
</html>