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
          <h2>Frequently Asked Questions</h2>
        </div>
        <div class="panel-group accordion-faq" id="faq-accordion">
          <div class="panel">
            <div class="panel-heading"> <a data-toggle="collapse" data-parent="#faq-accordion" href="#question1"> <span class="arrow-down">+</span> <span class="arrow-up">&#8211;</span>Can I hold more than one account with you? </a> </div>
            <div id="question1" class="panel-collapse collapse in">
              <div class="panel-body"> You can only have a maximum of one account registered in your name at a time. However, you can create another account but registered in a different name.   </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading"> <a data-toggle="collapse" data-parent="#faq-accordion" href="#question3" class="collapsed"> <span class="arrow-down">+</span> <span class="arrow-up">&#8211;</span> How secure is my account?</a> </div>
            <div id="question3" class="panel-collapse collapse">
              <div class="panel-body"> For privacy and security reasons, your account information is kept confidential, shared only between you and us. Your are also required to use a very strong password for your account. </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading"> <a data-toggle="collapse" data-parent="#faq-accordion" href="#question2" class="collapsed"> <span class="arrow-down">+</span> <span class="arrow-up">&#8211;</span> How do I get to sell my products on your platform?</a> </div>
            <div id="question2" class="panel-collapse collapse">
              <div class="panel-body"> We sell all products at a discount agreed upon between us and the our client (business). <a href="contact_us.php" style="color:#FF0000">Contact us</a> for more information. </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading"> <a data-toggle="collapse" data-parent="#faq-accordion" href="#question5" class="collapsed"> <span class="arrow-down">+</span> <span class="arrow-up">&#8211;</span> How do I delete my account?</a> </div>
            <div id="question5" class="panel-collapse collapse">
              <div class="panel-body"> Go to your account settings and click on the delete button. However, it becomes effective on the third day during which days you have the option of changing your mind.</div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading"> <a data-toggle="collapse" data-parent="#faq-accordion" href="#question4" class="collapsed"> <span class="arrow-down">+</span> <span class="arrow-up">&#8211;</span> How do I change my password for my account?</a> </div>
            <div id="question4" class="panel-collapse collapse">
              <div class="panel-body"> Go to <b>Password Edit</b> under your account settings. </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading"> <a data-toggle="collapse" data-parent="#faq-accordion" href="#question6" class="collapsed"> <span class="arrow-down">+</span> <span class="arrow-up">&#8211;</span> How long will it take for my products to be delivered </a> </div>
            <div id="question6" class="panel-collapse collapse">
              <div class="panel-body"> <p>Delivery time depends on your location</p> 
			  <p>Uganda: couple of minutes to a maximum of one day</p> 
			  <p>East Africa: hours to a maximum of two days</p>
			  <p>Africa: Maximum of one week</p>
			  <p> Europe: Maximum of two weeks</p></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

 <!-- Footer -->
<?php include 'footer.php'; ?>