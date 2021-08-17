<?php
if(isset($_REQUEST['logout'])){
session_destroy();
header('Location:index.php');
 //echo '<META http-equiv="refresh" content="0;URL=index.php"><img src="load.gif" />';
}
?>

<!-- Header d83138-->
  <header  class="header-container">
    <div  class="header-top">
      <div class="container">
        <div class="row"> 
          <!-- Header Language -->
          <div class="col-xs-6">
            <div class="dropdown block-language-wrapper"> <a role="button" data-toggle="dropdown" data-target="#" class="block-language dropdown-toggle" href="#"> <img src="images/english.png" alt="language"> English <span class="caret"></span> </a>
          
            </div>
            
            <!-- End Header Language --> 
            
            <!-- Header Currency -->
            <div class="dropdown block-currency-wrapper"> <a role="button" data-toggle="dropdown" data-target="#" class="block-currency dropdown-toggle" href="#"> UGX <span class="caret"></span></a>
        
            </div>
            
            <!-- End Header Currency -->
            
            
          </div>
          <div class="col-xs-6"> 
		  
<?php

$login_status="guest";

if(isset($_SESSION['ac_type'])){
	$ac_type =$_SESSION['ac_type'];
	
	if($ac_type == 'customer'){
	$login_status = 'customer';
	}
}



?>		  
            
            <!-- Header Top Links -->
            <div class="toplinks">
              <div class="links">
                  <div class="myaccount"><a title="My Account" href="index.php"><span style="color: #fff;" class="hidden-xs"><?php if($login_status=='customer'){
				  echo $_SESSION['customer_name'];
				  }else{
				  echo "Welcome Guest";
				  }?></span></a></div>
                <div class="wishlist"><a title="My Wishlist"  href="wishlist.php"><span style="color: #fff;" class="hidden-xs">Wishlist</span></a></div>
                <div class="check"><a title="Checkout" href="checkout.php"><span style="color: #fff;" class="hidden-xs">Checkout</span></a></div>
				<?php 
				if($login_status=="guest"){			
				?>
                <div class='login'><a title="Login" href="login.php"><span style="color: #fff;" class="hidden-xs">Log In</span></a></div>
				<?php }else{  ?>
								
				  <div class="login"><a title="Logout" href="?logout"><span style="color: #fff;" class="hidden-xs">Log Out</span></a></div>
				  <?php } ?>
				
              </div>
            </div>
            <!-- End Header Top Links --> 
          </div>
        </div>
      </div>
    </div>



    
    <div  class="header container">
      <div class="row">
        <div class="col-lg-2 col-sm-3 col-md-2"> 
          <!-- Header Logo --> 
          <a class="logo" title="Magento Commerce" href="index.php"><img style="width: 80px" alt="Magento Commerce" src="images/logo.png"></a> 
          <!-- End Header Logo --> 
        </div>
        <div  class="col-lg-8 col-sm-6 col-md-8"> 
          <!-- Search-col -->
          <!--<div  class="search-box">
            <form autocomplete="off" action="" method="POST" id="" name="Categories">
             
              <input style="font-size: 20px; padding: 20px; border: 1px solid #e0e0e0;color:#666; margin-left: 0px" type="text" placeholder="Search here..." value="" maxlength="70" class="" name="search" id="search">
              <button style="padding: 12px" id="submit-button" class="search-btn-bg">Search</button>
            </form>
          </div>-->
          <!-- End Search-col --> 
        </div>
        <!-- Top Cart -->
        <div class="col-lg-2 col-sm-3 col-md-2">
          <div class="top-cart-contain">
            <div class="mini-cart" id="my_shopping_cart">
<?php include "cart.php"; ?>
             </div>
            <div id="ajaxconfig_info"> <a href="#/"></a>
              <input value="" type="hidden">
              <input id="enable_module" value="1" type="hidden">
              <input class="effect_to_cart" value="1" type="hidden">
              <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
            </div>
          </div>
        </div>
        <!-- End Top Cart --> 
      </div>
    </div>
  </header>
  <!-- end header --> 
   <!-- Navbar -->
  <nav>
    <div class="container">
      <div class="nav-inner">
        <div class="logo-small"> <a class="logo" title="Magento Commerce" href="inde.php"><img alt="Magento Commerce" src="images/logo.png" style="max-width: 80px"></a> </div>
        <!-- mobile-menu -->
        <div class="hidden-desktop" id="mobile-menu">
          <ul class="navmenu">
            <li>
              <div class="menutop">
                <div class="toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
                <h2>Menu</h2>
              </div>
              <ul class="submenu">
                <li>
                  <ul class="topnav">
                  
                    
                    <li class="level0 nav-8 level-top parent"> <a class="level-top" href="grid.php"> <span>Men</span> </a>
                      
                    </li>
                  </ul>
                </li>
              </ul>
            </li>



            
          </ul>
          <!--navmenu--> 
        </div>
        
        <!--End mobile-menu -->
        <ul id="nav" class="hidden-xs">
          <li id="nav-home" class="level0 parent drop-menu"><a href="index.php" ><span>Home</span> </a>
        
          </li>
         
            <li class="level0 parent drop-menu"><a href="index.php" ><span>Vegetable</span> </a>
        
          </li>

            <li class="level0 parent drop-menu"><a href="index.php" ><span>Fruits</span> </a>
        
          </li>

          <li class="level0 parent drop-menu"><a href="index.php" ><span>Drinks</span> </a>
        
          </li>


   <li class="level0 parent drop-menu"><a href="index.php" ><span>Food</span> </a>
        
          </li>

          <li class="level0 parent drop-menu"><a href="index.php" ><span>Meat</span> </a>
        
          </li>
 <li class="level0 parent drop-menu"><a href="index.php" ><span>Meat</span> </a>
        
          </li>
           <li class="level0 parent drop-menu"><a href="index.php" ><span>Meat</span> </a>
        
          </li>
           <li class="level0 parent drop-menu"><a href="index.php" ><span>Meat</span> </a>
        
          </li>
           <li class="level0 parent drop-menu"><a href="index.php" ><span>Meat</span> </a>
        
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- end nav -->