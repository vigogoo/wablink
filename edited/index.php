<?php
session_start(); 
//session_destroy();
include("connect.php");

$_SESSION['page']="home";


?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<script src="js/js/jquery-2.1.1.min.js" type="text/javascript"></script>

<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Just Deals Uganda</title>

<!-- Favicons Icon -->



<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--start new css-->

<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet" media="screen" />
<script src="js/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.smoothscroll.js"></script>
<script src="js/jquery.jgrowl.js" type="text/javascript"></script>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Lato:400,700,300' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="css/bt_stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/responsive.css" />



<!--end new css-->

<!-- CSS Style -->
<link rel="stylesheet" href="css/animate.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/revslider.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="css/owl.theme.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,300,700,800,400,600' rel='stylesheet' type='text/css'>
<style>
.grow img {

 
  transition: all .2s ease-in-out;
}
 
.grow img:hover {
 transform: scale(1.1);
}

body{
	overflow-x: hidden;
}
</style>

</head>

<body>
<div class="page" style="background-color: #f0f0f0"> 


<?php include "header.php"; ?> 

<?php include "slider.php"; ?>

  
  <div  style="background-color: #fff; !important; "  class="container">
    <div    class="header-service wow  animated">
      <div class="col-lg-3 col-sm-6 col-xs-3">
        <div class="content">
          <div class="icon-truck">&nbsp;</div>
          <span class="hidden-xs"><strong>SHIPPING</strong> Delivey service</span></div>
      </div>
      <div class="col-lg-3 col-sm-6 col-xs-3">
        <div class="content">
          <div class="icon-support">&nbsp;</div>
          <span class="hidden-xs"><strong>Customer Support</strong> Service</span></div>
      </div>
      <div class="col-lg-3 col-sm-6 col-xs-3">
        <div class="content">
          <div class="icon-money">&nbsp;</div>
          <span class="hidden-xs">3 days <strong>Money Back</strong> Guarantee</span></div>
      </div>
      <div class="col-lg-3 col-sm-6 col-xs-3">
        <div class="content">
          <div class="icon-dis">&nbsp;</div>
          <span class="hidden-xs"><strong>Up to 99% discount</strong> Unlimited </span></div>
      </div>
    </div>
  </div>
  <!-- end header service --> 
  <!--start new main container-->
  <div  class="container">
 <div  style="background-color: #f0f0f0; margin-top: 40px" class="bt-box box-special" id="forlink">
	<div class="box-heading"><h1 style="color: #666">Best Deals</h1></div>
	<div class="box-content">
		<div class="list-product row" id="product_special_0">
		<?php
	
		$best=mysql_query("SELECT *from item i inner join item_size s on(i.item_id=s.item_id) limit 3") or die(mysql_error());
		while($ray=mysql_fetch_array($best)){
		$np=$ray['new_price'];
		$op=$ray['old_price'];
		$item_id=$ray['item_id'];
		$sel=mysql_query("select * from item_photo where item_id='$item_id' ")or die(mysql_error());
		$vl=mysql_fetch_array($sel);
		$photo_name=$vl['photo_name'];
		$percentChange = (1 - $np / $op) * 100; 

			?>


<div  class='item product-thumb col-md-4'>
					<div style="border:1px solid #e0e0e0; border-bottom: none;" class='image best-deals'><a href='product_detail.php?item_id=<?php echo $ray['item_id']; ?>'>
			<img src='images/products/<?php	 echo str_replace(".","_thumb.",$photo_name); ?>' alt='<?php echo $ray['item_name']; ?>' title='View details for\n<?php echo $ray['item_name']; ?>' class='img-responsive' /></a>
					
					</div>
						<div style="border:1px solid #e0e0e0; border-top: none; padding-top: 0px; padding-bottom: 10px" class='caption'>
							<div style="text-align: center" class='name'><a title='View details for\n<?php echo $ray['item_name']; ?>' href='product_detail.php?item_id=<?php echo $ray['item_id']?>'><span style="font-size: x-large; font-weight: normal;"> <?php echo $ray['item_name']; ?></span></a>
							<p><span class='price-new'> <?php //echo $ray['size']; ?></span></p>
							</div>	
											<div class='percent'>
							<span><?php echo round($percentChange,0); ?>%</span>
							</div>
													<p class='prices'>
														<span class='price-old'>UGX<?php echo $ray['old_price']; ?></span> &nbsp;&nbsp;<span class='price-new'>UGX<?php echo $ray['new_price']; ?></span>
														  
							</p>
<div style="text-align: right;">
			<button style="font-size: 12px" type='button'  onClick="add_to_cart(<?php echo $item_id; ?>)" class='btn btn-success' ><i class='fa fa-shopping-cart'></i> ADD TO CART</button>
							
</div>
							
						</div>
				</div>
<?php } ?>

					
				</div>
			</div>
</div>

</div>


 <div  class="container">

<div style="background-color: #f0f0f0" class="bt-box box-special">
	<div class="box-heading"><h1 style="color: #666">Today Deals </h1></div>
	<div class="box-content">
		<div  class="list-product row" id="product_special_1">
		
<?php

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


<div  class='item product-thumb col-md-3'>
					<div style="border:1px solid #e0e0e0; border-bottom: none" class='image best-deals'><a href='product_detail.php?item_id=<?php echo $ray['item_id']?>'><img src='images/products/<?php  echo str_replace(".","_thumb.",$photo_name); ?>' alt='<?php echo $ray['item_name']; ?>' title='View details for\n<?php echo $ray['item_name']; ?>' class='img-responsive' /></a>
					
					</div>
						<div style="border:1px solid #e0e0e0; border-top: none; padding-top: 0px; padding-bottom: 10px" class='caption'>
							<div style="text-align: center" class='name'><a title='View details for\n<?php echo $photo_name; ?>' href='product_detail.php?item_id=<?php echo $ray['item_id']; ?>'><span style="font-size: x-large; font-weight: normal;"> <?php echo $ray['item_name']; ?></span></a>
							<p><span class='price-new'> <?php //echo $ray['size']; ?></span></p>
							</div>	
											<div class='percent'>
							<span><?php echo round($percentChange,0); ?>%</span>
							</div>
													<p class='prices'>
														<span class='price-old'>UGX<?php echo $ray['old_price']; ?></span> <br><span class='price-new' style="float:right">UGX<?php echo $ray['new_price']; ?></span>
														  
							</p>
						<div style="text-align: right;">
							<button style="font-size: 12px" type='button'  onClick='add_to_cart(<?php echo $item_id; ?>)' class='btn btn-success' ><i class='fa fa-shopping-cart'></i> ADD TO CART</button>
							
						</div>
							
						</div>
				</div>
<?php } ?>


</div>
</div>
<!--Shopping cart-->

<!--Shopping cart-->
</div>

</div>
  
 <?php include "footer.php"; ?>
  
</div>
<!-- JavaScript --> 
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/parallax.js"></script> 
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/revslider.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script> 
<script type='text/javascript'>
        jQuery(document).ready(function(){
            jQuery('#rev_slider_4').show().revolution({
                dottedOverlay: 'none',
                delay: 5000,
                startwidth: 770,
                startheight: 400,

                hideThumbs: 200,
                thumbWidth: 200,
                thumbHeight: 50,
                thumbAmount: 2,

                navigationType: 'thumb',
                navigationArrows: 'solo',
                navigationStyle: 'round',

                touchenabled: 'on',
                onHoverStop: 'on',
                
                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,
            
                spinner: 'spinner0',
                keyboardNavigation: 'off',

                navigationHAlign: 'center',
                navigationVAlign: 'bottom',
                navigationHOffset: 0,
                navigationVOffset: 20,

                soloArrowLeftHalign: 'left',
                soloArrowLeftValign: 'center',
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,

                soloArrowRightHalign: 'right',
                soloArrowRightValign: 'center',
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,

                shadow: 0,
                fullWidth: 'on',
                fullScreen: 'off',

                stopLoop: 'off',
                stopAfterLoops: -1,
                stopAtSlide: -1,

                shuffle: 'off',

                autoHeight: 'off',
                forceFullWidth: 'on',
                fullScreenAlignForce: 'off',
                minFullScreenHeight: 0,
                hideNavDelayOnMobile: 1500,
            
                hideThumbsOnMobile: 'off',
                hideBulletsOnMobile: 'off',
                hideArrowsOnMobile: 'off',
                hideThumbsUnderResolution: 0,

                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                fullScreenOffsetContainer: ''
            });
        });
        </script>
</body>


</html>
