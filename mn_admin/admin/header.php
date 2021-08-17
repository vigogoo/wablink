<?php
session_start();
$_SESSION['filter']="";
include("../../config.php");
include("../../connect.php");
//include("connect.php");
include("../../security.php");
if(isset($_REQUEST['logout'])){
session_destroy();
header("Location:../");
}
if(isset($_SESSION['ac_type'])){
$type=$_SESSION['ac_type'];
if($type=="admin"){
$admin_id=$_SESSION['admin_id'];
$sel=mysqli_query($conn,"select * from admin where admin_id='$admin_id'")or die(mysqli_error($conn));
$val=mysqli_fetch_assoc($sel);
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
<link rel='stylesheet' href='<?php echo $site_name; ?>/mn_admin/admin/3913bb86301e8d3ad3eafbc7832aaa8e.css'>
<!--
<link href='http://fonts.googleapis.com/css?family=Oswald:300,400,700|Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
-->
<link href='<?php echo $site_name; ?>/personalise.css' rel='stylesheet' type='text/css'>
<title>Mini price: Uganda</title>
</head>
<body onLoad="loadUpdates()">
<!--Notification sound-->
 
<!--Notification sound-->
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
<span style=""><img src="<?php echo $site_name; ?>/logo.png"  style="width: 200px"/></span>
</a>
<!--
<div class="search-box">
<input type="text" placeholder="SEARCH" class="form-control">
</div>-->
<ul class="side-menu">
<li class="active">
<a class="active" href="#0">
<i class=" icon-user"></i> <?php echo $user_name; ?>
</a>
</li>
</ul>
<style type="text/css">

</style>
<div class="relative-w">
<ul class="side-menu">
<li class='current'>
<a  class='current ccc' href="<?php echo $site_name; ?>/mn_admin/admin/">
<!--<span class="badge pull-right">17</span>-->
<i class=" icon-group"></i> My Business
</a>
</li>
<li>
<a href="<?php echo $site_name; ?>/mn_admin/admin/new_store/">
<span class="badge pull-right">+</span>
<i class="icon-user"></i> Add Stores
</a>
</li>
<li>
<a href="<?php echo $site_name; ?>/mn_admin/admin/business_items/">
<i class="icon-building"></i> My Products
</a>
</li>
<li>
<a href="<?php echo $site_name; ?>/mn_admin/admin/new_item.php">
<i class="icon-building"></i> Add Items
</a>
</li>

<li>
<a href="<?php echo $site_name; ?>/mn_admin/admin/settings/">
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


