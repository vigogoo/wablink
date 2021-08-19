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
    <meta name="description" content="Get genuine quality affordable agriculture inputs and market at your farm">
    <meta name="author" content="">
    <title>WABLINKS | Best price Online store</title>

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
    <link rel="stylesheet" href="css/custom.css" type="text/css">

    <!-- Google Fonts -->
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,300,700,800,400,600'
        rel='stylesheet' type='text/css'>
    <style>
    .featured-pro .owl-wrapper {
        width: 100% !important;
    }

    .grow img {


        transition: all .2s ease-in-out;
    }

    .grow img:hover {
        transform: scale(1.1);
    }

    body {
        overflow-x: hidden;
    }

    #loading {
        position: fixed;
        display: block;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        text-align: center;
        opacity: 0.7;
        background-color: #fff;
        z-index: 99;
    }

    #loading-image {
        position: absolute;
        top: 100px;
        left: 240px;
        z-index: 100;
    }
    </style>


</head>

<body>
    <div id="loading">
        <img id="loading-image" src="ezgif-2-6d0b072c3d3f.gif" alt="Loading..." />
    </div>

    <?php include "header.php"; ?>

    <?php include "slider.php"; ?>
    <div class="page" style="background-color: #fff">
        <section>
            <div class="container">
                <div style="background: #fff;box-shadow: 0 2px 4px 0 rgba(0,0,0,.08);">
                    <div class="std">
                        <div class="best-seller-pro wow bounceInUp animated">
                            <div class="slider-items-products">
                                <div class="new_title center"
                                    style="background-color:#FF550C;border-radius: 4px 4px 0 0;">
                                    <h2 style="margin-top:1px">Stock up and save</h2>
                                    <a href="#" rel="noopener noreferrer">
                                        <h2 class="txt-see-all">SEE ALL<span>></span></h2>
                                    </a>
                                </div>

                                <div id="best-seller-slider" class="product-flexslider hidden-buttons fix-mt"
                                    style="padding-right:10px">
                                    <div class="slider-items slider-width-col4"
                                        style="padding-right: 20px;padding-left: 20px;padding-top: 5px;padding-bottom: 5px">
                                        <?php
                                          $bests=mysql_query("SELECT *from item i inner join item_size s on(i.item_id=s.item_id) where i.category_id='1'") or die(mysql_error());
                                          while($rays=mysql_fetch_array($bests)){
                                          $np=$rays['new_price'];
                                          $op=$rays['old_price'];
                                          $item_id=$rays['item_id'];
                                          $bid=$rays['bid'];
                                          $bize=mysql_query("select * from business where bid='$bid' ")or die(mysql_error());
                                          $_bize=mysql_fetch_array($bize);
                                          $sels=mysql_query("select * from item_photo where item_id='$item_id' ")or die(mysql_error());
                                          $vls=mysql_fetch_array($sels);
                                          $photo_names=$vls['photo_name'];
                                          //$percentChange = $rays['percent'] * 100; 
                                            ?>
                                        <!-- Item -->
                                        <div class="item"
                                            style="background: #fff;box-shadow: 0 2px 4px 0 rgba(0,0,0,.08);margin-bottom: 10px;border-radius: 10px">
                                            <div class="col-item">
                                                <!--div class="sale-label sale-top-right">-<?php echo round($percentChange,0); ?>% </div-->
                                                <div class="product-image-area">
                                                    <a class="product-image position-relative"
                                                        title="<?php echo $rays['item_name']; ?>"
                                                        href="product_detail.php?item_id=<?php echo $rays['item_id']; ?>">
                                                        <span class="discount-tke">
                                                            <?php echo ceil((($rays['old_price'] - $rays['new_price'])/ $rays['old_price']) * 100);?>%
                                                        </span>

                                                        <center>
                                                            <img src='images/products/<?php  echo $photo_names ?>'
                                                                alt='<?php echo $ray['item_name']; ?>'
                                                                title='<?php echo $rays['item_name']; ?>'
                                                                class="img-responsive" style="width:100%;" />
                                                        </center>
                                                    </a>

                                                </div>
                                                <div class="info" style="padding-top: 0px;margin-top: 0px">
                                                    <div class="info-inner">
                                                        <div class="item-title" style="margin-top: -30px">
                                                            <center>
                                                                <a title="<?php echo $rays['item_name']; ?>"
                                                                    href='product_detail.php?item_id=<?php echo $rays['item_id']; ?>'>
                                                                    <p class="item-title">
                                                                        <?php echo substr($rays['item_name'],0,20);?>...
                                                                    </p>
                                                                </a>
                                                            </center>

                                                        </div>

                                                        <!--item-title-->
                                                        <div class="item-content">
                                                            <center>
                                                                <div class="ratings">
                                                                    <div class="rating-box">
                                                                        <div class="rating"></div>
                                                                    </div>
                                                                </div>
                                                            </center>
                                                            <center>
                                                                <div class="price-box">
                                                                    <p class="special-price"> <span class="price"
                                                                            style="color: #000">
                                                                            UGX<?php echo number_format($rays['new_price']); ?>
                                                                        </span> </p> <br>
                                                                    <p class="special-price"> <span
                                                                            class="text-muted mt-2">
                                                                            <s>
                                                                                UGX<?php echo number_format($rays['old_price']); ?></s>
                                                                        </span> </p>

                                                                </div>
                                                            </center>
                                                        </div>
                                                        <!--item-content-->
                                                        <center>
                                                            <div class="add-to-box" style="margin-bottom: 20px">
                                                                <div class="add-to-cart">

                                                                    <a href="#"
                                                                        onClick="add_to_cart(<?php echo $item_id; ?>)"
                                                                        class="button btn-cart" title="Add to Cart"
                                                                        type="button" style="width: 100%;"><span><i
                                                                                class="icon-basket"></i> Add to
                                                                            Cart</span></a>

                                                                </div>
                                                            </div>
                                                        </center>
                                                    </div>
                                                    <!--info-inner-->

                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->

                                        <!-- Item -->
                                        <?php } ?>
                                        <!-- End Item -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- START OF ADVERT -->
        <section>
            <div class="container">
                <div style="background: #fff;box-shadow: 0 2px 4px 0 rgba(0,0,0,.08);">
                    <div class="std">
                        <div class="ad-card">
                            <img src="images/advert1.png" alt="" class="advert">
                            <img src="images/advert2.png" alt="" class="advert">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END OF ADVERT -->
        <section>
            <div class="container">
                <div style="background: #fff;box-shadow: 0 2px 4px 0 rgba(0,0,0,.08);">
                    <div class="std">
                        <div class="best-seller-pro wow bounceInUp animated">
                            <div class="slider-items-products">
                                <div class="new_title center"
                                    style="background-color:#FF550C;border-radius: 4px 4px 0 0;">
                                    <h2 style="margin-top:1px">Dry Foods</h2>
                                    <a href="#" rel="noopener noreferrer">
                                        <h2 class="txt-see-all">SEE ALL<span>></span></h2>
                                    </a>
                                </div>

                                <div id="best-seller-slider" class="product-flexslider hidden-buttons fix-mt"
                                    style="padding-right:10px">
                                    <div class="slider-items slider-width-col4"
                                        style="padding-right: 20px;padding-left: 20px;padding-top: 5px;padding-bottom: 5px">
                                        <?php
                                          $bests=mysql_query("SELECT *from item i inner join item_size s on(i.item_id=s.item_id) where i.category_id='1'") or die(mysql_error());
                                          while($rays=mysql_fetch_array($bests)){
                                          $np=$rays['new_price'];
                                          $op=$rays['old_price'];
                                          $item_id=$rays['item_id'];
                                          $bid=$rays['bid'];
                                          $bize=mysql_query("select * from business where bid='$bid' ")or die(mysql_error());
                                          $_bize=mysql_fetch_array($bize);
                                          $sels=mysql_query("select * from item_photo where item_id='$item_id' ")or die(mysql_error());
                                          $vls=mysql_fetch_array($sels);
                                          $photo_names=$vls['photo_name'];
                                          //$percentChange = $rays['percent'] * 100; 
                                            ?>
                                        <!-- Item -->
                                        <div class="item"
                                            style="background: #fff;box-shadow: 0 2px 4px 0 rgba(0,0,0,.08);margin-bottom: 10px;border-radius: 10px">
                                            <div class="col-item">
                                                <!--div class="sale-label sale-top-right">-<?php echo round($percentChange,0); ?>% </div-->
                                                <div class="product-image-area">
                                                    <a class="product-image position-relative"
                                                        title="<?php echo $rays['item_name']; ?>"
                                                        href="product_detail.php?item_id=<?php echo $rays['item_id']; ?>">
                                                        <span class="discount-tke">
                                                            <?php echo ceil((($rays['old_price'] - $rays['new_price'])/ $rays['old_price']) * 100);?>%
                                                        </span>

                                                        <center>
                                                            <img src='images/products/<?php  echo $photo_names ?>'
                                                                alt='<?php echo $ray['item_name']; ?>'
                                                                title='<?php echo $rays['item_name']; ?>'
                                                                class="img-responsive" style="width:100%;" />
                                                        </center>
                                                    </a>

                                                </div>
                                                <div class="info" style="padding-top: 0px;margin-top: 0px">
                                                    <div class="info-inner">
                                                        <div class="item-title" style="margin-top: -30px">
                                                            <center>
                                                                <a title="<?php echo $rays['item_name']; ?>"
                                                                    href='product_detail.php?item_id=<?php echo $rays['item_id']; ?>'>
                                                                    <p class="item-title">
                                                                        <?php echo substr($rays['item_name'],0,20);?>...
                                                                    </p>
                                                                </a>
                                                            </center>

                                                        </div>

                                                        <!--item-title-->
                                                        <div class="item-content">
                                                            <center>
                                                                <div class="ratings">
                                                                    <div class="rating-box">
                                                                        <div class="rating"></div>
                                                                    </div>
                                                                </div>
                                                            </center>
                                                            <center>
                                                                <div class="price-box">
                                                                    <p class="special-price"> <span class="price"
                                                                            style="color: #000">
                                                                            UGX<?php echo number_format($rays['new_price']); ?>
                                                                        </span> </p> <br>
                                                                    <p class="special-price"> <span
                                                                            class="text-muted mt-2">
                                                                            <s>
                                                                                UGX<?php echo number_format($rays['old_price']); ?></s>
                                                                        </span> </p>

                                                                </div>
                                                            </center>
                                                        </div>
                                                        <!--item-content-->
                                                        <center>
                                                            <div class="add-to-box" style="margin-bottom: 20px">
                                                                <div class="add-to-cart">

                                                                    <a href="#"
                                                                        onClick="add_to_cart(<?php echo $item_id; ?>)"
                                                                        class="button btn-cart" title="Add to Cart"
                                                                        type="button" style="width: 100%;"><span><i
                                                                                class="icon-basket"></i> Add to
                                                                            Cart</span></a>

                                                                </div>
                                                            </div>
                                                        </center>
                                                    </div>
                                                    <!--info-inner-->

                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->

                                        <!-- Item -->
                                        <?php } ?>
                                        <!-- End Item -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div style="background: #fff;box-shadow: 0 2px 4px 0 rgba(0,0,0,.08);">
                    <div class="std">
                        <div class="best-seller-pro wow bounceInUp animated">
                            <div class="slider-items-products">
                                <div class="new_title center"
                                    style="background-color:#FE0000;border-radius: 4px 4px 0 0;">
                                    <h2 style="margin-top:1px">Bags</h2>
                                    <a href="#" rel="noopener noreferrer">
                                        <h2 class="txt-see-all">SEE ALL<span>></span></h2>
                                    </a>
                                </div>

                                <div id="best-seller-slider" class="product-flexslider hidden-buttons fix-mt"
                                    style="padding-right:10px">
                                    <div class="slider-items slider-width-col4"
                                        style="padding-right: 20px;padding-left: 20px;padding-top: 5px;padding-bottom: 5px">
                                        <?php
                                          $bests=mysql_query("SELECT *from item i inner join item_size s on(i.item_id=s.item_id) where i.category_id='2'") or die(mysql_error());
                                          while($rays=mysql_fetch_array($bests)){
                                          $np=$rays['new_price'];
                                          $op=$rays['old_price'];
                                          $item_id=$rays['item_id'];
                                          $bid=$rays['bid'];
                                          $bize=mysql_query("select * from business where bid='$bid' ")or die(mysql_error());
                                          $_bize=mysql_fetch_array($bize);
                                          $sels=mysql_query("select * from item_photo where item_id='$item_id' ")or die(mysql_error());
                                          $vls=mysql_fetch_array($sels);
                                          $photo_names=$vls['photo_name'];
                                          //$percentChange = $rays['percent'] * 100; 
                                            ?>
                                        <!-- Item -->
                                        <div class="item"
                                            style="background: #fff;box-shadow: 0 2px 4px 0 rgba(0,0,0,.08);margin-bottom: 10px;border-radius: 10px">
                                            <div class="col-item">
                                                <!--div class="sale-label sale-top-right">-<?php echo round($percentChange,0); ?>% </div-->
                                                <div class="product-image-area">
                                                    <a class="product-image position-relative"
                                                        title="<?php echo $rays['item_name']; ?>"
                                                        href="product_detail.php?item_id=<?php echo $rays['item_id']; ?>">
                                                        <span class="discount-tke">
                                                            <?php echo ceil((($rays['old_price'] - $rays['new_price'])/ $rays['old_price']) * 100);?>%
                                                        </span>

                                                        <center>
                                                            <img src='images/products/<?php  echo $photo_names ?>'
                                                                alt='<?php echo $ray['item_name']; ?>'
                                                                title='<?php echo $rays['item_name']; ?>'
                                                                class="img-responsive" style="width:100%;" />
                                                        </center>
                                                    </a>

                                                </div>
                                                <div class="info" style="padding-top: 0px;margin-top: 0px">
                                                    <div class="info-inner">
                                                        <div class="item-title" style="margin-top: -30px">
                                                            <center>
                                                                <a title="<?php echo $rays['item_name']; ?>"
                                                                    href='product_detail.php?item_id=<?php echo $rays['item_id']; ?>'>
                                                                    <p class="item-title">
                                                                        <?php echo substr($rays['item_name'],0,20);?>...
                                                                    </p>
                                                                </a>
                                                            </center>

                                                        </div>

                                                        <!--item-title-->
                                                        <div class="item-content">
                                                            <center>
                                                                <div class="ratings">
                                                                    <div class="rating-box">
                                                                        <div class="rating"></div>
                                                                    </div>
                                                                </div>
                                                            </center>
                                                            <center>
                                                                <div class="price-box">
                                                                    <p class="special-price"> <span class="price"
                                                                            style="color: #000">
                                                                            UGX<?php echo number_format($rays['new_price']); ?>
                                                                        </span> </p> <br>
                                                                    <p class="special-price"> <span
                                                                            class="text-muted mt-2">
                                                                            <s>
                                                                                UGX<?php echo number_format($rays['old_price']); ?></s>
                                                                        </span> </p>

                                                                </div>
                                                            </center>
                                                        </div>
                                                        <!--item-content-->
                                                        <center>
                                                            <div class="add-to-box" style="margin-bottom: 20px">
                                                                <div class="add-to-cart">

                                                                    <a href="#"
                                                                        onClick="add_to_cart(<?php echo $item_id; ?>)"
                                                                        class="button btn-cart" title="Add to Cart"
                                                                        type="button" style="width: 100%;"><span><i
                                                                                class="icon-basket"></i> Add to
                                                                            Cart</span></a>

                                                                </div>
                                                            </div>
                                                        </center>
                                                    </div>
                                                    <!--info-inner-->

                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->

                                        <!-- Item -->
                                        <?php } ?>
                                        <!-- End Item -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- START OF ADVERT -->
        <section>
            <div class="container">
                <div style="background: #fff;box-shadow: 0 2px 4px 0 rgba(0,0,0,.08);">
                    <div class="std">
                        <div class="ad-card">
                            <img src="images/advert3.png" alt="" class="advert">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END OF ADVERT -->
        <section>
            <div class="container">
                <div style="background: #fff;box-shadow: 0 2px 4px 0 rgba(0,0,0,.08);">
                    <div class="std">
                        <div class="best-seller-pro wow bounceInUp animated">
                            <div class="slider-items-products">
                                <div class="new_title center"
                                    style="background-color:#740001;border-radius: 4px 4px 0 0;">
                                    <h2 style="margin-top:1px">Clothing</h2>
                                    <a href="#" rel="noopener noreferrer">
                                        <h2 class="txt-see-all">SEE ALL<span>></span></h2>
                                    </a>
                                </div>

                                <div id="best-seller-slider" class="product-flexslider hidden-buttons fix-mt"
                                    style="padding-right:10px">
                                    <div class="slider-items slider-width-col4"
                                        style="padding-right: 20px;padding-left: 20px;padding-top: 5px;padding-bottom: 5px">
                                        <?php
                                          $bests=mysql_query("SELECT *from item i inner join item_size s on(i.item_id=s.item_id) where i.category_id='3'") or die(mysql_error());
                                          while($rays=mysql_fetch_array($bests)){
                                          $np=$rays['new_price'];
                                          $op=$rays['old_price'];
                                          $item_id=$rays['item_id'];
                                          $bid=$rays['bid'];
                                          $bize=mysql_query("select * from business where bid='$bid' ")or die(mysql_error());
                                          $_bize=mysql_fetch_array($bize);
                                          $sels=mysql_query("select * from item_photo where item_id='$item_id' ")or die(mysql_error());
                                          $vls=mysql_fetch_array($sels);
                                          $photo_names=$vls['photo_name'];
                                          //$percentChange = $rays['percent'] * 100; 
                                            ?>
                                        <!-- Item -->
                                        <div class="item"
                                            style="background: #fff;box-shadow: 0 2px 4px 0 rgba(0,0,0,.08);margin-bottom: 10px;border-radius: 10px">
                                            <div class="col-item">
                                                <!--div class="sale-label sale-top-right">-<?php echo round($percentChange,0); ?>% </div-->
                                                <div class="product-image-area">
                                                    <a class="product-image position-relative"
                                                        title="<?php echo $rays['item_name']; ?>"
                                                        href="product_detail.php?item_id=<?php echo $rays['item_id']; ?>">
                                                        <span class="discount-tke">
                                                            <?php echo ceil((($rays['old_price'] - $rays['new_price'])/ $rays['old_price']) * 100);?>%
                                                        </span>

                                                        <center>
                                                            <img src='images/products/<?php  echo $photo_names ?>'
                                                                alt='<?php echo $ray['item_name']; ?>'
                                                                title='<?php echo $rays['item_name']; ?>'
                                                                class="img-responsive" style="width:100%;" />
                                                        </center>
                                                    </a>

                                                </div>
                                                <div class="info" style="padding-top: 0px;margin-top: 0px">
                                                    <div class="info-inner">
                                                        <div class="item-title" style="margin-top: -30px">
                                                            <center>
                                                                <a title="<?php echo $rays['item_name']; ?>"
                                                                    href='product_detail.php?item_id=<?php echo $rays['item_id']; ?>'>
                                                                    <p class="item-title">
                                                                        <?php echo substr($rays['item_name'],0,20);?>...
                                                                    </p>
                                                                </a>
                                                            </center>

                                                        </div>

                                                        <!--item-title-->
                                                        <div class="item-content">
                                                            <center>
                                                                <div class="ratings">
                                                                    <div class="rating-box">
                                                                        <div class="rating"></div>
                                                                    </div>
                                                                </div>
                                                            </center>
                                                            <center>
                                                                <div class="price-box">
                                                                    <p class="special-price"> <span class="price"
                                                                            style="color: #000">
                                                                            UGX<?php echo number_format($rays['new_price']); ?>
                                                                        </span> </p> <br>
                                                                    <p class="special-price"> <span
                                                                            class="text-muted mt-2">
                                                                            <s>
                                                                                UGX<?php echo number_format($rays['old_price']); ?></s>
                                                                        </span> </p>

                                                                </div>
                                                            </center>
                                                        </div>
                                                        <!--item-content-->
                                                        <center>
                                                            <div class="add-to-box" style="margin-bottom: 20px">
                                                                <div class="add-to-cart">

                                                                    <a href="#"
                                                                        onClick="add_to_cart(<?php echo $item_id; ?>)"
                                                                        class="button btn-cart" title="Add to Cart"
                                                                        type="button" style="width: 100%;"><span><i
                                                                                class="icon-basket"></i> Add to
                                                                            Cart</span></a>

                                                                </div>
                                                            </div>
                                                        </center>
                                                    </div>
                                                    <!--info-inner-->

                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->

                                        <!-- Item -->
                                        <?php } ?>
                                        <!-- End Item -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div style="background: #fff;box-shadow: 0 2px 4px 0 rgba(0,0,0,.08);">
                    <div class="std">
                        <div class="best-seller-pro wow bounceInUp animated">
                            <div class="slider-items-products">
                                <div class="new_title center"
                                    style="background-color:#FF550C;border-radius: 4px 4px 0 0;">
                                    <h2 style="margin-top:1px">Beddings</h2>
                                    <a href="#" rel="noopener noreferrer">
                                        <h2 class="txt-see-all">SEE ALL<span>></span></h2>
                                    </a>
                                </div>

                                <div id="best-seller-slider" class="product-flexslider hidden-buttons fix-mt"
                                    style="padding-right:10px">
                                    <div class="slider-items slider-width-col4"
                                        style="padding-right: 20px;padding-left: 20px;padding-top: 5px;padding-bottom: 5px">
                                        <?php
                                          $bests=mysql_query("SELECT *from item i inner join item_size s on(i.item_id=s.item_id) where i.category_id='4'") or die(mysql_error());
                                          while($rays=mysql_fetch_array($bests)){
                                          $np=$rays['new_price'];
                                          $op=$rays['old_price'];
                                          $item_id=$rays['item_id'];
                                          $bid=$rays['bid'];
                                          $bize=mysql_query("select * from business where bid='$bid' ")or die(mysql_error());
                                          $_bize=mysql_fetch_array($bize);
                                          $sels=mysql_query("select * from item_photo where item_id='$item_id' ")or die(mysql_error());
                                          $vls=mysql_fetch_array($sels);
                                          $photo_names=$vls['photo_name'];
                                          //$percentChange = $rays['percent'] * 100; 
                                            ?>
                                        <!-- Item -->
                                        <div class="item"
                                            style="background: #fff;box-shadow: 0 2px 4px 0 rgba(0,0,0,.08);margin-bottom: 10px;border-radius: 10px">
                                            <div class="col-item">
                                                <!--div class="sale-label sale-top-right">-<?php echo round($percentChange,0); ?>% </div-->
                                                <div class="product-image-area">
                                                    <a class="product-image position-relative"
                                                        title="<?php echo $rays['item_name']; ?>"
                                                        href="product_detail.php?item_id=<?php echo $rays['item_id']; ?>">
                                                        <span class="discount-tke">
                                                            <?php echo ceil((($rays['old_price'] - $rays['new_price'])/ $rays['old_price']) * 100);?>%
                                                        </span>

                                                        <center>
                                                            <img src='images/products/<?php  echo $photo_names ?>'
                                                                alt='<?php echo $ray['item_name']; ?>'
                                                                title='<?php echo $rays['item_name']; ?>'
                                                                class="img-responsive" style="width:100%;" />
                                                        </center>
                                                    </a>

                                                </div>
                                                <div class="info" style="padding-top: 0px;margin-top: 0px">
                                                    <div class="info-inner">
                                                        <div class="item-title" style="margin-top: -30px">
                                                            <center>
                                                                <a title="<?php echo $rays['item_name']; ?>"
                                                                    href='product_detail.php?item_id=<?php echo $rays['item_id']; ?>'>
                                                                    <p class="item-title">
                                                                        <?php echo substr($rays['item_name'],0,20);?>...
                                                                    </p>
                                                                </a>
                                                            </center>

                                                        </div>

                                                        <!--item-title-->
                                                        <div class="item-content">
                                                            <center>
                                                                <div class="ratings">
                                                                    <div class="rating-box">
                                                                        <div class="rating"></div>
                                                                    </div>
                                                                </div>
                                                            </center>
                                                            <center>
                                                                <div class="price-box">
                                                                    <p class="special-price"> <span class="price"
                                                                            style="color: #000">
                                                                            UGX<?php echo number_format($rays['new_price']); ?>
                                                                        </span> </p> <br>
                                                                    <p class="special-price"> <span
                                                                            class="text-muted mt-2">
                                                                            <s>
                                                                                UGX<?php echo number_format($rays['old_price']); ?></s>
                                                                        </span> </p>

                                                                </div>
                                                            </center>
                                                        </div>
                                                        <!--item-content-->
                                                        <center>
                                                            <div class="add-to-box" style="margin-bottom: 20px">
                                                                <div class="add-to-cart">

                                                                    <a href="#"
                                                                        onClick="add_to_cart(<?php echo $item_id; ?>)"
                                                                        class="button btn-cart" title="Add to Cart"
                                                                        type="button" style="width: 100%;"><span><i
                                                                                class="icon-basket"></i> Add to
                                                                            Cart</span></a>

                                                                </div>
                                                            </div>
                                                        </center>
                                                    </div>
                                                    <!--info-inner-->

                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->

                                        <!-- Item -->
                                        <?php } ?>
                                        <!-- End Item -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include "footer.php"; ?>

    </div>
    <!-- JavaScript -->
    <script type="text/javascript" src="jsx/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/parallax.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/revslider.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script>
    $(window).load(function() {
        $('#loading').hide();
    });
    </script>

    <script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#rev_slider_4').show().revolution({
            dottedOverlay: 'none',
            delay: 5000,
            startwidth: 585,
            startheight: 460,

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