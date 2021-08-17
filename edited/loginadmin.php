<?php
session_start();
include("admin/connect.php");
include("admin/security.php");
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 

  <link rel='stylesheet' href='admin/3913bb86301e8d3ad3eafbc7832aaa8e.css'>

  <link href='personalise.css' rel='stylesheet' type='text/css'>
  <title>Just Deals</title>
</head>

<body bgcolor="#C90549">
<div class="all-wrapper no-menu-wrapper" style="background-color:#C90549">
  <div class="login-logo-w">
    <a href="javascript:void(0)" style="text-shadow:none" class="logo">	
      <span style="">&nbsp;</span>
	<img src="deals.png" style="max-width:60px"/>
    <!-- <i class="icon-anchor"></i>-->
	
    </a>
  </div>
  <div class="row" style="background-color:#C90549">
    <div class="col-md-4 col-md-offset-4">

      <div class="content-wrapper bold-shadow">
        <div class="content-inner">
          <div class="main-content main-content-grey-gradient no-page-header">
            <div class="main-content-inner">
            <form action="" method="post" role="form">
              <h3 class="form-title form-title-first"><i class="icon-lock"></i> Login</h3>
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
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
			  if(isset($_POST['username'],$_POST['password'])){
				  $username=clean_data($_POST['username']);
				   $password=clean_data(sha1($_POST['password']));
				   //admin
				   $sel=mysql_query("select * from admin where username='$username' && password='$password'")or die(mysql_error());
				   $val=mysql_fetch_array($sel);
				   
				   if($val){
					   $_SESSION['ac_type']="admin";
					   $_SESSION['admin_id']=$val['admin_id'];
					   //header("Location:admin/");
					   echo '<META http-equiv="refresh" content="0;URL=admin/"><img src="load.gif" />';
				   }else{
					   echo "Access denied: Invalid inputs";					 
				   }
			  }
			  ?>
			  </p>
              <input type="submit" style="background-color:#C90549" onClick="submit" class="btn btn-primary btn-lg" value="Login" />
              <!--<a href="index-2.html" class="btn btn-link">Cancel</a>-->
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

	<?php include "admin/footer.php"; ?>
<script src="admin/js/jquery.min.js"></script>
<script src="admin/js/jquery-ui.min.js"></script>
<!--
<script src='admin/865b8229b0ce41d6b0c8e0fc7416f9f2.js'></script>-->
</body>

</html>