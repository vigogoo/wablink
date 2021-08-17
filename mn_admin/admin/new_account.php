<?php
session_start();
include("connect.php");
include("security.php");
include("mail.php");
if(isset($_REQUEST['logout'])){
	session_destroy();
	header("Location:../");
}
if(isset($_SESSION['ac_type'])){
	$type=$_SESSION['ac_type'];
	if($type=="admin"){
		$admin_id=$_SESSION['admin_id'];
		$sel=mysql_query("select * from admin where admin_id='$admin_id'")or die(mysql_error());
		$val=mysql_fetch_array($sel);
		$user_name=$val['name'];	
	}
}else{
	echo "<h1 style='color:red'>ACCESS DENIED</h1><a href='../'>BACK</a>";
	return;
}
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href='3913bb86301e8d3ad3eafbc7832aaa8e.css'>
  <!--
  <link href='http://fonts.googleapis.com/css?family=Oswald:300,400,700|Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
  -->
   <link href='../personalise.css' rel='stylesheet' type='text/css'>
  <title>Just deals</title>
</head>
<body>
<div class="all-wrapper">
  <div class="row">
    <div class="col-md-3">
      <div class="text-center">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
</div>


<div style="color:#464646" class="side-bar-wrapper collapse navbar-collapse navbar-ex1-collapse">
<a href="JavaScript:void(0)" style="color:#464646;text-decoration:none" class="logo hidden-sm hidden-xs">
    <!--<i class="icon-anchor"></i>-->
    <span style=""><img src="deals.png" style="max-width:80px" /></span>
  </a>
  <!--
  <div class="search-box">
    <input type="text" placeholder="SEARCH" class="form-control">
  </div>-->
  <ul class="side-menu">
    <li class="active">
      <a class="active" href="JavaScript:void(0)">
        <i class=" icon-user"></i> <?php echo $user_name; ?>
      </a>
    </li>
  </ul>
  <style type="text/css">

  </style>
  <div class="relative-w">
    <ul class="side-menu">
      <li>
        <a href="index.php">
          <!--<span class="badge pull-right">17</span>-->
          <i class=" icon-group"></i> Businesses
        </a>
      </li>
      <li class='current'>
        <a href="new_account.php">
		<span class="badge pull-right">+</span>
          <i class="icon-user"></i> New Business
        </a>
    </li>
     <li>
        <a href="items.php">
          <i class="icon-building"></i> Items
        </a>
      </li>
     
      <li>
        <a href="settings.php">
          <i class="icon-cogs"></i> Settings
        </a>
      </li>
      <li>
        <a href="?logout">
          <i class="icon-lock"></i> Sign out
        </a>
      </li>
    </ul>
  
  </div>
</div>
    </div>
    <div class="col-md-9">

      <div class="content-wrapper">
        <div class="content-inner">
          <div class="page-header">
  <div class="header-links hidden-xs">
    <a href="?logout"><i class="icon-signout"></i> Logout</a>
  </div>
  <h1><i class="icon-bar-chart"></i> Dashboard</h1>
</div>
       
    <div class="main-content">
            <div class="row" >
              <div class="col-md-6" style="width:100%">
                <div class="widget">
                  <div class="widget-content-white glossed">
                    <div class="padded">
                      <form action="" role="form" method="post">
                       
                        <h3 class="form-title form-title-first"><i class="icon-user"></i> Add New Business</h3>
                      
					  <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Busness type</label>
                              <select type="text" name="business_type" class="form-control" > 
							  <?php echo isset($_POST['business_type'])?"<option>".$_POST['business_type']."</option>":''; ?>
							  <?php
							  $sel=mysql_query("select * from business_type")or die(mysql_error());
							  while($val=mysql_fetch_array($sel)){
							?>
							<option><?php echo $val['business_type'];?></option>
							  <?php } ?>
							  </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Business name</label>
                              <input type="text" name="business_name" value="<?php echo isset($_POST['business_name'])?$_POST['business_name']:''; ?>" class="form-control" placeholder="Business name">
                            </div>
                          </div>
                        </div>
						
						  <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Contact Person</label>
                              <input type="text" name="contact_person" value="<?php echo isset($_POST['contact_person'])?$_POST['contact_person']:''; ?>" class="form-control" placeholder="Contact Person">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Telephone</label>
                              <input type="number" name="telephone" value="<?php echo isset($_POST['telephone'])?$_POST['telephone']:''; ?>" class="form-control" placeholder="Telephone">
                            </div>
                          </div>
                        </div>
						
						
						<div class="row">
                        <div class="col-md-6">
						 <div class="form-group">
                          <label> Email</label>
                          <input type="email" name="email" value="<?php echo isset($_POST['email'])?$_POST['email']:''; ?>" class="form-control" placeholder="Enter email">
						  </div>
                        </div>
						 <div class="col-md-6">
						  <div class="form-group">
                          <label>Description</label>
                          <textarea name="description" class="form-control" placeholder="Business description"><?php echo isset($_POST['description'])?$_POST['description']:''; ?></textarea>
						  </div>
                        </div>
						</div>
						<div>
						<p id="status" style="color:red">
						<?php
						if(isset($_POST['business_type'],$_POST['telephone'],$_POST['email'],$_POST['business_name'],$_POST['contact_person'],$_POST['description'])){
							//var_dump($_POST); return;
							$business_type=clean_data($_POST['business_type']);
							$telephone=clean_data($_POST['telephone']);
							$email=clean_data($_POST['email']);
							$business_name=clean_data($_POST['business_name']);
							$contact_person=clean_data($_POST['contact_person']);							
							$description=clean_data($_POST['description']);
							if($business_type && $telephone && $email && $business_name && $description && $contact_person){
								$sel=mysql_query("select * from business where telephone='$telephone' or email='$email'")or die(mysql_error());
								if(mysql_fetch_assoc($sel)){
									echo "Another business exists with the same telephone or email.";
								}else{
									  $code=generateCode();
									mysql_query("insert into business set business_type='$business_type',email='$email',telephone='$telephone',business_name='$business_name',contact_person='$contact_person',description='$description',activation_code='$code',status='0'")or die(mysql_error());
									/*
									$sender="info@justdealsug.com";
	$rec=$email;
	$subject="Just Deals Uganda code";
	$message="Your Activation code is: ".$code;
	$contact=" Crane Finder Support.<br/><br/> <a  href='tel:(256)704367396'>256704367396&nbsp</a> ";
		$sent=send_mail($sender,$rec,$subject,$message,$contact);
								  echo "Account registered successfully. Activation code sent to: ".$email;*/
								  echo "Business added successfully.";
								}
							}else{
								echo "All fields are required.";
							}
						}
						
						
						
						//generate code
function generateCode(){
	$length = 4;
	$characters = '0123456789';		
	$string = "";    
	for ($p = 0; $p < $length; $p++) 
	{
		$string .= $characters[mt_rand(2, strlen($characters)-1)];
	}
	$tim= "";
	$final_str= $string.$tim;
	return $final_str;
	}
						?></p>
                       <input style="margin-left:30px; background-color:#16a085;" type="submit" id="submit" class="btn btn-primary" value="Add Business" />
					   </div>
                      </form>
					  <script type="text/javascript">
					  function validate(){
						  var p1=document.getElementById('password').value;
						   var p2=document.getElementById('password2').value;
						  if(p1 != p2){
							  document.getElementById('status').innerHTML="Passwords missmatch";
						  }else{
							  document.getElementById('submit').type="Submit";
							  //submit();
						  }
					  }
					  </script>
                    </div>
                    <div class="col-md-6">
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          </div>
      </div>

    </div>
  </div>
</div>

</div>
  <?php include "footer.php";?>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>

<script src='865b8229b0ce41d6b0c8e0fc7416f9f2.js'></script>

<script src='67b4d81b44effbc5e221a119f719782b.js'></script>
<!--
<script src='865b8229b0ce41d6b0c8e0fc7416f9f2.js'></script>
<script src='15a0b84663e72cbef64a7b3ee6cd86b8.js'></script>
-->

</body>
</html>