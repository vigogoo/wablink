<?php
include "header.php";
?>
<?php
$_SESSION['filter']="";
//delete crane
if(isset($_REQUEST['cmd'],$_REQUEST['order_id'])){
$order_id=$_REQUEST['order_id'];
$cmd=$_REQUEST['cmd'];
if($cmd=="seenItm"){
mysqli_query($conn,"UPDATE order_details set status='1'  where order_details_id = '$order_id'");
} elseif($cmd=="clearItm"){
mysqli_query($conn,"UPDATE order_details set status='2'  where  order_details_id = '$order_id'");
} elseif($cmd=="deleteItm"){
mysqli_query($conn,"DELETE from ordered_item where order_details_id = '$order_id'");      
mysqli_query($conn,"DELETE from order_details where order_details_id = '$order_id'");
}
$_SESSION['showmsg']="Yes";
header("Location:$site_name"."/mn_admin/admin/customerOrders/");
}


?>


<div class="col-md-9">
<?php
if(isset($_SESSION['showmsg'])){
if($_SESSION['showmsg']=="Yes"){
$_SESSION['showmsg']=""
?>    
<div class="alert alert-success alert-dismissable">
<i class="icon-check-sign"></i> <strong>Success!</strong> Operation completed successfully
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
<?php } }?>

<div class="content-wrapper">
<div class="content-inner">



<div class="page-header">
<div class="header-links hidden-xs">
<a href="?logout"><i style="color:#f7f7f7"  class="icon-signout"></i> Logout</a>
</div>
<p><i  class="icon-bar-chart"></i> So Cute UG</p>


<!--
Over lay
-->
<div id="overlayMain">
<div>
<p id="xyz" style="color:#FF0000"> </p>
<p align="right">&nbsp;&nbsp;&nbsp;
<i style="color:#993300;font-size:30px" onClick="overlay('overlayMain')" class="icon-remove"></i></p>
<p id="overlayM"><?php echo"Loading..."; ?></p>
</div>
</div>
<!--
Overlay
-->

</div>






<style type="text/css" >
body {
height:100%;
margin:0;
padding:0;
}
#overlayMain {
visibility: hidden;
position:fixed;
left: 0px;
top: 0px;
width:100%;
height:100%;
text-align:center;
z-index: 10;
background-color: rgba(0,0,0,0.5);
}
#overlayMain div {
width:50%;
height:80%;
overflow:auto;
margin: 2% auto;
background-color: #fff;
border:1px solid #000;
padding:15px;
text-align:center;
}
</style>
<div class="main-content">
<div class="widget">
<div class="widget-controls pull-right">               
</div>
<h3 class="section-title first-title"><i class="icon-tasks"></i> Notifications</h3>
<div class="row">
<a href="">
<div  class="col-lg-3 col-md-4 col-sm-6 text-center">
<div class="widget-content-blue-wrapper changed-up">
<div class="widget-content-blue-inner padded">
<div class="pre-value-block"><i class="icon-dashboard"></i> New Orders</div>
<div class="value-block">
  <div id="newOrders" class="value-self" style="color:#C90549">0</div>
  <div  class="value-sub">Today</div>
</div>
<span class="dynamicsparkline">Uncleared</span>
</div>
</div>
</div>
</a>

<a href="<?php echo $site_name; ?>/mn_admin/admin/unClearedOrdersPage/">
<div class="col-lg-3 col-md-4 col-sm-6 text-center">
<div class="widget-content-blue-wrapper changed-up">
<div class="widget-content-blue-inner padded">
<div class="pre-value-block"><i class="icon-user"></i> Uncleared Orders</div>
<div class="value-block">
  <div id="clearedOrders" style="color:#FF6600" class="value-self">0</div>
  <div class="value-sub">Today</div>
</div>
<span class="dynamicsparkline">Uncleared</span>
</div>
</div>
</div>
</a>

<a href="<?php echo $site_name; ?>/mn_admin/admin/soldItemsPage/">
<div class="col-lg-3 col-md-4 col-sm-6 text-center hidden-md">
<div class="widget-content-blue-wrapper changed-up">
<div class="widget-content-blue-inner padded">
<div class="pre-value-block"><i class="icon-signin"></i> Sold Items</div>
<div class="value-block">
  <div id="soldItems" style="color:#009900" class="value-self">0</div>
  <div class="value-sub">Today</div>
</div>
<span class="dynamicsparkline">Sold Items</span>
</div>
</div>
</div>
</a>
<div class="col-lg-3 col-md-4 col-sm-6 text-center">
<div class="widget-content-blue-wrapper changed-up">
<div class="widget-content-blue-inner padded">
<div class="pre-value-block"><i class="icon-money"></i> Total Sales</div>
<div class="value-block">
  <div id="totalSales" style="color:#003399" class="value-self">0/=</div>
  <div class="value-sub">Today</div>
</div>
<span class="dynamicbars">Sales made</span>
</div>
</div>
</div>
</div>

</div>
            <div class="widget">
              <p><i class="icon-table"></i> Uncleared Customer Orders</p>
              <div class="widget-content-white glossed">
                <div class="padded">
                <table class="table table-striped table-bordered table-hover datatable">
                  <thead>
                    <tr>
                      <th>&nbsp;</th>
                      <th>ID</th>
                      <th>CUSTOMER</th>
                      <th class="text-center">CONTACT</th>
                      <th class="text-center">LOCATION</th>
                      <th class="text-center">DATE</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
$selx=mysqli_query($conn,"SELECT * from order_details where status ='2'");
while($valx=mysqli_fetch_assoc($selx)){
	$order_details_id=$valx['order_details_id'];
	$name=$valx['customer_name'];
	$contact=$valx['contact'];
	$location=$valx['location'];
	$time=$valx['time'];
?>     <tr>
                      <td>&nbsp;</td>
                      <td><?php echo $order_details_id; ?></td>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $contact; ?></td>
                      <td class="text-center"><?php echo $location; ?></td>
                      <td class="text-center"><?php echo $time; ?></td>
            <td class="text-center">					  
            <a href="#" onClick="getOrderDetails('<?php echo $order_details_id;?>');overlay('overlayMain')" class="btn btn-success btn-xs">
						<i class="icon-archive"></i> Details</a>
                      </td>
                    </tr>

<?php
}
?>					
				 </tbody>
                </table>
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
