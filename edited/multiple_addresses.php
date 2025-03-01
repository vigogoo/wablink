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

<!-- Favicons Icon -->



<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS Style -->
<link rel="stylesheet" href="../css/animate.css" type="text/css">
<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="../css/style.css" type="text/css">
<link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="../css/owl.theme.css" type="text/css">
<link rel="stylesheet" href="../css/font-awesome.css" type="text/css">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,300,700,800,400,600' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="page"> 
  <!-- Header -->
  <?php include "header.php"; ?> 
  <!-- end nav --> 
  <!-- main-container -->
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="state_bar wow bounceInUp animated">
          <ul id="checkout-progress-state" class="checkout-progress">
            <li class="active first" title="Select Addresses">Select Addresses</li>
            <li title="Shipping Information">Shipping Information</li>
            <li title="Billing Information">Billing Information</li>
            <li title="Place Order">Place Order</li>
            <li title="Order Success" class="last">Order Success</li>
          </ul>
          <script type="text/javascript">decorateGeneric($$('#checkout-progress-state li'), ['first','last']);</script> 
        </div>
        <div class="multiple_addresses wow bounceInUp animated">
          <form method="post" action="#">
            <div class="page-title_multi">
              <h2>Ship to Multiple Addresses</h2>
            </div>
            <!--page-title_multi-->
            <div class="title-buttons">
              <button onClick="$('add_new_address_flag').value=1; $('checkout_multishipping_form').submit();" class="button new-address" title="Enter a New Address" type="button"><span>Enter a New Address</span></button>
            </div>
            <!--title-buttons-->
            <div class="addresses">
              <div class="table-responsive">
                <fieldset class="multiple-checkout">
                  <input type="hidden" id="can_continue_flag" value="0" name="continue">
                  <input type="hidden" id="add_new_address_flag" value="0" name="new_address">
                  Please select shipping address for applicable items
                  <table id="multiship-addresses-table" class="data-table">
                    
                    <thead>
                      <tr class="first last">
                        <th>Product</th>
                        <th class="a-left">Qty</th>
                        <th>Send to</th>
                        <th>Remove</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr class="first last">
                        <td class="a-right last" colspan="4"><button onClick="$('can_continue_flag').value=0" class="button btn-update" type="submit"><span>Update Qty &amp; Addresses</span></button></td>
                      </tr>
                    </tfoot>
                    <tbody>
                      <tr class="first odd">
                        <td><h4 class="product-name"><a href="#">Ocean Premium Saline Nasal Spray - 1.5 fl oz</a></h4></td>
                        <td><input type="text" class="input-text qty" size="2" value="1" name="ship[0][43][qty]"></td>
                        <td><select title="" class="" id="ship_0_43_address" name="ship[0][43][address]">
                            <option selected="selected" value="1">pranali d, aundh, tyyrt, Alabama 46532, United States</option>
                          </select></td>
                        <td class="a-center last"><a href="#" title="Remove item" class="btn-remove btn-remove2"><span>Remove item</span></a></td>
                      </tr>
                      <tr class="even">
                        <td><h4 class="product-name"><a href="#">Apple iPod classic 160 GB Silver (7th Generation) NEWEST MODEL</a></h4></td>
                        <td><input type="text" class="input-text qty" size="2" value="1" name="ship[1][63][qty]"></td>
                        <td><select title="" class="" id="ship_1_63_address" name="ship[1][63][address]">
                            <option selected="selected" value="1">pranali d, aundh, tyyrt, Alabama 46532, United States</option>
                          </select></td>
                        <td class="a-center last"><a href="#" title="Remove item" class="btn-remove btn-remove2"><span>Remove item</span></a></td>
                      </tr>
                      <tr class="odd">
                        <td><h4 class="product-name"><a href="#">Apple iPod classic 160 GB Silver (7th Generation) NEWEST MODEL</a></h4></td>
                        <td><input type="text" class="input-text qty" size="2" value="1" name="ship[2][63][qty]"></td>
                        <td><select title="" class="" id="ship_2_63_address" name="ship[2][63][address]">
                            <option selected="selected" value="1">pranali d, aundh, tyyrt, Alabama 46532, United States</option>
                          </select></td>
                        <td class="a-center last"><a href="#" class="btn-remove btn-remove2"><span>Remove item</span></a></td>
                      </tr>
                      <tr class="even">
                        <td><h4 class="product-name"><a href="#">Nautilus T514 Treadmill</a></h4></td>
                        <td><input type="text" class="input-text qty" size="2" value="1" name="ship[3][121][qty]"></td>
                        <td><select title="" class="" id="ship_3_121_address" name="ship[3][121][address]">
                            <option selected="selected" value="1">pranali d, aundh, tyyrt, Alabama 46532, United States</option>
                          </select></td>
                        <td class="a-center last"><a href="#" class="btn-remove btn-remove2"><span>Remove item</span></a></td>
                      </tr>
                      <tr class="odd">
                        <td><h4 class="product-name"><a href="#">14k White and Rose Gold Pink Diamond Flower Pendant (.07 Ct)</a></h4></td>
                        <td><input type="text" class="input-text qty" size="2" value="1" name="ship[4][762][qty]"></td>
                        <td><select title="" class="" id="ship_4_762_address" name="ship[4][762][address]">
                            <option selected="selected" value="1">pranali d, aundh, tyyrt, Alabama 46532, United States</option>
                          </select></td>
                        <td class="a-center last"><a href="#" class="btn-remove btn-remove2"><span>Remove item</span></a></td>
                      </tr>
                      <tr class="even">
                        <td><h4 class="product-name"><a href="#">KR Tools 11414 Pro Series 14-Inch Heavy Duty Bolt Cutter</a></h4></td>
                        <td><input type="text" class="input-text qty" size="2" value="1" name="ship[5][1283][qty]"></td>
                        <td><select title="" class="" id="ship_5_1283_address" name="ship[5][1283][address]">
                            <option selected="selected" value="1">pranali d, aundh, tyyrt, Alabama 46532, United States</option>
                          </select></td>
                        <td class="a-center last"><a href="#;" class="btn-remove btn-remove2"><span>Remove item</span></a></td>
                      </tr>
                      <tr class="odd">
                        <td><h4 class="product-name"><a href="#">Little Noses Saline Spray/Drops for Dry for Stuffy Noses, 1-Ounce (30 ml) (Pack of 6)</a></h4></td>
                        <td><input type="text" class="input-text qty" size="2" value="1" name="ship[6][1926][qty]"></td>
                        <td><select title="" class="" id="ship_6_1926_address" name="ship[6][1926][address]">
                            <option selected="selected" value="1">pranali d, aundh, tyyrt, Alabama 46532, United States</option>
                          </select></td>
                        <td class="a-center last"><a href="#" class="btn-remove btn-remove2"><span>Remove item</span></a></td>
                      </tr>
                      <tr class="even">
                        <td><h4 class="product-name"><a href="#">Dell 3.0 Ghz. Super Fast GX Computer with Dell 19 LCD Flat Panel Monitor, Big 500GB Hard Drive, 2GB RAM, DVD Burner (DVD-RW), and New Licensed Windows XP with Genuine Microsoft Authorized CD</a></h4></td>
                        <td><input type="text" class="input-text qty" size="2" value="1" name="ship[7][4206][qty]"></td>
                        <td><select title="" class="" id="ship_7_4206_address" name="ship[7][4206][address]">
                            <option selected="selected" value="1">pranali d, aundh, tyyrt, Alabama 46532, United States</option>
                          </select></td>
                        <td class="a-center last"><a href="#;" class="btn-remove btn-remove2"><span>Remove item</span></a></td>
                      </tr>
                      <tr class="odd">
                        <td><h4 class="product-name"><a href="#">Dell 3.0 Ghz. Super Fast GX Computer with Dell 19 LCD Flat Panel Monitor, Big 500GB Hard Drive, 2GB RAM, DVD Burner (DVD-RW), and New Licensed Windows XP with Genuine Microsoft Authorized CD</a></h4></td>
                        <td><input type="text" class="input-text qty" size="2" value="1" name="ship[8][4206][qty]"></td>
                        <td><select title="" class="" id="ship_8_4206_address" name="ship[8][4206][address]">
                            <option selected="selected" value="1">pranali d, aundh, tyyrt, Alabama 46532, United States</option>
                          </select></td>
                        <td class="a-center last"><a href="#" class="btn-remove btn-remove2"><span>Remove item</span></a></td>
                      </tr>
                      <tr class="even">
                        <td><h4 class="product-name"><a href="#">Dell 3.0 Ghz. Super Fast GX Computer with Dell 19 LCD Flat Panel Monitor, Big 500GB Hard Drive, 2GB RAM, DVD Burner (DVD-RW), and New Licensed Windows XP with Genuine Microsoft Authorized CD</a></h4></td>
                        <td><input type="text" class="input-text qty" size="2" value="1" name="ship[9][4206][qty]"></td>
                        <td><select title="" class="" id="ship_9_4206_address" name="ship[9][4206][address]">
                            <option selected="selected" value="1">pranali d, aundh, tyyrt, Alabama 46532, United States</option>
                          </select></td>
                        <td class="a-center last"><a href="#;" class="btn-remove btn-remove2"><span>Remove item</span></a></td>
                      </tr>
                      <tr class="odd">
                        <td><h4 class="product-name"><a href="#">Dell 3.0 Ghz. Super Fast GX Computer with Dell 19 LCD Flat Panel Monitor, Big 500GB Hard Drive, 2GB RAM, DVD Burner (DVD-RW), and New Licensed Windows XP with Genuine Microsoft Authorized CD</a></h4></td>
                        <td><input type="text" class="input-text qty" size="2" value="1" name="ship[10][4206][qty]"></td>
                        <td><select title="" class="" id="ship_10_4206_address" name="ship[10][4206][address]">
                            <option selected="selected" value="1">pranali d, aundh, tyyrt, Alabama 46532, United States</option>
                          </select></td>
                        <td class="a-center last"><a href="#" class="btn-remove btn-remove2"><span>Remove item</span></a></td>
                      </tr>
                      <tr class="even">
                        <td><h4 class="product-name"><a href="#">Dell 3.0 Ghz. Super Fast GX Computer with Dell 19 LCD Flat Panel Monitor, Big 500GB Hard Drive, 2GB RAM, DVD Burner (DVD-RW), and New Licensed Windows XP with Genuine Microsoft Authorized CD</a></h4></td>
                        <td><input type="text" class="input-text qty" size="2" value="1" name="ship[11][4206][qty]"></td>
                        <td><select title="" class="" id="ship_11_4206_address" name="ship[11][4206][address]">
                            <option selected="selected" value="1">pranali d, aundh, tyyrt, Alabama 46532, United States</option>
                          </select></td>
                        <td class="a-center last"><a href="#;" class="btn-remove btn-remove2"><span>Remove item</span></a></td>
                      </tr>
                      <tr class="odd">
                        <td><h4 class="product-name"><a href="#">Fantasy Furniture Fancy Sofa, Black</a></h4></td>
                        <td><input type="text" class="input-text qty" size="2" value="1" name="ship[12][4207][qty]"></td>
                        <td><select title="" class="" id="ship_12_4207_address" name="ship[12][4207][address]">
                            <option selected="selected" value="1">pranali d, aundh, tyyrt, Alabama 46532, United States</option>
                          </select></td>
                        <td class="a-center last"><a href="#" class="btn-remove btn-remove2"><span>Remove item</span></a></td>
                      </tr>
                      <tr class="even">
                        <td><h4 class="product-name"><a href="#">Fantasy Furniture Fancy Sofa, Black</a></h4></td>
                        <td><input type="text" class="input-text qty" size="2" value="1" name="ship[13][4207][qty]"></td>
                        <td><select title="" class="" id="ship_13_4207_address" name="ship[13][4207][address]">
                            <option selected="selected" value="1">pranali d, aundh, tyyrt, Alabama 46532, United States</option>
                          </select></td>
                        <td class="a-center last"><a href="#;" class="btn-remove btn-remove2"><span>Remove item</span></a></td>
                      </tr>
                      <tr class="odd">
                        <td><h4 class="product-name"><a href="#">Dell Super Fast Optiplex Computer With LCD Flat Panel Monitor Included, Big 40 GB (Gigabyte) Hard Drive, 1 GB RAM, P4 Desktop PC, Single Core 2.8Ghz. Processor, XP</a></h4></td>
                        <td><input type="text" class="input-text qty" size="2" value="1" name="ship[14][4208][qty]"></td>
                        <td><select title="" class="" id="ship_14_4208_address" name="ship[14][4208][address]">
                            <option selected="selected" value="1">pranali d, aundh, tyyrt, Alabama 46532, United States</option>
                          </select></td>
                        <td class="a-center last"><a href="#" class="btn-remove btn-remove2"><span>Remove item</span></a></td>
                      </tr>
                      <tr class="last even">
                        <td><h4 class="product-name"><a href="#">Apple MacBook MC516LL/A 13.3-Inch Laptop</a></h4></td>
                        <td><input type="text" class="input-text qty" size="2" value="1" name="ship[15][4212][qty]"></td>
                        <td><select title="" class="" id="ship_15_4212_address" name="ship[15][4212][address]">
                            <option selected="selected" value="1">pranali d, aundh, tyyrt, Alabama 46532, United States</option>
                          </select></td>
                        <td class="a-center last"><a href="#;" class="btn-remove btn-remove2"><span>Remove item</span></a></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="buttons-set"> <a href="#" class="back-link"><small>« </small>Back to Shopping Cart</a>
                    <button onClick="$('can_continue_flag').value=1" class="button btn-continue" title="Continue to Shipping Information" type="submit"><span>Continue to Shipping Information</span></button>
                  </div>
                </fieldset>
              </div>
              <!--multiple-checkout--> 
            </div>
          </form>
          <!--addresses--> 
          
        </div>
      </div>
    </div>
  </section>
  <!--End main-container --> 
  <!-- Footer -->
 <?php include 'footer.php'; ?>