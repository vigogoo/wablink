<?php
include "header.php";
?>
<script type="text/javascript" src="whizzywig.js"></script>
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
   <div class="col-md-6">
    <div class="form-group">
  <label>* Colors</label>
   <input type="text" name="color" value="<?php echo isset($_POST['color'])?$_POST['color']:''; ?>" class="form-control" placeholder="Colors">
  
    </div>
  </div>
     <!--div class="col-md-3">
    <div class="form-group">
  <label>* Uses Cup Size</label>
  <select name="cup_size" class="form-control">
    <option disabled>Uses Cup size</option>
    <option value="1">Yes</option>
    <option value="0">No</option>
  </select>
    </div>
  </div-->
</div>

  <div class="row">
    <div class="col-md-3">
    <div class="form-group">
  <label>* Uses Size</label>
  <select name="pant_size" class="form-control">
    <option disabled>Uses size</option>
    <option value="1">Yes</option>
    <option value="0">No</option>
  </select>
    </div>
  </div>
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
  <label>* Details</label>
  <textarea name="details" class="form-control" placeholder="Product Description"><?php echo isset($_POST['details'])?$_POST['details']:''; ?></textarea>
</div>
</div>
<div class="row" style="padding:10px">
<div class="form-group">
  <label>* Item Description</label>
  <textarea name="item_desc" class="form-control" placeholder="Item Description" cols="50" rows="10" style="width:100%; height:150px"><?php echo isset($_POST['item_desc'])?$_POST['item_desc']:''; ?></textarea>
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

//$cup_size=clean_data($_REQUEST['cup_size']);
$color=clean_data($_REQUEST['color']);
//$pant_size=clean_data($_REQUEST['pant_size']);
$storename=clean_data($_REQUEST['store_name']);
$itemdesc=clean_data($_REQUEST['item_desc']);


if($category!="Category" && $sub_category!="Sub Category" && $item_name &&  $units && $details  && $old_price && $new_price && $old_price > $new_price ){	  
$sel=mysqli_query($conn,"SELECT * from item where (category_id='$category' && sub_category_id='$sub_category') && item_name='$item_name'  && bid='$agent_id'");
if(!mysqli_fetch_assoc($sel)){		
mysqli_query($conn,"INSERT into item set color='$color',category_id='$category',sub_category_id='$sub_category',item_name='$item_name',details='$details',bid='$agent_id',store_name='$storename',item_desc='$itemdesc'");
$cid=mysqli_insert_id($conn);
mysqli_query($conn,"INSERT into item_size set category_id='$category',sub_category_id='$sub_category',item_id='$cid',size='$units',old_price='$old_price',new_price='$new_price'");


echo 'New item added successfully.';
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
