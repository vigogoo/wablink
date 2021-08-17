<?php
session_start();
include("connect.php");
include("security.php");
if(isset($_REQUEST['logout'])){
	session_destroy();
	header("Location:../");
}
if(isset($_REQUEST['cid'])){
	$_SESSION['crane_id']=$_REQUEST['cid'];
	header("Location:crane_comments.php");
}
if(isset($_SESSION['ac_type'],$_SESSION['crane_id'])){
	$type=$_SESSION['ac_type'];
	if($type=="admin"){
		$admin_id=$_SESSION['admin_id'];
		$sel=mysql_query("select * from admin where admin_id='$admin_id'")or die(mysql_error());
		$val=mysql_fetch_array($sel);
		$user_name=$val['name'];
         $username=$val['username'];		
		$crane_id=$_SESSION['crane_id'];
	}
}else{
	echo "<h1 style='color:red'>ACCESS DENIED</h1><a href='../'>BACK</a>";
	return;
}


if(isset($_REQUEST['dltComment'],$_REQUEST['comment_id'])){
	$comment_id=$_REQUEST['comment_id'];
	mysql_query("delete from rate where rate_id='$comment_id'")or die(mysql_error());
	header("Location:crane_comments.php");
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
  <title>CRANE FINDER</title>
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
    <i class="icon-anchor"></i>
    <span style="text-shadow:none"><img src="images/log_big.png" style="max-width:200px" /></span>
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
      <li >
        <a  class='current ccc' href="index.php">
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
        <a href="cranes.php">
          <i class="icon-building"></i> Cranes
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
<?php
$sel=mysql_query("select * from crane c inner join account a on(c.account_id=a.account_id)  where crane_id='$crane_id'")or die(mysql_error());
$val=mysql_fetch_array($sel);
?>
      <div class="content-wrapper">
        <div class="content-inner">
          <div class="page-header">
  <div class="header-links hidden-xs">
    <a href="?logout"><i class="icon-signout"></i> Logout</a>
  </div>
  <h3><i class="icon-bar-chart"></i> <?php 
  $cost=$val['cost'];
  
  echo  $val['crane_name']." ".$val['license_number'].", load: ".$val['max_load']."kg, height: ".$val['max_height']."ft, radius: ".$val['max_radius']."ft, Hiring cost: ".$val['cost']."/=  <br/><i class='icon-user'></i> Owned by: ".$val['fullname']." ".$val['telephone']." ".$val['email'];?></h3>
</div>
       
          <div class="main-content">
            <div class="widget">
              <h3 class="section-title first-title"><i class="icon-table"></i>WHAT PEOPLE ARE SAYING</h3>
              <div class="widget-content-white glossed">
                <div class="padded">
               <table class="table table-striped table-hover ">
                  <thead>
                    <tr>
                      <th>Comments</th>                                     
					  <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
$selx=mysql_query("select *  from rate b inner join account a on (b.account_id=a.account_id) where crane_id='$crane_id'") or die(mysql_error());
while($valx=mysql_fetch_array($selx)){	
    $rate_id=$valx['rate_id'];
	$customer=$valx['fullname'];
	$telephone=$valx['telephone'];
	$comment=$valx['comment'];
	$date=$valx['date'];
	$status=$valx['status'];
	$rate=$valx['rate'];
	//$status=$valx['status'];
?>     <tr>
                      <td width="90%"><p><?php echo $comment."<br/>Rate: ".(($rate/5)*100)."% ($rate Stars)"; ?></p>
					  <p style="text-align:right" align="right"><?php echo "$customer $telephone | ".$date; ?></p>
					  </td>
					  <td class="text-center">
					   <a style="margin-bottom:5px" href="#" onClick="deleteComment(<?php echo $rate_id; ?>)" class="btn btn-danger btn-xs"><i class=" icon-warning-sign"></i> Delete</a></td>			 
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
<script type="text/javascript">
function deleteComment(id) {
    var strconfirm = confirm("Are you sure you want to delete the rating?");
    if (strconfirm == true) {
       window.location.href = "?dltComment&comment_id="+id;
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