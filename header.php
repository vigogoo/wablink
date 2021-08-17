<?php
include 'connect.php'; 

if(isset($_REQUEST['logout'])){
session_destroy();
header('Location:index.php');
}

?>

<!-- Header d83138-->
  <header  class="header-container">

    <div  class="header container">
      <div class="row">
        <div class="col-lg-2  col-md-2 col-sm-6 col-xs-6"> 
          <!-- Header Logo --> 
          <a class="logo" title="wablinks store" href="index.php">
            <img alt="Agricultural Market" src="images/logo.png"
            style="width:100%;"  class="image-logo"></a> 
          <!-- End Header Logo --> 
        </div>
        <div  class="col-lg-8 col-md-8 col-sm-6 hidden-xs"> 

		  <div class="search-box">
		  <form id="search_mini_form" name="Categories">
		 
            <?php include "search_box.php"; ?>
			</form>
          </div>
          <!-- End Search-col --> 
        </div>
        <!-- Top Cart -->
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
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
        <div class="logo-small"> <a class="logo" title="Magento Commerce" href="index.php"><img alt="Magento Commerce" src="images/logo.png" style="max-width: 80px"></a> </div>
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
				  <li class="level0 nav-6 level-top first parent"> <a class="level-top" href="index.php"><span>Home</span> </a>
                     
                    </li>
				  
				  <?php
						$fa=mysql_query("select * from category limit 6" ) or die (mysql_error());
						while($faa=mysql_fetch_array($fa)){
						$category_ids=$faa['category_id'];
				  ?>
																									
                    <li class="level0 nav-6 level-top first parent"> <a class="level-top"><span><?php echo $faa['category_name']; ?></span> </a>
                     <ul class="level0">
					 <?php
						
						$fi=mysql_query("select * from sub_category where category_id='$category_ids'" ) or die (mysql_error());
						while($fii=mysql_fetch_array($fi)){
				  ?>
                        <li class="level1 first"><a href="grid.php?sub_category_id=<?php echo $fii['sub_category_id']; ?>"><span><?php echo $fii['sub_category_name']; ?></span></a></li>
                        <?php } ?>
                      </ul> 
                    </li>
                    <?php } ?>
                     
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
          <!--navmenu--> 
        </div>
        
        <!--End mobile-menu -->
		
        <ul id="nav" class="hidden-xs">
		<li class="level0 nav-5 level-top first"> <a class="level-top" href="index.php"> <span>Home</span> </a>
                                  
      </li>
		
		<?php
						$fe=mysql_query("SELECT * from category ORDER BY category_id ASC" ) or die (mysql_error());
						while($fee=mysql_fetch_array($fe)){
						$category_ide=$fee['category_id'];
				  ?>
		<li class="level0 nav-5 level-top first"> <a class="level-top"> <span><?php echo $fee['category_name']; ?></span> </a>
            <div class="level0-wrapper dropdown-6col">
              <div class="level0-wrapper2">
                <div class="nav-block nav-block-center">
                  <ul class="level0">
				  <?php
						
						$fo=mysql_query("SELECT * from sub_category where category_id='$category_ide' ORDER BY sub_category_id ASC" ) or die (mysql_error());
						while($foo=mysql_fetch_array($fo)){
							$sub_id=$foo['sub_category_id'];
				  ?>
                    <li class="level3 nav-6-1 parent item"> <a href="grid.php?sub_category_id=<?php echo $foo['sub_category_id']; ?>"><span><?php echo $foo['sub_category_name']; ?></span></a> 
                      <!--sub sub category-->
                     
                      <ul class="level1">
					   <?php
					  $select_test=mysql_query("select * from item  where sub_category_id='$sub_id' limit 4") or die (mysql_error());
					  while($select_testing=mysql_fetch_array($select_test)){
					  $item_ids=$select_testing['item_id'];
					  ?>
                        <li class="level2 nav-6-1-1"> <a href="product_detail.php?item_id=<?php echo $item_ids; ?>"> <?php echo $select_testing['item_name'];?></span></a> </li>
                        <!--level2 nav-6-1-1-->
                       <?php } ?>
                      </ul>
                      <!--level1--> 
                      
                      <!--sub sub category--> 
                      
                    </li>
                    <!--level3 nav-6-1 parent item-->
                     <?php } ?>


                    
                  </ul>
                  <!--level0--> 
                </div>
              </div>
            </div>
          </li>
		<?php } ?>
           


        </ul>
      </div>
    </div>
  </nav>
  <!-- end nav -->