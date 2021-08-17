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
<body onload="whizzywig()">
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
<head>
 
 
  
  <script type="text/javascript" src="whizzywig.js"></script>
</head>
<div class="col-md-9">
<?php
$sel=mysqli_query($conn,"SELECT * from business");
$val=mysqli_fetch_assoc($sel);
$agent_id=$val['bid'];
?>
<div class="content-wrapper">
<div class="content-inner">
<div class="page-header">
<div class="header-links hidden-xs">
<a href="?logout"><i class="icon-signout"></i> Logout</a>
</div>
<p style="font-size:large"><i class="icon-bar-chart"></i> <?php echo $val['business_name']." ".$val['telephone'];?></p>
</div>
<script type="text/javascript">
function load_subCategory(){ 
var yourSelect = document.getElementById( "category" );
category= yourSelect.options[ yourSelect.selectedIndex ].value;
//alert(category);
if(category!="Category")
$('#subcategory').load('<?php echo $site_name; ?>/mn_admin/admin/loadsubcategory.php?cat='+category);
}
</script>
<script type="text/javascript" src="whizzywig.js"></script>

<body onload="whizzywig()">
<div class="main-content">
<div class="row">
<div class="col-md-6" style="width:100%">
<div class="widget">
<div class="widget-content-white glossed">
<div class="padded">
<form action="" role="form" method="post">

  <input type="hidden" name="latitude" value="0"/>

  <input type="hidden" name="longitude" value="0" />
<input type="hidden" name="account_id" value="<?php echo $val['bid']; ?>" />
<h3 class="form-title form-title-first"><i class="icon-user"></i> Add new item</h3>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label>* Item Category</label>
      <select id="category" onChange="load_subCategory()" type="text" name="category" class="form-control" > 
<option>Category</option>
<?php
$sel=mysqli_query($conn,"SELECT * from category");
while($val=mysqli_fetch_assoc($sel)){
?>
<option value="<?php echo $val['category_id'];?>"><?php echo $val['category_name'];?></option>
<?php } ?>
</select>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>* Sub Category</label>
<span id="subcategory">
  <select  name="sub_category" class="form-control" > 
<option>Sub Category</option>
</select>
</span>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-3">
    <div class="form-group">
  <label>* Product Name</label>
  <input type="text" name="item_name" value="<?php echo isset($_POST['item_name'])?$_POST['item_name']:''; ?>" class="form-control" placeholder="Item name">
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
  <label>* Units</label>
    <input type="text" name="units" value="<?php echo isset($_POST['units'])?$_POST['units']:''; ?>" class="form-control" placeholder="Measurements">
    </div>
  </div>
  
</div>

  <div class="row">
  <div class="col-md-3">
<div class="form-group">
  <label>* Old Price</label>
  <input type="number" min="1" minlength="1" id="pointspossible" name="old_price" value="<?php echo isset($_POST['old_price'])?$_POST['old_price']:''; ?>" class="form-control" placeholder="Old Price">
</div>
</div>

<div class="col-md-3">
<div class="form-group">
  <label>* New Price</label>
  <input type="number" min="1" minlength="1" id="pointsgiven" name="new_price" value="<?php echo isset($_POST['new_price'])?$_POST['new_price']:''; ?>" class="form-control" placeholder="New Price">
</div>
</div>

 <div class="col-md-3">
    <div class="form-group">
  <label>* Store Name</label>
  <select name="store_name" class="form-control">
    <option disabled>Store Name</option>
    <?php
$sel=mysqli_query($conn,"SELECT * from business");
while($val=mysqli_fetch_assoc($sel)){
?>
<option value="<?php echo $val['bid'];?>"><?php echo $val['business_name'];?></option>
<?php } ?>
  </select>
    </div>
  </div>

</div>
<div class="row" style="padding:10px">
<div class="form-group">
  <label>* Overview</label>
 
   <input type="text" name="details" value="<?php echo isset($_POST['details'])?$_POST['details']:''; ?>" class="form-control" placeholder="Details" style="height: 150px">
</div>
</div>
<div class="row" style="padding:10px">
<div class="form-group">
  <label>* Item Description</label>
  <textarea name="item_desc" class="form-control" placeholder="Item Description" style="width:100%; height:150px"><?php echo isset($_POST['item_desc'])?$_POST['item_desc']:''; ?></textarea>


</div>
</div>

<p id="status" style="color:red">
<?php
if(isset($_REQUEST['category'],$_REQUEST['sub_category'],$_REQUEST['item_name'],$_REQUEST['units'],$_REQUEST['details'],$_REQUEST['old_price'],$_REQUEST['new_price'])){
//var_dump($_POST); return;
$category = clean_data($_REQUEST['category']);
$sub_category = clean_data($_REQUEST['sub_category']);
$item_name=clean_data($_REQUEST['item_name']);
$units=clean_data($_REQUEST['units']);
$details=clean_data($_REQUEST['details']);
$old_price=clean_data($_REQUEST['old_price']);
$new_price=clean_data($_REQUEST['new_price']);
$storename=clean_data($_REQUEST['store_name']);
$itemdesc=clean_data($_REQUEST['item_desc']);


if($category!="Category" && $sub_category!="Sub Category" && $item_name &&  $units && $details  && $old_price && $new_price && $old_price > $new_price ){   
$sel=mysqli_query($conn,"SELECT * from item where (category_id='$category' && sub_category_id='$sub_category') && item_name='$item_name'  && bid='$agent_id'");
if(!mysqli_fetch_assoc($sel)){    
mysqli_query($conn,"INSERT into item set category_id='$category',sub_category_id='$sub_category',item_name='$item_name',details='$details',bid='$agent_id',store_name='$storename',item_desc='$itemdesc'");
$cid=mysqli_insert_id($conn);
mysqli_query($conn,"INSERT into item_size set category_id='$category',sub_category_id='$sub_category',item_id='$cid',size='$units',old_price='$old_price',new_price='$new_price'");


if($cid){
  echo 'New item added successfully.';

}
}else{
echo "Another item exists with the same details.";
}
}else{
echo 'All fields are required and New price should be less than old price.
';  
}
}



?></p>
<input  type="submit" class="btn btn-primary" value="Save Item" />
</form>

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


<?php include "footer.php";?>