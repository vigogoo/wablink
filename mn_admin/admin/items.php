<?php
session_start();
include("connect.php");
include("security.php");
if(isset($_REQUEST['logout'])){
	session_destroy();
	header("Location:../");
}
if(isset($_REQUEST['aid'])){
	$_SESSION['agent_id']=$_REQUEST['aid'];
	header("Location:registered_crane.php");
}
if(isset($_SESSION['ac_type'])){
	$type=$_SESSION['ac_type'];
	if($type=="admin"){
		$admin_id=$_SESSION['admin_id'];
		$sel=mysql_query("select * from admin where admin_id='$admin_id'")or die(mysql_error());
		$val=mysql_fetch_array($sel);
		$user_name=$val['name'];
         $username=$val['username'];	
	}
}else{
	echo "<h1 style='color:red'>ACCESS DENIED</h1><a href='../'>BACK</a>";
	return;
}




//delete crane
if(isset($_REQUEST['dltCrane'],$_REQUEST['item_id'])){
	$item_id=$_REQUEST['item_id'];
	//first delete the images
	$sl=mysql_query("select * from item_photo where item_id='$item_id'")or die(mysql_error());
	while($vl=mysql_fetch_array($sl)){
	$photo_id=$vl['photo_id'];
	 $photo=$vl['photo_name'];
	 $loc="../images/products/".$photo;
	 unlink($loc);//delete previous file
	 mysql_query("delete from item_photo where photo_id='$photo_id'")or die(mysql_error());
	}
	//delete the booking
	// mysql_query("delete from book_crane where crane_id='$crane_id'")or die(mysql_error());
	 //delete rating
	  //mysql_query("delete from rate where crane_id='$crane_id'")or die(mysql_error());
	//delete crane
	 mysql_query("delete from item where item_id='$item_id'")or die(mysql_error());
	header("Location:items.php");
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
  <title>Just Deals</title>
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
          <i class=" icon-group"></i> Accounts
        </a>
      </li>
      <li>
        <a href="new_account.php">
		<span class="badge pull-right">+</span>
          <i class="icon-user"></i> New Account
        </a>
    </li>
     <li class='current'>
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
    <a href="?logout"><i  style="color:#f7f7f7" class="icon-signout"></i> Logout</a>
  </div>
  <p style="font-size:large"><i class="icon-bar-chart"></i> Just Deals</p>
</div>
       
          <div class="main-content">
            <div class="widget">
              <h3 class="section-title first-title"><i class="icon-table"></i>OFFERS AVAILABLE</h3>
              <div class="widget-content-white glossed">
                <div class="padded">
               <table class="table table-striped table-bordered table-hover datatable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
					  <th>UNITS</th>
                      <th class="text-center">OLD PRICE  /= </th>
                      <th class="text-center">NEW PRICE  /= </th>					  
                      <th class="text-center">DISCOUNT  % </th>
					  <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
$selx=mysql_query("select *  from item  i inner join item_size s on(i.item_id=s.item_id) ") or die(mysql_error());
while($valx=mysql_fetch_array($selx)){	
	$item_id=$valx['item_id'];
	$item_name=$valx['item_name'];
	$size=$valx['size'];
	$old_price=$valx['old_price'];
	$new_price=$valx['new_price'];
	$discount=((($old_price-$new_price)/$old_price)*100);
?>     <tr>
                      <td><?php echo $item_id; ?></td>
                      <td><?php echo $item_name; ?></td>
                      <td><?php echo $size; ?></td>
                      <td class="text-center"><?php echo $old_price; ?></td>
                      <td class="text-center"><?php echo $new_price; ?></td>
					  
                     <td class="text-center"><?php echo round($discount,0);  ?>%</td>
					  
					  <td class="text-center">
					  <a style="margin-bottom:5px" href="view_item_details.php?cid=<?php echo $item_id; ?>" class="btn btn-primary btn-xs"><i class="icon-archive"></i> View</a>
					  &nbsp;
					  <a style="margin-bottom:5px" href="edit_item.php?cid=<?php echo $item_id; ?>" class="btn btn-success btn-xs"><i class="icon-edit"></i> Edit</a>
                        &nbsp;
					  <a style="margin-bottom:5px" href="#" onClick="deleteComment(<?php echo $item_id; ?>)" class="btn btn-danger btn-xs"><i class=" icon-warning-sign"></i> Delete</a></td>
                      
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
<script type="text/javascript">
function deleteComment(id) {
    var strconfirm = confirm("Are you sure you want to delete this item? this will remove all the records about this product.");
    if (strconfirm == true) {
       window.location.href = "?dltCrane&item_id="+id;
    }
}
</script>

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