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
  <title>Crane Finder</title>
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
<div class="side-bar-wrapper collapse navbar-collapse navbar-ex1-collapse">
  <a href="JavaScript:void(0)" class="logo hidden-sm hidden-xs">
    <i class="icon-anchor"></i>
    <span>Crane Finder</span>
  </a>
  <div class="search-box">
    <input type="text" placeholder="SEARCH" class="form-control">
  </div>
  <ul class="side-menu">
    <li>
      <a href="JavaScript:void(0)">
        <i class=" icon-user"></i> <?php echo $user_name; ?>
      </a>
    </li>
  </ul>
  <div class="relative-w">
    <ul class="side-menu">
      <li class='current'>
        <a class='current' href="index.php">
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
      <li>
        <a href="businesses.php">
          <i class="icon-building"></i> Cranes
        </a>
      </li>
      <li>
        <a href="new_business.php">
		<span class="badge pull-right">+</span>
          <i class="icon-building"></i> New Crane
        </a>
     </li>
      <li>
        <a href="new_school.php">
          <i class="icon-female"></i> Settings
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
      <div class="content-wrapper wood-wrapper">
        <div class="content-inner">
          <div class="page-header">
  <div class="header-links hidden-xs">
    <a href="?logout"><i class="icon-signout"></i> Logout</a>
  </div>
  <h1><i class="icon-bar-chart"></i> Dashboard</h1>
</div>
 <div class="main-content">
            <div class="widget">
              <h3 class="section-title first-title"><i class="icon-table"></i> User accounts</h3>
              <div class="widget-content-white glossed">
                <div class="padded">
                <table class="table table-striped table-bordered table-hover datatable">
                  <thead>
                    <tr>
                      <th>&nbsp;</th>
                      <th>ACCOUNT ID</th>
                      <th>NAME</th>
                      <th>CONTACT</th>
                      <th>EMAIL</th>
                      <th>SEX</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
$selx=mysql_query("select * from account") or die(mysql_error());
while($valx=mysql_fetch_array($selx)){
	$id=$valx['account_id'];
	$name=$valx['fullname'];
	$contact=$valx['telephone'];
	$email=$valx['email'];
	$sex=$valx['sex'];
?>     <tr>
                      <td>&nbsp;</td>
                      <td><?php echo $id; ?></td>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $contact; ?></td>
                      <td class="text-center"><?php echo $email; ?></td>
                      <td class="text-center"><?php echo $sex; ?></td>
                      <td class="text-center">
					  
                        <a href="registered_crane.php?aid=<?php echo $id; ?>" class="btn btn-success btn-xs"><i class="icon-archive"></i> Details</a>
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