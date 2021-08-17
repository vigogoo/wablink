<?php
include'connect.php';
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
          <h2>Register Account</h2>
        </div>
        <fieldset class="col2-set">
          <div class="col-2 registered-users">
            <div class="content">
              
              <ul class="form-list">
			  
			  <form method ='post'>
          <li>
            <label for="input-address">Address<span class="required">*</span></label>
            <br>
              <input type="text" name="address" value="" placeholder="Address" id="input-address" class="input-text required-entry" />
            
          </li>
		  <li>
            <label for="input-location">Location </label>
            <br>
              <input type="text" name="location" value="" placeholder="Location" id="input-location" class="input-text required-entry" />
            
          </li>
          
             <li>
                  <label for="email">Email Address <span class="required">*</span></label>
                  <br>
                  <input type="text" title="Email Address" class="input-text required-entry" id="email" value="" name="email_address">
                </li>
                <li>
                  <label for="pass">Password <span class="required">*</span></label>
                  <br>
                  <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="password">
                </li>
				
              </ul>
              
              
            </div>
          </div>
          <div class="col-2 registered-users" id="forlink"><strong>Your Personal Details</strong>
            <div class="content">
              <p>If you already have an account with us, please log in at the <a href="login.php" style="color:#3399FF">login</a> page.</p>
              <ul class="form-list">
			  <li>
            <label for="input-firstname">First Name<span class="required">*</span></label>
            <br>
              <input type="text" name="firstname" value="" placeholder="First Name" id="input-firstname" class="input-text required-entry" />
                          
          </li>
          <li>
            <label for="input-lastname">Last Name<span class="required">*</span></label>
            <br>
			<input type="text" name="lastname" value="" placeholder="Last Name" id="input-lastname" class="input-text required-entry" />
                     </li>  
               <li>
            <label for="input-sex">Sex<span class="required">*</span></label>
            <br>
			<input type="text" name="sex" value="" placeholder="Sex" id="input-sex" class="input-text required-entry" />
                     </li>  
				<li>
            <label for="input-telephone">Telephone</label>
             <br>
              <input type="tel" name="telephone" value="" placeholder="Telephone" id="input-telephone" class="input-text required-entry" />
                          
          </li>
         
             
          
         
		  
		  </ul>
              
            </div>
          </div>
        </fieldset>
      </div>
	  <div class="buttons">
          <div class="pull-left">
                        <input type="checkbox" name="agree" value="1" />
                        &nbsp;I have read and agreed to the <a href="privacy_policy.php" class="agree"><b>Privacy Policy</b></a> <br/><br/>
            <input type="submit" value="Submit" class="btn" name ='register'/>
          </div>
        </div>
		</form>
		
		 <?php
                                    if (isset($_POST['register'])) {

                                        $firstname = $_POST['firstname'];
										$lastname = $_POST['lastname'];
										$tel = $_POST['telephone'];
										$email = $_POST['email_address'];
										$sex= $_POST['sex'];
										$password= $_POST['password'];
										$location= $_POST['location'];
										$address= $_POST['address'];
										$fullname = $firstname.' '.$lastname;
										
										
					mysql_query("insert into customer(name,contact,email,sex,password,location,address)   
					values ('$fullname','$tel','$email',$sex,'$password',$location,$address)")or die(mysql_error());
									}
					?>
					

					  
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