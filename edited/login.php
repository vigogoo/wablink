<?php
session_start();
include 'connect.php';
include 'security.php';
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
    <?php include "header.php"; ?> 
  <!-- end nav -->  
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">
          <h2>Login or Create an Account</h2>
        </div>
        <fieldset class="col2-set">
          <legend>Login or Create an Account</legend>
          <div class="col-1 new-users"><strong>New Customers</strong>
            <div class="content">
              <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
              <div class="buttons-set">
                <button onClick="window.location='register.php';" class="button create-account" type="button"><span>Create an Account</span></button>
              </div>
            </div>
          </div>
          <div class="col-2 registered-users"><strong>Registered Customers</strong>
            <div class="content">
              <p>If you have an account with us, please log in.</p>
              <form action="" method="post" role="form">
              <h3 class="form-title form-title-first"><i class="icon-lock"></i> Login</h3>
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="email" class="form-control" placeholder="Enter Username">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group">
               <!-- <div class="checkbox">
                  <label>
                    <input type="checkbox"> Remember me
                  </label>
                </div> -->
              </div>
			  <p style="color:red">
			  <?php
			  if(isset($_POST['email'],$_POST['password'])){
				  $email=clean_data($_POST['email']);
				   $password=clean_data($_POST['password']);
				   //admin
				   $sel=mysql_query("select * from customer where email='$email' && password='$password'")or die(mysql_error());
				   $val=mysql_fetch_array($sel);
				   
				   if($val){
					   $_SESSION['ac_type']="customer";
					   $_SESSION['customer_id']=$val['customer_id'];
					   $_SESSION['customer_name']=$val['name'];
					    $_SESSION['contact']=$val['contact'];
						 $_SESSION['email']=$val['email'];
						  $_SESSION['address']=$val['address'];
					   //header("Location:admin/");
					   if($_SESSION['page']=="checkout"){
					   echo '<META http-equiv="refresh" content="0;URL=checkout.php"><img src="load.gif" />';}
					   else{
					   	 echo '<META http-equiv="refresh" content="0;URL=index.php"><img src="load.gif" />';
					   }
				   }else{
					   echo "Access denied: Invalid inputs";					 
				   }
			  }
			  ?>
			  </p>
              <input type="submit" style="background-color:#C90549" onClick="submit" class="btn btn-primary btn-lg" value="Login" />
              <!--<a href="index-2.php" class="btn btn-link">Cancel</a>-->
            </form>
          </div>
        </fieldset>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
    </div>
  </section>
  <footer class="footer wow bounceInUp animated">
    <div class="brand-logo ">
      <div class="container">
        <div class="slider-items-products">
         
        </div>
      </div>
    </div>
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-7">
            <div class="block-subscribe">
              <div class="newsletter">
                <form>
                  <h4>newsletter</h4>
                  <input type="text" placeholder="Enter your email address" class="input-text required-entry validate-email" title="Sign up for our newsletter" id="newsletter1" name="email">
                  <button class="subscribe" title="Subscribe" type="submit"><span>Subscribe</span></button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-5">
            <div class="social">
              <ul>
                <li class="fb"><a href="#"></a></li>
                <li class="tw"><a href="#"></a></li>
                <li class="googleplus"><a href="#"></a></li>
                <li class="rss"><a href="#"></a></li>
                <li class="pintrest"><a href="#"></a></li>
                <li class="linkedin"><a href="#"></a></li>
                <li class="youtube"><a href="#"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-middle container">
      <div class="row">
        <div class="col-md-3 col-sm-4">
          <div class="footer-logo"><a href="index.php" title="Logo"><img src="images/logo.png" alt="logo" style="max-height:70px; max-width:70px"></a></div>
          <p>Bridging Business to Customers Online. </p>
          <div class="payment-accept">
            <div><img src="images/payment-1.png" alt="payment"> <img src="images/payment-2.png" alt="payment"> <img src="images/payment-3.png" alt="payment"> <img src="images/payment-4.png" alt="payment"></div>
          </div>
        </div>
        <div class="col-md-2 col-sm-4">
          <h4>Shopping Guide</h4>
          <ul class="links">
            <li class="first"><a href="#" title="How to buy">How to buy</a></li>
            <li><a href="faq.php" title="FAQs">FAQs</a></li>
            <li><a href="#" title="Payment">Payment</a></li>
            <li><a href="#" title="Shipment&lt;/a&gt;">Shipment</a></li>
            <li><a href="#" title="Where is my order?">Where is my order?</a></li>
            <li class="last"><a href="#" title="Return policy">Return policy</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-4">
          <h4>Style Advisor</h4>
          <ul class="links">
            <li class="first"><a title="Your Account" href="login.php">Your Account</a></li>
            <li><a title="Information" href="#">Information</a></li>
            <li><a title="Addresses" href="#">Addresses</a></li>
            <li><a title="Addresses" href="#">Discount</a></li>
            <li><a title="Orders History" href="#">Orders History</a></li>
            <li class="last"><a title=" Additional Information" href="#">Additional Information</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-4">
          <h4>Information</h4>
          <ul class="links">
            <li class="first"><a href="#" title="privacy policy">Privacy policy</a></li>
            <li><a href="#/" title="Search Terms">Search Terms</a></li>
            <li><a href="#" title="Advanced Search">Advanced Search</a></li>
            <li><a href="contact_us.php" title="Contact Us">Contact Us</a></li>
            <li><a href="#" title="Suppliers">Suppliers</a></li>
            <li class=" last"><a href="#" title="Our stores" class="link-rss">Our stores</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-4">
          <h4>Contact us</h4>
          <div class="contacts-info">
            <address>
            <i class="add-icon">&nbsp;</i>Kironde Close Rubaga road <br>
            &nbsp; P.O Box 14289, Kampala Uganda
            </address>
            <div class="phone-footer"><i class="phone-icon">&nbsp;</i> +44 7539 489516</div>
            <div class="email-footer"><i class="email-icon">&nbsp;</i> <a href="#">info@justdealsug.com</a> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-5 col-xs-12 coppyright"> &copy; 2017 Just Deals Ug. All Rights Reserved.  </div>
          <div class="col-sm-7 col-xs-12 company-links">
            <ul class="links">
              <li style="color:#FFFFFF;">Designed by <a href="#">justcreative Ltd</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
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