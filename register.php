<?php
include'connect.php';
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
          <h2>Register Account</h2>
        </div>
        <fieldset class="col2-set">
          <div class="col-2 registered-users">
            <div class="content">
              
              <ul class="form-list">
			  
			  <form method ='post' autocomplete="false">
          <li>
            <label for="input-address">Address<span class="required">*</span></label>
            <br>
              <input type="text" name="address" value="<?php echo isset($_POST['address'])? $_POST['address'] : '';  ?>" placeholder="Address" id="input-address" class="input-text required-entry" />
            
          </li>
		  
          
             <li>
                  <label for="email">Email Address <span class="required">*</span></label>
                  <br>
                  <input type="email" title="Email Address" class="input-text required-entry" id="email" value="<?php echo isset($_POST['email_address'])? $_POST['email_address'] : '';  ?>" name="email_address">
                </li>
                <li>
                  <label for="pass">Password <span class="required">*</span></label>
                  <br>
                  <input type="password" id="pass" class="input-text required-entry validate-password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </li>
                <li>
                  <label for="pass">Confirm Password <span class="required">*</span></label>
                  <br>
                  <input type="password" id="pass" class="input-text required-entry validate-password" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </li>
				
              </ul>
              
              
            </div>
          </div>
          <div class="col-2 registered-users" id="forlink"><strong>Your Personal Details</strong>
            <div class="content">
              <p>If you already have an account with us, please log in at the <a href="login.php" style="color:#3399FF">login</a> page.</p>
              <ul class="form-list">
			  <li>
            <label for="input-firstname">Name<span class="required">*</span></label>
            <br>
              <input type="text" name="name" value="<?php echo isset($_POST['name'])? $_POST['name'] : '';  ?>" placeholder="First Name" id="input-firstname" class="input-text required-entry" />
                          
          </li>
        <!--  <li>
            <label for="input-lastname">Last Name<span class="required">*</span></label>
            <br>
			<input type="text" name="lastname" value="" placeholder="Last Name" id="input-lastname" class="input-text required-entry" />
                     </li>  -->
               <li>
            <label for="input-sex">Sex<span class="required">*</span></label>
            <br>
			<input type="text" name="sex" value="<?php echo isset($_POST['sex'])? $_POST['sex'] : '';  ?>" placeholder="Sex" id="input-sex" class="input-text required-entry" />
                     </li>  
				<li>
            <label for="input-telephone">Telephone</label>
             <br>
              <input type="tel" name="telephone" value="<?php echo isset($_POST['telephone'])? $_POST['telephone'] : '';  ?>" placeholder="Telephone" id="input-telephone" class="input-text required-entry" />
                          
          </li>
         
             
          
         
		  
		  </ul>
              
            </div>
          </div>
        </fieldset>
      </div>
<div style="padding-left:  40px; font-weight: bold;">
   <?php
if (isset($_POST['register'],$_POST['password'],$_POST['password2'],$_POST['email_address'])) {

                                        $fullname = $_POST['name'];
                   
                    $tel = clean_data($_POST['telephone']);
                    $email = clean_data($_POST['email_address']);
                    $sex= clean_data($_POST['sex']);
                    $password=clean_data(sha1($_POST['password']));
                     $password2=clean_data(sha1($_POST['password2']));
                    $address= clean_data($_POST['address']);
                    if($_POST['password'] && $_POST['password2']==$_POST['password']){
                    
                if($fullname && $tel && $email && $sex && $address){  

$sel=mysql_query("select * from customer where email='$email'") or die(mysql_error());
if(mysql_num_rows($sel)>0){

  echo "Account already exists. Please login if you have an account.";

}else{
          mysql_query("insert into customer(name,contact,email,sex,password,address)   
          values ('$fullname','$tel','$email','$sex','$password','$address')")or die(mysql_error());
          echo "Account registered successfully!";

}
                  } else{
                    echo "Required Fields Missing!";
                  }
                }else {
                echo "Password Mismatch!";
              }
              } 
          ?>

</div>




	  <div class="buttons">



          <div class="pull-left">
                      <!--  <input type="checkbox" name="agree" value="1" />
                        &nbsp;I have read and agreed to the <a href="privacy_policy.php" class="agree"><b>Privacy Policy</b></a>--> <br/><br/>
            <input type="submit" value="Submit" class="btn btn-success" name ='register'/>
          </div>
        </div>
		</form>

		 

					  
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