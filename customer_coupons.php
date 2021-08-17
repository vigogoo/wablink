<?php
session_start();
$_SESSION['filter']="";
include("connect.php");
include("security.php");

if(isset($_SESSION['ac_type'])){
  $type=$_SESSION['ac_type'];
  if($type=="customer"){
    $custs_id=$_SESSION['customer_id'];
    $sel=mysql_query("select * from customer where customer_id='$custs_id'")or die(mysql_error());
    $val=mysql_fetch_array($sel);
   
  }
}else{
  echo "<h1 style='color:red'>ACCESS DENIED</h1><a href='../'>BACK</a>";
  return;
}


//delete coupon
if(isset($_REQUEST['dltCrane'],$_REQUEST['coupon_id'])){
  $coupon_id=$_REQUEST['coupon_id'];
  mysql_query("delete from coupons where coupon_id='$coupon_id'")or die(mysql_error());
 
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Just Deals Uganda</title>

<!-- Favicons Icon 
<link rel="icon" href="http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico" type="image/x-icon" />
-->
<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS Style -->
<link rel="stylesheet" href="css/animate.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="css/owl.theme.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,300,700,800,400,600' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="page"> 
  <!-- Header -->
  <?php include 'header.php'; ?>
  <!-- end nav --> 
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart wow bounceInUp animated">
          <div class="page-title">
            <h2>My Coupons</h2>
          </div>
          <div class="table-responsive">
            <form method="post" action="#updatePost/">
              <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
              <fieldset>
                
                <table class="data-table cart-table" id="shopping-cart-table">
                  <thead>
                    <tr class="first last">
                      <th rowspan="1">&nbsp;</th>
                      <th rowspan="1"><span class="nobr">Product Name</span></th>
                      
                      <th colspan="1" class="a-center"><span class="nobr">Coupon No.</span></th>
                      
                      <th colspan="1" class="a-center">Expires</th>
                      <th class="a-center" rowspan="1">&nbsp;</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="first last">
                      <td class="a-right last" colspan="7"><button onclick="location.href='index.php'" class="button btn-continue" title="Continue Shopping" type="button"><span><span>Get more coupons</span></span></button>
                       </td>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                  $coupon=mysql_query("select * from coupons c inner join item i on (c.item_id=i.item_id) where c.customer_id='$custs_id' ") or die(mysql_error());
                  while ($_coupon=mysql_fetch_array($coupon)) {
                    $iid=$_coupon['item_id'];
                     $coupon_id=$_coupon['coupon_id'];

                    # code...
                    $cou=mysql_query("select * from item_photo where item_id='$iid' ") or die(mysql_error());
                    $_cou=mysql_fetch_array($cou);
                  $photo_name=$_cou['photo_name'];

                ?>
                    <tr class="first odd">
                      <td class="image"><a class="product-image" title="<?php echo $_coupon['item_name']; ?>" href="product_detail.php?item_id=<?php echo $iid; ?>"><img width="75" alt="<?php echo $_coupon['item_name']; ?>" src="images/products/<?php  echo str_replace(".","_thumb.",$photo_name); ?>"></a></td>
                      <td><h2 class="product-name"> <a href="product_detail.php?item_id=<?php echo $iid; ?>"><?php echo $_coupon['item_name']; ?></a> </h2></td>
                      
                      <td class="a-right"><span class="cart-price"> <span class="price"><?php echo $_coupon['coupon_no']; ?></span> </span></td>
                      
                      <td class="a-right movewishlist"><span class="cart-price"> <span class="price"><?php echo $_coupon['expiry_date']; ?></span> </span></td>
                      <td class="a-center last"><a class="button remove-item" onClick="deleteComment(<?php echo $coupon_id; ?>)" title="Delete Coupon" href="#"><span><span>Remove item</span></span></a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </fieldset>
            </form>
          </div>
        </div>
        <!-- BEGIN CART COLLATERALS -->
        
      </div>
    </div>
  </section>
  <?php include "footer.php"; ?>
  <!-- End Footer --> 
</div>
<script type="text/javascript">
function deleteComment(id) {
    var strconfirm = confirm("Are you sure you want to delete this coupon? You will not be able to claim this offer!.");
    if (strconfirm == true) {
       window.location.href = "?dltCrane&coupon_id="+id;
    }
}
</script>
<!-- JavaScript --> 
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/parallax.js"></script> 
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
</body>

</html>