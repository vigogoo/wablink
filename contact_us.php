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

<body class="contacts-index-index">
<div class="page"> 
  <!-- Header -->
    <?php include "header.php"; ?> 
  <!-- end nav -->  
  
  <!-- breadcrumbs -->
  
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <ul>
          <li class="home"> <a title="Go to Home Page" href="index.php">Home</a><span>&mdash;›</span></li>
          <li class="category13"><strong>Contact Us</strong></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- main-container -->
  <div class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <section class="col-main col-sm-9 wow bounceInUp animated">
          <div class="page-title">
            <h2>Contact Us</h2>
          </div>
          <div class="static-contain">
            <fieldset class="group-select">
              <ul>
                <li id="billing-new-address-form">
                  <fieldset>
                    <legend>New Address</legend>
                    <input type="hidden" name="billing[address_id]" value="" id="billing:address_id">
                    <ul>
                      <li>
                        <div class="customer-name">
                          <div class="input-box name-firstname">
                            <label for="billing:firstname"> First Name<span class="required">*</span></label>
                            <br>
                            <input type="text" id="billing:firstname" name="billing[firstname]" value="" title="First Name" class="input-text ">
                          </div>
                          <div class="input-box name-lastname">
                            <label for="billing:lastname"> Email Address <span class="required">*</span> </label>
                            <br>
                            <input type="text" id="billing:lastname" name="billing[lastname]" value="" title="Last Name" class="input-text">
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="input-box">
                          <label for="billing:company">Company</label>
                          <br>
                          <input type="text" id="billing:company" name="billing[company]" value="" title="Company" class="input-text">
                        </div>
                        <div class="input-box">
                          <label for="billing:email">Telephone <span class="required">*</span></label>
                          <br>
                          <input type="text" name="billing[email]" id="billing:email" value="" title="Email Address" class="input-text validate-email">
                        </div>
                      </li>
                      <li>
                        <label for="billing:street1">Address <span class="required">*</span></label>
                        <br>
                        <input type="text" title="Street Address" name="billing[street][]" id="billing:street1" value="" class="input-text required-entry">
                      </li>
                      <li>
                        <input type="text" title="Street Address 2" name="billing[street][]" id="billing:street2" value="" class="input-text required-entry">
                      </li>
                      <li class="">
                        <label for="comment">Comment<em class="required">*</em></label>
                        <br>
                        <div class="">
                          <textarea name="comment" id="comment" title="Comment" class="required-entry input-text" cols="5" rows="3"></textarea>
                        </div>
                      </li>
                    </ul>
                  </fieldset>
                </li>
                <li>
                <p class="require"><em class="required">* </em>Required Fields</p>
                <input type="text" name="hideit" id="hideit" value="">
                <div class="buttons-set">
                  <button type="submit" title="Submit" class="button submit"> <span> Submit </span> </button>
                </div>
                </li>
              </ul>
            </fieldset>
          </div>
        </section>
        <aside class="col-right sidebar col-sm-3 wow bounceInUp animated">
          <div class="block block-company">
            <div class="block-title">Company </div>
            <div class="block-content">
              <ol id="recently-viewed-items">
                <li class="item odd"><a href="about_us.php">About Us</a></li>
                
                <li class="item  odd"><a href="#">Terms of Service</a></li>
                <li class="item even"><a href="#">Search Terms</a></li>
                <li class="item last"><strong>Contact Us</strong></li>
              </ol>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
  <!--End main-container --> 
  <!-- Footer -->
  <?php include 'footer.php';?>