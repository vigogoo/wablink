<?php
session_start();
include("connect.php");

if(isset($_REQUEST['category_id'])){
  $_SESSION['category_id']=$_REQUEST['category_id'];
  header("Location:category.php");
}
if(isset($_SESSION['category_id'])){
  $category_id=$_SESSION['category_id'];

}else{
  echo "<h1 style='color:red'>No Content Found";
  return;
}
$ro=mysql_query("select * from category c inner join sub_category s on (c.category_id=s.category_id) where c.category_id = '$category_id'")or die (mysql_error());
$lo=mysql_fetch_array($ro);

?>


<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Just Deals-Products Grid</title>

<!-- Favicons Icon -->



<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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
</head>

<body>
<div class="page"> 
  <!-- Header -->
  <?php include "header.php"; ?>
  <!-- end header -->  
  <!-- breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <ul>
          <li class="home"> <a href="index-php" title="Go to Home Page">Home</a><span>&mdash;›</span></li>
          <li class=""> <a title="Go to Home Page"><?php echo $lo['category_name']; ?></a><span>&mdash;›</span></li>
          <li class="category13"><strong><?php echo $lo['sub_category_name']; ?></strong></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End breadcrumbs --> 
  <!-- Two columns content -->
  <div class="main-container col2-left-layout">
    <div class="main container">
      <div class="row">
        <section class="col-main col-sm-9 col-sm-push-3 wow bounceInUp animated">
          <div class="category-description std">
            <div class="slider-items-products">
              <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col1"> 
                  
                  <!-- Item -->
                  <div class="item"> <a href="#x"><img alt="" src="images/category-banner1.jpg"></a>
                    <div class="cat-img-title cat-bg cat-box">
                      <h2 class="cat-heading">The <?php echo $lo['category_name']; ?> Section</h2>
                      <p>Sliced Like Never Before</p>
                    </div>
                  </div>
                  <!-- End Item --> 
                  
                  <!-- Item -->
                  <div class="item"> <a href="#x"><img alt="" src="images/category-banner1.jpg"></a> 
				  <div class="cat-img-title cat-bg cat-box">
                      <h2 class="cat-heading">The <?php echo $lo['category_name']; ?> Section</h2>
                      <p>All At Your Door Step</p>
                    </div>
				  </div>
                  <!-- End Item --> 
                  
                </div>
              </div>
            </div>
          </div>
          <div class="category-title">
            <h1><?php echo $lo['sub_category_name']; ?></h1>
          </div>
          <div class="category-products">
            <div class="toolbar">
              <div class="sorter">
                <div class="view-mode"> <span title="Grid" class="button button-active button-grid">Grid</span></div>
              </div>
              <div id="sort-by">
                <label class="left">Sort By: </label>
                <ul>
                  <li><a href="#">Position<span class="right-arrow"></span></a>
                    <ul>
                      <li><a href="#">Name</a></li>
                      <li><a href="#">Price</a></li>
                      <li><a href="#">Position</a></li>
                    </ul>
                  </li>
                </ul>
                <a class="button-asc left" href="#" title="Set Descending Direction"><span class="glyphicon glyphicon-arrow-up"></span></a> </div>
              <div class="pager">
                <div id="limiter">
                  <label>View: </label>
                  <ul>
                    <li><a href="#">15<span class="right-arrow"></span></a>
                      <ul>
                        <li><a href="#">20</a></li>
                        <li><a href="#">30</a></li>
                        <li><a href="#">35</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
                <div class="pages">
                  <label>Page:</label>
                  <ul class="pagination">
                    <li><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <ul class="products-grid">
			<?php 
				$sel=mysql_query("SELECT *from item i inner join item_size s on(i.item_id=s.item_id) where i.category_id='$category_id'") or die(mysql_error());
				 while($val=mysql_fetch_array($sel)){
				  $category_id=$val['category_id'];
				  $item_id=$val['item_id'];
				  $np=$val['new_price'];
				  $op=$val['old_price'];
				  $qy= mysql_query("select *from item_photo where item_id='$item_id'") or die (mysql_error());
																																													
				  $rt=mysql_fetch_array($qy);
				  $percentChange = (1 - $np / $op) * 100; 
			?>
              <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="col-item">
                  
                  <div class="product-image-area"> <a class="product-image" title="Sample Product" href="product_detail.php?item_id=<?php echo $val['item_id']; ?>"> <img src="images/products/<?php	 echo str_replace(".","_thumb.",$rt['photo_name']); ?>" class="img-responsive" alt="a" /> </a>
                    <div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" title="Add to cart">
                      <div><i class="icon-shopping-cart" onClick='add_to_cart(<?php echo $item_id; ?>)'></i><span>Add to cart</span></div>
                      </a>  </div>
                  </div>
                  <div class="info">
                    <div class="info-inner">
                      <div class="item-title"> <a title=" Sample Product" href="product_detail.php?item_id=<?php echo $val['item_id']; ?>"> <?php echo $val['item_name']; ?></a> </div>
                      <!--item-title-->
                      <div class="item-content">
                        	<div class='percenttoday'>
							<span>-<?php echo round($percentChange,0); ?>%</span>
							</div>
                        <div class="price-box">
						<p class="old-price"> <span class="price-sep">-</span> <span class="price">  <?php echo $val['old_price']; ?> </span> </p>
                          <p class="special-price"> <span class="price"> <?php echo $val['new_price']; ?></span> </p>
                          
                        </div>
                      </div>
                      <!--item-content--> 
                    </div>
                    <!--info-inner-->
                    
                    <div class="clearfix"> </div>
                  </div>
                </div>
              </li>
              <?php } ?>
            </ul>
          </div>
        </section>
        <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9 wow bounceInUp animated">
          <div class="side-nav-categories">
            <div class="block-title"> Categories </div>
            <!--block-title--> 
            <!-- BEGIN BOX-CATEGORY -->
            <div class="box-content box-category">
              <ul>
			  
			  <?php
			  $test=mysql_query("select *from category ct inner join sub_category sc on (ct.category_id=sc.category_id)") or die(mysql_error());
			  while($just_test=mysql_fetch_array($test)){
			  $sub=$just_test['category_id'];
			  ?>
                <li> <a><?php echo $just_test['category_name'];?></a> <span class="subDropdown minus"></span>
                  <ul class="level0_415">
                    <li> <a href="grid.php?category_id=<?php echo $sub; ?>"> <?php echo $just_test['sub_category_name'];?></a> <span class="subDropdown plus"></span>
                      <ul class="level1">
					  <?php
					  $select_test=mysql_query("select * from item where category_id='$category_id' limit 4") or die (mysql_error());
					  while($select_testing=mysql_fetch_array($select_test)){
              $item_id=$select_testing['item_id'];
					  ?>
                        <li> <a href="product_detail.php?item_id=<?php echo $item_id; ?>"> <?php echo $select_testing['item_name'];?></a> </li>
                       
                        <!--end for-each -->
						<?php } ?>
                      </ul>
                      <!--level1--> 
                    </li>
                    <!--level1-->
                    
                    <!--level1-->
                  </ul>
                  <!--level0--> 
                </li>
				<?php } ?>
                <!--level 0-->
                
              </ul>
            </div>
            <!--box-content box-category--> 
          </div>
          <div class="block block-layered-nav">
            <div class="block-title">Shop By</div>
            <div class="block-content">
              <p class="block-subtitle">Shopping Options</p>
              <dl id="narrow-by-list">
                <dt class="odd">Price</dt>
                <dd class="odd">
                  <ol>
                    <li> <a href="#"><span class="price">$0.00</span> - <span class="price">$99.99</span></a> (6) </li>
                    <li> <a href="#"><span class="price">$100.00</span> and above</a> (6) </li>
                  </ol>
                </dd>
                <dt class="even">Manufacturer</dt>
                <dd class="even">
                  <ol>
                    <li> <a href="#">TheBrand</a> (9) </li>
                    <li> <a href="#">Company</a> (4) </li>
                    <li> <a href="#">LogoFashion</a> (1) </li>
                  </ol>
                </dd>
                <dt class="odd">Color</dt>
                <dd class="odd">
                  <ol>
                    <li> <a href="#">Green</a> (1) </li>
                    <li> <a href="#">White</a> (5) </li>
                    <li> <a href="#">Black</a> (5) </li>
                    <li> <a href="#">Gray</a> (4) </li>
                    <li> <a href="#">Dark Gray</a> (3) </li>
                    <li> <a href="#">Blue</a> (1) </li>
                  </ol>
                </dd>
                <dt class="last even">Size</dt>
                <dd class="last even">
                  <ol>
                    <li> <a href="#">S</a> (6) </li>
                    <li> <a href="#">M</a> (6) </li>
                    <li> <a href="#">L</a> (4) </li>
                    <li> <a href="#">XL</a> (4) </li>
                  </ol>
                </dd>
              </dl>
            </div>
          </div>
          
          <div class="block block-list block-viewed">
            <div class="block-title"> Recently Viewed </div>
            <div class="block-content">
              <ol id="recently-viewed-items">
                <li class="item odd">
                  <p class="product-name"><a href="#"> Armchair with Box-Edge Upholstered Arm</a></p>
                </li>
                <li class="item even">
                  <p class="product-name"><a href="#"> Pearce Upholstered Slee pere</a></p>
                </li>
                <li class="item last odd">
                  <p class="product-name"><a href="#"> Sofa with Box-Edge Down-Blend Wrapped Cushions</a></p>
                </li>
              </ol>
            </div>
          </div>
                    
        </aside>
      </div>
    </div>
  </div>
  <!-- End Two columns content -->
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