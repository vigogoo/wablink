<?php
session_start();
include("connect.php");
include("security.php");
if(isset($_REQUEST['customer_id'])){
  $_SESSION['customer_id']=$_REQUEST['customer_id'];
  header("Location:change-profile.php");
}
if(isset($_SESSION['customer_id'])){
  $customer_id=$_SESSION['customer_id'];

}else{
  echo "<h1 style='color:red'>No Content Found";
  return;
}

$sel=mysql_query("SELECT *from customer  Where customer_id='$customer_id'") or die(mysql_error());
 $val=mysql_fetch_array($sel);

    
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
  <?php
if(isset($_REQUEST['name'],$_REQUEST['contact'],$_REQUEST['sex'],$_REQUEST['address'],$_REQUEST['customer_id'])){
              //var_dump($_POST); return;
    $name=clean_data($_REQUEST['name']);
    $contact=clean_data($_REQUEST['contact']);
    $sex=clean_data($_REQUEST['sex']);
   
    
    $address=clean_data($_REQUEST['address']);
   
   $customer_id=clean_data($_REQUEST['customer_id']);
   //var_dump($_REQUEST);return;
  if( $name &&  $contact && $sex && $customer_id && $address ){
      
  mysql_query("update customer set name='$name',contact='$contact',sex='$sex',address='$address' where customer_id='$customer_id'")or die("Operation failed");
 
  ?>
  
  <div class="alert alert-success alert-dismissable">
                  <i class="icon-check-sign"></i> <strong>Success!</strong> Details updated Successfully
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
  <?php
  }
  else{
  ?>
  <div class="alert alert-danger alert-dismissable">
                  <i class="icon-remove-sign"></i> <strong>Opps!</strong> Required fields missing
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
  <?php 
  }
}
?>
<?php
$sel=mysql_query("select * from customer where customer_id='$customer_id'")or die(mysql_error());
$val=mysql_fetch_array($sel);
?>
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">
          <h2>Edit Account Profile</h2>
        </div>
        <fieldset class="col2-set">
          <div class="col-2 registered-users">
            <div class="content">
              
              <ul class="form-list">
			  
			  <form method ='post'>
          <li>
            <label for="input-address">Address<span class="required">*</span></label>
            <br>
              <input type="text" name="address" value="<?php echo isset($val['address'])?$val['address']:''; ?>" placeholder="Address" id="input-address" class="input-text required-entry" />
            
          </li>
                <li>
                  <label for="password">Password <span class="required">*</span></label>
                  <br>
                  <input type="password" title="Your Password" class="input-text required-entry" id="email" value="" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </li>
                <li>
                  <label for="password">Confirm Password<span class="required">*</span></label>
                  <br>
                  <input type="password" title="Confirm Password" class="input-text required-entry" id="email" value="" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </li>
                
				
              </ul>
              
              
            </div>
          </div>
          <div class="col-2 registered-users" id="forlink"><strong>Your current Details</strong>
            <div class="content">
              
              <ul class="form-list">
			  <li>
            <label for="input-firstname">First Name<span class="required">*</span></label>
            <br>
              <input type="text" name="name" value="<?php echo isset($val['name'])?$val['name']:''; ?>" placeholder="Name" id="input-firstname" class="input-text required-entry" />
                          
          </li>
          
               <li>
            <label for="input-sex">Sex<span class="required">*</span></label>
            <br>
			<input type="text" name="sex" value="<?php echo isset($val['sex'])?$val['sex']:''; ?>" placeholder="Sex" id="input-sex" class="input-text required-entry" />
                     </li>  
				<li>
            <label for="input-telephone">Phone Contact</label>
             <br>
              <input type="tel" name="telephone" value="<?php echo isset($val['contact'])?$val['contact']:''; ?>" placeholder="Telephone" id="input-telephone" class="input-text required-entry" />
                          
          </li>
         
             
          
         
		  
		  </ul>
              
            </div>
          </div>
        </fieldset>
      </div>
	  <div class="buttons">
          <div class="pull-left">
                        
            <input type="submit" value="Update" class="btn" name ='register'/>
          </div>
        </div>
		</form>
		
		 <?php
         if (isset($_POST['register'])) {
                    $name = $_POST['name'];
                   
                    $tel = clean_data($_POST['telephone']);
                    $email = clean_data($_POST['email_address']);
                    $sex= clean_data($_POST['sex']);
                    $password=clean_data(sha1($_POST['password']));
                     $password2=clean_data(sha1($_POST['password2']));
                    $address= clean_data($_POST['address']);
										
						if($_POST['password'] && $_POST['password2']==$_POST['password']){
                    
                
					mysql_query("Update customer set name='$name',contact='$tel',email='$email',sex='$sex',password='$password',address='$address' where customer_id='$customer_id'") or die(mysql_error());
								echo "Account updated successfully!";	
                
            }else {
                echo "Password Mismatch!";
              }

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