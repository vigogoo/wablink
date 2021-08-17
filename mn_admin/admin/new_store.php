<?php
include "header.php";
?>
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
function load_substore_name(){ 
var yourSelect = document.getElementById( "store_name" );
store_name= yourSelect.options[ yourSelect.selectedIndex ].value;
//alert(store_name);
if(store_name!="store_name")
$('#substore_name').load('<?php echo $site_name; ?>/mn_admin/admin/loadsubstore_name.php?cat='+store_name);
}
</script>
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
<h3 class="form-title form-title-first"><i class="icon-user"></i> Add new store</h3>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
  <label>* Store Name</label>
  <input type="text" name="store_name" value="<?php echo isset($_POST['store_name'])?$_POST['store_name']:''; ?>" class="form-control" placeholder="Store name">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
  <label>* Business Type</label>
  <input type="text" name="business_type" value="<?php echo isset($_POST['business_type'])?$_POST['business_type']:''; ?>" class="form-control" placeholder="Business Type">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
  <label>* Contact Person</label>
  <input type="text" name="contact_person" value="<?php echo isset($_POST['contact_person'])?$_POST['contact_person']:''; ?>" class="form-control" placeholder="Contact Person">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
  <label>* Telephone</label>
    <input type="number" min="1" minlength="1" name="phone" value="<?php echo isset($_POST['phone'])?$_POST['phone']:''; ?>" class="form-control" placeholder="Telephone">
    </div>
  </div>
  
</div>

  <div class="row">
   
  <div class="col-md-6">
<div class="form-group">
  <label>* Email</label>
  <input type="text"id="pointspossible" name="email" value="<?php echo isset($_POST['email'])?$_POST['email']:''; ?>" class="form-control" placeholder="Email">
</div>
</div>



</div>
<div class="row" style="padding:10px">
<div class="form-group">
  <label>* Details</label>
  <textarea name="details" class="form-control" placeholder="Shop Description"><?php echo isset($_POST['details'])?$_POST['details']:''; ?></textarea>
</div>
</div>

<p id="status" style="color:red">
<?php
if(isset($_REQUEST['store_name'],$_REQUEST['business_type'],$_REQUEST['contact_person'],$_REQUEST['phone'],$_REQUEST['details'],$_REQUEST['email'])){
//var_dump($_POST); return;
$store_name = clean_data($_REQUEST['store_name']);
$business_type = clean_data($_REQUEST['business_type']);
$contact_person=clean_data($_REQUEST['contact_person']);
$phone=clean_data($_REQUEST['phone']);
$details=clean_data($_REQUEST['details']);
$email=clean_data($_REQUEST['email']);

if($store_name!="store_name"){	  
$sel=mysqli_query($conn,"SELECT * from business where business_name='$store_name'");
if(!mysqli_fetch_assoc($sel)){		
$s = mysqli_query($conn,"INSERT into business set telephone ='$phone',email='$email',business_type='$business_type',contact_person='$contact_person',description='$details',business_name='$store_name'");
//$cid=mysqli_insert_id($conn);
//mysqli_query($conn,"INSERT into business set store_name_id='$store_name',business_type_id='$business_type',item_id='$cid',size='$phone',email='$email',new_price='$new_price'");
if($s){
  echo 'Store added successfully.';
}


}else{
echo "Another store exists with the same details.";
}
}else{
echo 'All fields are required .
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
