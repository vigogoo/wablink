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
  header("Location:quick_view.php"."?cmTlOlpdsfH=".$hash);
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
  $ool=mysql_query("select * from item_photo where item_id='$item_id' ")or die(mysql_error());
    $voo=mysql_fetch_array($ool);
    
?>

<!DOCTYPE html>
<html lang="en"><meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons Icon -->
<link rel="icon" href="#" type="image/x-icon" />
<link rel="shortcut icon" href="#" type="image/x-icon" />
<title>Quick View - Just Deals Uganda</title>

<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS Style -->
<link rel="stylesheet" href="css/animate.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="css/owl.theme.css" type="text/css">
<link rel="stylesheet" href="css/flexslider.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="css/fancybox.css" type="text/css">
<link rel="stylesheet" href="css/jquery.cloudzoom.html" type="text/css">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,700,900' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="fancybox-overlay">
  <div id="fancybox-wrap">
    <div id="fancybox-outer">
      <div id="fancybox-content"> <a href="index.php"></a>
        <div>
          <div class="product-view">
            <div class="product-essential">
              <form action="#" method="post" id="product_addtocart_form">
                <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                <div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
                  <div class="product-image">
                    <div class="large-image"> <a href="images/products/<?php  echo $voo['photo_name']; ?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img src="images/products/<?php  echo $voo['photo_name']; ?>" alt="thumbnail"> </a> </div>
                    <div class="flexslider flexslider-thumb">
                      <ul class="previews-list slides">
                         <?php


 //echo $item_id;
 // exit();
$count=0;
                   $ssl=mysql_query("select * from item_photo where item_id='$item_id' ")or die(mysql_error());
                        while($vvl=mysql_fetch_array($ssl)){
                          $count++;

                          $photo=$vvl['photo_name'];


                         ?>
                        <li><a href='images/products/<?php  echo $photo; ?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'images/products/<?php  echo $photo; ?>' "><img src="images/products/<?php  echo $photo; ?>" alt = "Thumbnail 1"/></a></li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                  <div class="moreview-control"> <a href="javascript:void(0)" class="moreview-prev"></a> <a href="javascript:void(0)" class="moreview-next"></a> </div>
                </div>
                <div class="product-shop col-lg-6 col-sm-6 col-xs-12">
                  <div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div>
                  <?php $biz=mysql_query("select * from business where bid='$bid' ")or die(mysql_error());
    $_biz=mysql_fetch_array($biz);?>
                  <div class="product-name">
                    <h1><?php echo $vall['item_name']; ?> at <?php echo $_biz['business_name']; ?></h1>
                    <p style="color:#75787b; font-family: OpenSans,Helvetica Neue,Helvetica,Tahoma,Arial,FreeSans,sans-serif; font-size: 1.4rem; font-weight: 400; line-height: 1.5;"><?php echo $_biz['address']; ?></p>
                  </div>
                  <div class="ratings">
                    <div class="rating-box">
                      <div class="rating"></div>
                    </div>
                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> </p>
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
                          <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">UGX <?php echo $vall['old_price']; ?></span> </p><br>
                          <p class="special-price" style="color: #ff2552!important;"> <span class="price-label">Special Price</span> <span class="price">UGX <?php echo $vall['new_price']; ?></span> </p>
                        </div>
                      </div>
                  </div>
                </div>
      
              </div>
                  
                 <div class="short-description" style="border-top: 1px solid #ddd; padding: 10px 0;">
                    <h2 style="color: #75787b; !important; font-family: OpenSans,Helvetica Neue,Helvetica,Tahoma,Arial,FreeSans,sans-serif;" >Quick Overview</h2>
                    <p style="color:#75787b; font-family: OpenSans,Helvetica Neue,Helvetica,Tahoma,Arial,FreeSans,sans-serif; font-size: 1.4rem; font-weight: 400; line-height: 1.5;"><?php echo $vall['details']; ?></p>
                  </div>
                  <div class="add-to-box">
                    <div class="add-to-cart">
                     
                      <button onClick="add_to_cart(<?php echo $item_id; ?>)" class="button btn-cart" title="Add to Cart" type="button" ><span><i class="icon-basket"></i> Buy Now</span></button>
                      
                    </div>
                  </div>
                  <div class="social">
                   
                    <ul>

                      <li class="fb facebook-share"><a href="https://www.justcreativemedia.com/justdeals/product_detail.php?item_id=<?php echo $item_id; ?>"></a></li>
                      <li class="tw"><a href="#"></a></li>
                      
                    </ul>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!--product-view--> 
          
        </div>
      </div>
      <a id="fancybox-close" href="index.php"></a> </div>
  </div>
</div>
<!-- JavaScript --> 
<!-- JavaScript --> 
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/parallax.js"></script> 
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script> 
<script type="text/javascript" src="js/jquery.flexslider.js"></script> 
<script type="text/javascript" src="js/cloud-zoom.js"></script>
</body>

</html>
