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
                <label>Email</label>
                <input type="email" name="user_name" class="form-control" placeholder="Enter Username">
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
			  if(isset($_POST['user_name'],$_POST['password'])){
				  $user_name=clean_data($_POST['user_name']);
				   $password=clean_data(sha1($_POST['password']));

           //var_dump($_POST);
           //exit();

				   //admin
				   $sel=mysql_query("select * from customer where email='$user_name' && password='$password'")or die(mysql_error());
				   $val=mysql_fetch_array($sel);
				   
				   if($val){
					   $_SESSION['ac_type']="customer";
					   $_SESSION['customer_id']=$val['customer_id'];
					   $_SESSION['customer_name']=$val['name'];
					    $_SESSION['contact']=$val['contact'];
						 $_SESSION['email']=$val['email'];
						  $_SESSION['address']=$val['address'];
              $_SESSION['password']=$val['password'];
					   //header("Location:admin/");
					   if($_SESSION['page']=="checkout"){
					   echo '<META http-equiv="refresh" content="0;URL=checkout.php"><img src="load.gif" />';
              }
					   else{
					   	 echo '<META http-equiv="refresh" content="0;URL=index.php"><img src="load.gif" />';
					   }
				   }else{
					   echo "Access denied: Invalid inputsx";					 
				   }
			  }
			  ?>
			  </p>
              <input type="submit" style="background-color:#C90549" onClick="submit" class="btn btn-primary btn-lg" value="Login" />
              <!--<a href="index.php" class="btn btn-link">Cancel</a>-->
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