<?php
include "header.php";
?>


<div class="col-md-9">
<div class="content-wrapper">
<div class="content-inner">
<div class="page-header">
<div class="header-links hidden-xs">
<a href="?logout"><i style="color:#f7f7f7"  class="icon-signout"></i> Logout</a>
</div>
<p><i  class="icon-bar-chart"></i> Mini price  

<span id="newOrders2"></span>
</p>




</div>


<div class="main-content">
<div class="widget">
<div class="widget-controls pull-right">               
</div>
<p><i class="icon-tasks"></i> Notifications</p>
<div class="row">
<a href="<?php echo $site_name; ?>/mn_admin/admin/customerOrders/">
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
<p><i class="icon-table"></i> My Business</p>
<div class="widget-content-white glossed">
<div class="padded">
<table class="table table-striped table-bordered table-hover datatable">
<thead>
<tr>
<th>&nbsp;</th>
<th>ID</th>
<th>NAME</th>
<th>CONTACT</th>
<th>EMAIL</th>
<th>BUSINESS TYPE</th>
<th></th>
</tr>
</thead>
<tbody>
<?php 
$selx=mysqli_query($conn,"select * from business");
while($valx=mysqli_fetch_assoc($selx)){
$id=$valx['bid'];
$name=$valx['business_name'];
$contact=$valx['telephone'];
$email=$valx['email'];
$business_type=$valx['business_type'];
?>     <tr>
<td>&nbsp;</td>
<td><?php echo $id; ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $contact; ?></td>
<td class="text-center"><?php echo $email; ?></td>
<td class="text-center"><?php echo $business_type; ?></td>
<td class="text-center">

  <a href="<?php echo $site_name; ?>/mn_admin/admin/business_items/" class="btn btn-success btn-xs"><i class="icon-archive"></i> Details</a>
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



<?php include "footer.php"; ?>
