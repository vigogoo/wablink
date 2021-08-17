<?php
session_start();
include("connect.php");
$_SESSION['page']="checkout";
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
<title>Checkout - Just Deals Uganda</title>

<!-- Favicons Icon -->



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
  <?php include "header.php"; ?>
  <!-- end nav -->  
  <div class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
  <section class="col-main col-sm-9 wow bounceInUp animated" id="forlink">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">
          <h2 style="color: #666">Secure Checkout</h2>
        </div>
        <fieldset class="col2-set">
          <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
$(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'place_order.php',
            data: $('form').serialize(),
            success: function (data) {
              document.getElementById('guest_check_out_status').innerHTML="";
            $("#guest_check_out_status").append(data);
            }
          });

        });

      });
    </script>      
          <div style="" class="col-1 new-users">
            <div class="content">
  <?php 
if($login_status=="guest"){
  ?>
      <b><span style="font-size:x-large">Checkout As A Guest</span><br/>
<a style="text-decoration:underline" href="login.php"><strong>Login If You Have Account</strong></a><br/><br/>
  </b>
              <p>We will need a few information from you. Dont be shy!</p>
<?php }else{ ?>
  <b><h3><?php echo $_SESSION['customer_name']; ?></h3></b>
              <p>Checkout now!</p>
<?php } ?>
              <form autocomplete="off" action="" id="guest_check_out" method="post">
                <input  name="customer_id" class="form-control" value="<?php echo ($login_status=="customer")?$_SESSION['customer_id']:'';  ?>" type="hidden" placeholder="Your name" <?php $cust_id=$_SESSION['customer_id']; echo ($login_status=="customer")?'readonly':'';  ?>>
             <ul class="form-list">
                <li>
                 <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_name">Name <span class="required">*</span></label>
                    <input  name="name" class="form-control" value="<?php echo ($login_status=="customer")?$_SESSION['customer_name']:'';  ?>" type="text" placeholder="Your name" <?php echo ($login_status=="customer")?'readonly':'';  ?>>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_phone">Email <span class="required">*</span></label>
                    <input  name="emailx" class="form-control" value="<?php echo ($login_status=="customer")?$_SESSION['email']:'';  ?>" type="email" placeholder="Enter Email"  <?php echo ($login_status=="customer")?'readonly':'';  ?>>
                  </div>
                </div>
              </div>
                </li>
                   <li>
                 <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_name">Phone Contact <span class="required">*</span></label>
                    <input  name="contact" class="form-control" value="<?php echo ($login_status=="customer")?$_SESSION['contact']:'';  ?>" type="text" placeholder="Your Contact"  <?php echo ($login_status=="customer")?'readonly':'';  ?>>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_phone">Address</label>
                    <input  name="address" class="form-control" value="<?php echo ($login_status=="customer")?$_SESSION['address']:'';  ?>" type="text" placeholder="Your address"  <?php echo ($login_status=="customer")?'readonly':'';  ?>>
                  </div>
                </div>
              </div>
                </li>

                  <li>
                 <div class="form-group">
                <label for="form_name">Additional (Optional)</label>
                <textarea  name="instructions" class="form-control" rows="2" placeholder="Addition Instructions"></textarea>
              </div>
                </li>

                  <li>
                  <p id="guest_check_out_status"></p>
                  <p><input type="submit" value="Checkout Now" class="btn btn-success"></p></li>

              </ul>
              </form>
            </div>
          </div>
          
        </fieldset>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
    </div>
  </section>
<aside class="col-right sidebar col-sm-3 wow bounceInUp animated">
          <div class="block block-progress">
            <div class="block-title ">Your Checkout</div>
            <div class="block-content">
              <dl>
                <dt class="complete"> Billing Address <span class="separator">|</span> <a onClick="checkout.gotoSection('billing'); return false;" href="change-profile.php?customer_id=<?php echo $cust_id; ?>">Change</a> </dt>
                <dd class="complete">
                  <address>
                    <?php 
if($login_status=="guest"){
  ?>
<?php echo "No Billing Adress. Create an Account with Us Today!"; ?>
  <?php } else {?>
                  <?php echo $_SESSION['customer_name']; ?><br>
                  <?php echo $_SESSION['email']; ?><br>
                  <?php echo $_SESSION['contact']; ?><br>
                  <?php echo $_SESSION['address']; ?><br>
                  <?php } ?><br>
     <?php
      //var_dump($_SESSION);
     ?>        


<!-- Item -->

 <?php
$total_price=0;
for($i=0;$i<$count;$i++){
  $idss=$shopping_cart_items[$i][0];
  $qtys=$shopping_cart_items[$i][1];

  $check=mysql_query("SELECT *from item i inner join item_size s on(i.item_id=s.item_id) where i.item_id='$id'") or die(mysql_error());
   $_check=mysql_fetch_array($check);
    $nps=$_check['new_price'];
    $ops=$_check['old_price'];
    $item_id=$_check['item_id'];
    $out=mysql_query("select * from item_photo where item_id='$item_id' ")or die(mysql_error());
    $_out=mysql_fetch_array($out);
    $costs=$np*$qty;
    $photo_names=$_out['photo_name'];
    $total_price+=$cost;
    $perce=1- $nps/$ops;
    $percentChange = $perce * 100;

    if($count==1){
?>
<dt class="complete"> Your Cart <span class="separator">|</span> <a href="index.php">Continue Shopping</a> </dt>
                <div class="item">
                  <div class="col-item">
                    <!--<div class="sale-label sale-top-right">-<?php echo round($percentChange,0); ?>% </div>-->
                    <div class="product-image-area"> <a class="product-image" title="<?php echo $_check['item_name']; ?>" href="product_detail.php?item_id=<?php echo $_check['item_id']; ?>"> <img src='images/products/<?php  echo str_replace(".","_thumb.",$photo_names); ?>' alt='<?php echo $_check['item_name']; ?>' title='<?php echo $_check['item_name']; ?>' class="img-responsive" /> </a>
                      <div class="hover_fly"> <a class="exclusive ajax_add_to_cart_button" href="#" onClick='add_to_cart(<?php echo $item_id; ?>)' title="Add to cart">
                        <div><i class="icon-shopping-cart"></i><span>Buy</span></div>
                        </a> <a class="quick-view" href="quick_view.php?item_id=<?php echo $_check['item_id']; ?>">
                        <div><i class="icon-eye-open"></i><span>Quick view</span></div>
                        </a></div>
                    </div>
                    <div class="info">
                      <div class="info-inner">
                        <div class="item-title"> <a title="<?php echo $_check['item_name']; ?>" href='product_detail.php?item_id=<?php echo $_check['item_id']; ?>'> <?php echo $_check['item_name']; ?> </a> 
                          <p><span class='one-line-truncate' style="text-overflow:ellipsis;display: block; height:18px; font-size: 13px; font-weight: 400; line-height: 18px; overflow; white-space: nowrap; max-height: 18px; margin-bottom: 8px; color: #75787b !important;">Quantity: <?php echo $qtys; ?></span></p>
                        </div>
                        <div class="item-titlex"> 
                          <p><span class='one-line-truncate' style="display: block; height:18px; font-size: 13px; font-weight: 400; line-height: 18px; max-height: 18px; margin-bottom: 8px; color: #75787b !important;">Discount: <?php echo round($percentChange,0); ?>%</span></p>
                          <p><span class='one-line-truncate' style="display: block; height:18px; font-size: 13px; font-weight: 400; line-height: 18px; max-height: 18px; margin-bottom: 8px; color: #75787b !important;">Total Cost: UGX<?php echo number_format($costs); ?></span></p>
                        </div>
                        <!--item-title-->
                        <div class="item-content">
                          <!--<div class="ratings">
                            <div class="rating-box">
                              <div class="rating"></div>
                            </div>
                          </div>
                          <div class="price-box">
                            <p class="special-price"> <span class="price"> UGX<?php echo $rays['new_price']; ?> </span> </p>
                            <p class="old-price"> <span class="price-sep">-</span> <span class="price"> UGX<?php echo $rays['old_price']; ?> </span> </p>
                          </div>-->
                        </div>
                        <!--item-content--> 
                      </div>
                      <!--info-inner-->
                      
                      <div class="clearfix"> </div>
                    </div>
                  </div>
                </div>
                
                <!-- End Item --> 
                <?php } else { ?>
                <dt class="complete"> Your Cart <span class="separator">|</span> <a href="index.php">Continue Shopping</a> </dt>

                <table cellpadding="5" cellspacing="table" border="1" cellspacing="5" width="100%">
  <tr><td>Item name </td><td>Quantity</td><td>Price UGX</td></tr>
               <?php
$total_price=0;
for($i=0;$i<$count;$i++){
  $id=$shopping_cart_items[$i][0];
  $qty=$shopping_cart_items[$i][1];

  $bestx=mysql_query("SELECT *from item i inner join item_size s on(i.item_id=s.item_id) where i.item_id='$id'") or die(mysql_error());
   $rayx=mysql_fetch_array($bestx);
    $np=$rayx['new_price'];
    $item_id=$rayx['item_id'];
    $selx=mysql_query("select * from item_photo where item_id='$item_id' ")or die(mysql_error());
    $vlx=mysql_fetch_array($selx);
    $cost=$np*$qty;
    $photo_name=$vlx['photo_name'];
    $total_price+=$cost;




?>
<tr><td> <?php echo $rayx['item_name']; ?></td><td><?php echo $qty; ?></td><td><?php echo number_format($cost); ?></td></tr>

<?php } ?>
</table>
<?php } } ?>
                  </address>
                </dd>
                <!--<dt class="complete"> Shipping Address <span class="separator">|</span> <a onClick="checkout.gotoSection('shipping');return false;" href="#payment">Change</a> </dt>
                <dd class="complete">
                  <?php 
                    if($ac_type == 'customer'){
                      echo "halo customer";
                      $customer_name= $_SESSION['customer_name'];
                      $customer_id= $_SESSION['customer_id'];
                     
                      $el=mysql_query("select * from order_details o inner join customer i on (o.customer_id = i.customer_id) where o.customer_id='$customer_id'")or die(mysql_error());
                        $al=mysql_fetch_array($el);
                          $customer_names= $al['instructions'];
                          echo $customer_names;
                    }

                  ?>
                  <address>
                  <?php echo $al['customer_name']; ?><br>
                  Better Technology Labs.<br>
                  23 North Main Stree<br>
                  Windsor<br>
                  Holtsville,  New York, 00501<br>
                  United States<br>
                  T: 5465465 <br>
                  F: 466523
                  </address>
                </dd>
                <dt class="complete"> Shipping Method <span class="separator">|</span> <a onClick="checkout.gotoSection('shipping_method'); return false;" href="#shipping_method">Change</a> </dt>
                <dd class="complete"> Flat Rate - Fixed <br>
                  <span class="price">$15.00</span> </dd>
                <dt> Payment Method </dt>
                <dd class="complete"></dd>-->
              </dl>
            </div>
          </div>
        </aside>
         </div>
    </div>
  </div>


 <?php include "footer.php"; ?>
  <!-- End Footer --> 
</div>

<!-- JavaScript --> 
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/parallax.js"></script> 
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
</body>


</html>