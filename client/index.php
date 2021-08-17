<?php
session_start();
include("../admin/connect.php");
include("../admin/security.php");
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 

  <link rel='stylesheet' href='../admin/3913bb86301e8d3ad3eafbc7832aaa8e.css'>

  <link href='../personalise.css' rel='stylesheet' type='text/css'>
  <title>Just Deals</title>
</head>

<body bgcolor="#C90549">
<div class="all-wrapper no-menu-wrapper" style="background-color:#232f3e">
  <div class="login-logo-w">
    <a href="javascript:void(0)" style="text-shadow:none" class="logo">	
      <span style="">&nbsp;</span>
	<img src="../admin/deals.png" style="max-width:60px"/>
    <!-- <i class="icon-anchor"></i>-->
	
    </a>
  </div>
  <div class="row" style="background-color:#232f3e">
    <div class="col-md-4 col-md-offset-4">

      <div class="content-wrapper bold-shadow">
        <div class="content-inner">
          <div class="main-content main-content-grey-gradient no-page-header">
            <div class="main-content-inner">
            <form action="" method="post" role="form">
              <h3 class="form-title form-title-first"><i class="icon-lock"></i> Login</h3>
              <div class="form-group">
                <label>Email</label>
                <input type="text" id="Email" name="email"  class="form-control" placeholder="Email" required="required">
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
    if(isset($_REQUEST['email'],$_REQUEST['email'])){
      $email=clean_data($_REQUEST['email']);
      $pass=clean_data(sha1($_REQUEST['password']));
      include("../connect.php");
      $sel=mysql_query("select * from business where email='$email' && password='$pass'")or die(mysql_error());
      $val=mysql_fetch_array($sel);
        if($val){
          $_SESSION['ac_type']="admin";
        $_SESSION['bid']=$val['bid'];
       
        //header("Location:admin/");
        echo '<META http-equiv="refresh" content="0;URL=../admin/coupons.php"><img src="images/load.gif" />';

        }else{
        echo "Invalid username or password.";
        }
    }
    ?>
			  </p>
              <input type="submit" style="background-color:#232f3e" onClick="submit" class="btn btn-primary btn-lg" value="Login" />
              <!--<a href="index-2.html" class="btn btn-link">Cancel</a>-->
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div style="background:#232f3e; margin-bottom:0px; text-align:center; padding:10px; ">
<a href="http://www.justcreativemedia.com" style="color:#f7f7f7;text-decoration:none" target="_blank"><span style="font-size:large">Powered by &nbsp;&nbsp; <img style="background:#f7f7f7;border-radius:25px" src="just.png" width="40px" />  Just Creative Inc. </span>
</a>
  </div>
<script src="../admin/js/jquery.min.js"></script>
<script src="../admin/js/jquery-ui.min.js"></script>
<!--
<script src='admin/865b8229b0ce41d6b0c8e0fc7416f9f2.js'></script>-->
</body>

</html>