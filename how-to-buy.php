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
<title>Just Deals Uganda</title>

<!-- Favicons Icon -->



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
<div class="page"> 
  <!-- Header -->
  <?php include 'header.php'; ?>
  <!-- end nav -->   
<div id="hideShow">
  <div id="step1">
    <div class="search-section">
      <div class="container">
        <div class="row">
          <div class="search-box">
            <form action="#catalogsearch/result/" method="get">
              <input autocomplete="off" name="q" value="Search entire store here..." class="searchbox" maxlength="128" type="text">
              <button type="submit" title="Search" class="button-common search-btn-bg"><span class="searchIconNew"></span></button>
              <div id="search_autocomplete" class="search-autocomplete"></div>
            </form>
            <div class="cross-icon"><a href="javascript:void(0)" id="hideDiv"><img src="images/cross-icon.php" alt="close"></a></div>
          </div>
          <!--search-box--> 
        </div>
      </div>
    </div>
  </div>
  
  <!--#step1--> 
</div>

<!--#hideShow--> 

<!-- Home Slider Block -->

<section class="main-container col1-layout">
  <div class="main container">
    <div class="col-main">
      <div class="cart wow bounceInUp animated">
        <div class="page-title">
          <h2>Buying from Just Deals is as easy as 1,2,3</h2>
        </div>
        <div class="panel-group accordion-faq" id="faq-accordion">
          <div class="panel">
            <div class="panel-heading"> <a data-toggle="collapse" data-parent="#faq-accordion" href="#question1"> <span class="arrow-down">+</span> <span class="arrow-up">&#8211;</span>Step 1 </a> </div>
            <div id="question1" class="panel-collapse collapse in">
              <div class="panel-body"> Search for your favourite deals</div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading"> <a data-toggle="collapse" data-parent="#faq-accordion" href="#question3" > <span class="arrow-down">+</span> <span class="arrow-up">&#8211;</span> Step 2</a> </div>
            <div id="question3" class="panel-collapse collapse in">
              <div class="panel-body"> Click <b style="color: lightskyblue;">Buy</b> to add your favourite deal to cart </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading"> <a data-toggle="collapse" data-parent="#faq-accordion" href="#question2"> <span class="arrow-down">+</span> <span class="arrow-up">&#8211;</span> Step 3</a> </div>
            <div id="question2" class="panel-collapse collapse in">
              <div class="panel-body"> 
                Once you are through with adding your deals to cart, proceed to checkout.
            <ol>
              <li>If you are our customer, login to complete checkout.</li><br>
              <li>If you would like to checkout as a guest, fill out out the simple form on the checkout page and click check out.</li><br>
              <li>Once you checkout, you receive a coupon number. Copy that coupon number somewhere, you will need it to claim for your offer.</li><br>
              <li>If you have an account with us, we've got you covered. You can always find your coupons by clicking <b style="color: lightskyblue;">My coupons</b> in the top header.</li>
            </ol>   
              
           </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div> 
</section>

 <!-- Footer -->
<?php include 'footer.php'; ?>