<?php
session_start();
include("connect.php");
$_SESSION['page']="checkout";
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
  <section class="main-container col1-layout" id="forlink">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">
          <h2 style="color: #666">Secure Checkout</h2>
        </div>
        <fieldset class="col2-set">
          <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
$(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'place_order.php',
            data: $('form').serialize(),
            success: function (data) {
              document.getElementById('guest_check_out_status').innerHTML="";
            $("#guest_check_out_status").append(data);
            }
          });

        });

      });
    </script>      
          <div style="" class="col-1 new-users">
            <div class="content">
	<?php 
if($login_status=="guest"){
  ?>
			<b><span style="font-size:x-large">Checkout As A Guest</span><br/>
<a style="text-decoration:underline" href="login.php"><strong>Login If You Have Account</strong></a><br/><br/>
  </b>
              <p>We will need a few information from you. Dont be shy!</p>
<?php }else{ ?>
  <b><h3><?php echo $_SESSION['customer_name']; ?></h3></b>
              <p>Checkout now!</p>
<?php } ?>
              <form autocomplete="off" action="" id="guest_check_out" method="post">
			       <ul class="form-list">
                <li>
                 <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_name">Name <span class="required">*</span></label>
                    <input  name="name" class="form-control" value="<?php echo ($login_status=="customer")?$_SESSION['customer_name']:'';  ?>" type="text" placeholder="Your name" <?php echo ($login_status=="customer")?'readonly':'';  ?>>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_phone">Email <span class="required">*</span></label>
                    <input  name="emailx" class="form-control" value="<?php echo ($login_status=="customer")?$_SESSION['email']:'';  ?>" type="text" placeholder="Enter Email"  <?php echo ($login_status=="customer")?'readonly':'';  ?>>
                  </div>
                </div>
              </div>
                </li>
                   <li>
                 <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_name">Phone Contact <span class="required">*</span></label>
                    <input  name="contact" class="form-control" value="<?php echo ($login_status=="customer")?$_SESSION['contact']:'';  ?>" type="text" placeholder="Your Contact"  <?php echo ($login_status=="customer")?'readonly':'';  ?>>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_phone">Address</label>
                    <input  name="address" class="form-control" value="<?php echo ($login_status=="customer")?$_SESSION['address']:'';  ?>" type="text" placeholder="Your address"  <?php echo ($login_status=="customer")?'readonly':'';  ?>>
                  </div>
                </div>
              </div>
                </li>

                  <li>
                 <div class="form-group">
                <label for="form_name">Additional (Optional)</label>
                <textarea  name="instructions" class="form-control" rows="2" placeholder="Addition Instructions"></textarea>
              </div>
                </li>

                  <li>
                  <p id="guest_check_out_status"></p>
                  <p><input type="submit" value="Checkout Now" class="btn btn-success"></p></li>

              </ul>
              </form>
            </div>
          </div>
          <div class="col-2 registered-users">
            <div class="content">
			<b><h3>I'm A Returning Customer</h3></b>
              <p>To continue, please enter your email address and password that you use for your account.</p>
              <ul class="form-list">
                <li>
                  <label for="email">Email Address <span class="required">*</span></label>
                  <br>
                  <input type="text" title="Email Address" class="input-text required-entry" id="email" value="" name="login[username]">
                </li>
                <li>
                  <label for="pass">Password <span class="required">*</span></label>
                  <br>
                  <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="login[password]">
                </li>
              </ul>
              <p class="required">* Required Fields</p>
              <div class="buttons-set">
               <button type="button" class="button continue" onClick="billing.save()"><span>Continue</span></button>
                <a class="forgot-word" href="#">Forgot Your Password?</a> </div>
            </div>
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