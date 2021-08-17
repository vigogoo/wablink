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
<?php

if(isset($_REQUEST['cid'])){
  $agent_id=$_REQUEST['cid'];
 
}else{
  exit();
}
?>

    <div class="col-md-9">
<?php
if(isset($_REQUEST['item_name'],$_REQUEST['units'],$_REQUEST['details'],$_REQUEST['old_price'],$_REQUEST['new_price'],$_REQUEST['item_id'])){
							//var_dump($_POST); return;
	  $item_name=clean_data($_REQUEST['item_name']);
	  $units=clean_data($_REQUEST['units']);
	  $details=clean_data($_REQUEST['details']);
	  $old_price=clean_data($_REQUEST['old_price']);
	  $new_price=clean_data($_REQUEST['new_price']);
	 $item_id=clean_data($_REQUEST['item_id']);
   $item_details=clean_data($_REQUEST['description']);
   $availability=clean_data($_REQUEST['availability']);
	 //var_dump($_REQUEST);return;
  if( $item_name &&  $units && $details &&  $item_id && $old_price && $new_price && $old_price > $new_price){
			
	mysqli_query($conn,"UPDATE item set item_name='$item_name',details='$details',item_desc='$item_details',availability='$availability' where item_id='$item_id'");
	mysqli_query($conn,"UPDATE item_size set size='$units',old_price='$old_price',new_price='$new_price' where item_id='$item_id'");
	
	?>
	
	<div class="alert alert-success alert-dismissable">
                  <i class="icon-check-sign"></i> <strong>Success!</strong> Item updated Successfully
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
	<?php
	}
  else{
  ?>
  <div class="alert alert-danger alert-dismissable">
                  <i class="icon-remove-sign"></i> <strong>Opps!</strong> Required fields missing or new price should be less than old price.
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
  <?php	
  }
}
?>
<?php
$sel=mysqli_query($conn,"SELECT * from item i inner join item_size s on(i.item_id=s.item_id) where i.item_id='$agent_id'");
$val=mysqli_fetch_assoc($sel);
?>
      <div class="content-wrapper ">
        <div class="content-inner">
          <div class="page-header">
  <div class="header-links hidden-xs">
    <a href="?logout"><i class="icon-signout"></i> Logout</a>
  </div>
  <p><i class="icon-bar-chart"></i> &nbsp;  <?php echo $val['item_name'];?> </p>
</div>
       
    <div class="main-content">
            <div class="row">
              <div class="col-md-6" style="width:100%">
                <div class="widget">
                  <div class="widget-content-white glossed">
                    <div class="padded">
                      <form action="" role="form" method="post">
                       <input type="hidden" name="item_id" value="<?php echo $agent_id; ?>" />
                        <h3 class="form-title form-title-first"><i class="icon-user"></i> Edit Item</h3>
                         
						 <!--
						 <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>* Item Category</label>
                              <select id="category" onChange="load_subCategory()" type="text" name="category" class="form-control" > 
							  <option>Category</option>
							  <?php
							  //$sel=mysql_query("select * from category")or die(mysql_error());
							  //while($val=mysql_fetch_array($sel)){
							?>
							<option value="<?php //echo $val['category_id'];?>"><?php //echo $val['category_name'];?></option>
							  <?php //} ?>
							  </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>* Sub Category</label>
							  <span id="subcategory">
                              <select   name="sub_category" class="form-control" > 
							  <option>Sub Category</option>
							  </select>
							  </span>
                            </div>
                          </div>
                        </div> -->

<!-- ITEM PHOTOS -->
<div class="row" style="margin-bottom:10px;text-align:center">
       <?php 
       $selx= mysqli_query($conn,"SELECT * from item_photo where item_id='$val[item_id]'");
       while($valx=mysqli_fetch_assoc($selx)){          
              ?>            
             <a style="margin-left:10px"  href="#" onClick="load_preview('<?php echo  $valx['photo_name']; ?>')"> 
        <img onClick="load_preview('<?php echo  $valx['photo_name']; ?>')"  src="<?php echo $site_name; ?>/images/products/<?php echo str_replace(".","_thumb.",$valx['photo_name']);  ?>"   style="border:3px solid #CCCCCC;width:150px" />            
           </a> 
      <?php } ?>
      
      </div>
						
						<div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                          <label>* Product Name</label>
                          <input type="text" name="item_name" value="<?php echo isset($val['item_name'])?$val['item_name']:''; ?>" class="form-control" placeholder="Item name">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                          <label>* Units</label>
                            <input type="text" name="units" value="<?php echo isset($val['size'])?$val['size']:''; ?>" class="form-control" placeholder="Measurements">
                            </div>
                          </div>
                        </div>
						
                          <div class="row">
                          <div class="col-md-6">
						 <div class="form-group">
                          <label>* Old Price</label>
                          <input type="number" name="old_price" value="<?php echo isset($val['old_price'])?$val['old_price']:''; ?>" class="form-control" placeholder="Old Price">
                        </div>
						</div>
						
                          <div class="col-md-3">
						                   <div class="form-group">
                          <label>* New Price</label>
                          <input type="number" name="new_price" value="<?php echo isset($val['new_price'])?$val['new_price']:''; ?>" class="form-control" placeholder="New Price">
                                 </div>
						              </div>

                           <div class="col-md-3">
                               <div class="form-group">
                          <label>* In stock</label>
                          <select name="availability" class="form-control">
                          <option value="">
                            <?php echo isset($val['availability'])?$val['availability']:''; ?>
                              
                            </option> 
                          <option value="0">In stock</option>
                          <option value="1">Currently unavailable</option>
                           </select>
                                 </div>
                          </div>
						</div>
						<div class="row" style="padding:10px">
						<div class="form-group">
                          <label>* Overview</label>
                          

                          <input type="text" name="details" value="<?php echo isset($val['details'])?$val['details']:''; ?>" class="form-control" placeholder="Product Overview" style="height: 150px">
                        </div>
						</div>
            <div class="row" style="padding:10px">
            <div class="form-group">
                          <label>* Product Description</label>
                          <textarea name="description" class="form-control" placeholder="Product Description" style="width:100%; height:150px"><?php echo isset($val['item_desc'])?$val['item_desc']:''; ?></textarea>
                        </div>
            </div>
                       
                       <input type="submit" class="btn btn-primary" value="Update Item" />  &nbsp;
                       <input type="button" onClick="replace_image(<?php echo $val['item_id'];?>)" class="btn btn-success" value="Add Product photo" />
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


<script type="text/javascript">
function replace_image(id){  openNav('<?php echo $site_name; ?>/mn_admin/admin/upload/replace_image.php?crane_id='+id);
	/*document.getElementById("overlay").style="visibility:visible";
	document.getElementById("image_change_div").innerHTML='<iframe src="<?php echo $site_name; ?>/mn_admin/admin/upload/replace_image.php?crane_id='+id+'" style="border:none;min-height:100%;height:100%;padding:0px;margin:0px;"  width="100%" height="100%"></iframe>'; */
	}
function close_overlay(){
							document.getElementById("overlay").style="visibility:invisible";
	}
				
         function load_preview(photo_name){
   //alert(photo_id);return;
  // document.getElementById("ri-grid").style.visibility = "hidden";
   document.getElementById("overlay").style.visibility = "visible"; 
  document.getElementById("image_change_div").innerHTML="<div style='position:relative;height: 100%;  overflow: hidden;'><img style='position:absolute;left:0;right:0;top:40px;margin:auto;max-height:100%' src='<?php echo $site_name; ?>/images/products/"+photo_name+"' /><div>"; 
 }
 			
							
</script>
        
			<style type="text/css">
	
#image_change_div{
margin:auto;
width:100%;
height:100%;
margin-top:10px;
overflow:visible;
}
			</style>
			<style type="text/css">
	::-webkit-scrollbar {
    width: 1px;
	}
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 1px rgba(0,0,0,0.9); 
    border-radius: 1px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 1px;
    -webkit-box-shadow: inset 0 0 1px rgba(0,0,0,0.9); 
}

	</style>
		<div id="overlay">
      <div id="image_change_div" style="background-color:rgba(0,0,0,0.5)"> 
      
      </div>
      <p style="text-align:center;  position:fixed;left:10px;top:20px;width:50px; background-color:#666666; border-radius:25px;" onClick="close_overlay()"><a onClick="close_overlay()" href="#"><span><i style="color:#eeeeee;font-size:30px" class="icon-remove"></i></span></p>
</div> 
 <style type="text/css">
#overlay{
    position: fixed;
  visibility:hidden;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    opacity: 1;
    z-index: 10000;
}
#image_change_div{
margin:auto;
width:100%;
height:100%;
margin-top:0px;
overflow:visible;
}
</style>


<?php include "footer.php";?>
<?php include "popup.php"; ?>