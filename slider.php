<div class="magik-slideshow wow bounceInUp animated" id="magik-slideshow">
    <div class="container">
      <div class="row">
        <div class="LHS-nav col-lg-3 col-md-4">
          <div id="magik-verticalmenu" class="block magik-verticalmenu">
            <div class="nav-title"> <span>Categories</span> </div>
            <div class="nav-content">
              <div class="navbar navbar-inverse">
                <div id="verticalmenu" class="verticalmenu" role="navigation">
                  <div class="navbar">
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                      <ul class="nav navbar-nav verticalmenu">
					   <?php 
		  $sel=mysql_query("SELECT * from category ORDER BY category_id ASC") or die (mysql_error());
		 
		  while($val=mysql_fetch_array($sel)){
			  $catId = $val['category_id'];
			  $catName = $val['category_name'];
			 
			  
		  
		  ?>
                        <li class=" parent dropdown "> <a href="category.php?category_id=<?php echo $catId?>" class="dropdown-toggle" data-toggle="dropdown"><span class="menu-title"><?php echo $catName;?></span><b class="round-arrow"></b></a>
                          <div class="dropdown-menu">
                            <div class="dropdown-menu-inner">
                              <div class="row">
							  <?php
					$select=mysql_query("SELECT * from sub_category where category_id= '$catId' ORDER BY sub_category_id") or die (mysql_error());
		  while ($vale=mysql_fetch_array($select)){
			  $subId=$vale['sub_category_id'];
			  $subName=$vale['sub_category_name'];
			
					?>
                                <div class="mega-col col-sm-66" data-widgets="wid-5" data-colwidth="6">
                                  <div class="mega-col-inner">
                                    <div class="ves-widget">
                                      <div class="menu-title"><?php echo $subName; ?></div>
                                      <div class="widget-html">
                                        <div class="widget-inner">
                                          <ul>
										   <?php
					  $select_test=mysql_query("SELECT * from item where sub_category_id='$subId' ORDER BY sub_category_id limit 4 ") or die (mysql_error());
					  while($select_testing=mysql_fetch_array($select_test)){
              $item_id=$select_testing['item_id'];
					  ?>
                                            <li class="first"> <a href="product_detail.php?item_id=<?php echo $item_id; ?>"> <span><?php echo $select_testing['item_name'];?></span> </a> </li>
											<?php } ?>
                                            
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
								<?php } ?>
                                
                              </div>
                            </div>
                            
                          </div>
                        </li>
						<?php } ?>
                        
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-8">
          <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
            <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
              <ul>
                <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='images/t-shirt.jpg'><img src='images/t-shirt.jpg' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                  <div    class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='45'  data-y='30'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'></div>
                  <div    class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='45'  data-y='70'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'></div>
                  <div    class='tp-caption sfb  tp-resizeme ' data-x='45'  data-y='360'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'></div>
                  <div    class='tp-caption Title sft  tp-resizeme ' data-x='45'  data-y='130'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'>
                   </div>
                  <div    class='tp-caption Title sft  tp-resizeme ' data-x='45'  data-y='400'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;font-size:11px'></div>
                </li>
                <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='images/mens-tshirt.jpg' class="black-text"><img src='images/mens-tshirt.jpg'  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                  <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='45'  data-y='30'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'></div>
                  <div    class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='45'  data-y='70'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'></div>
                  <div    class='tp-caption sfb  tp-resizeme ' data-x='45'  data-y='360'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'></div>
                  <div    class='tp-caption Title sft  tp-resizeme ' data-x='45'  data-y='130'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><br>
                    </div>
                  <div    class='tp-caption Title sft  tp-resizeme ' data-x='45'  data-y='400'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;font-size:11px'></div>
                </li>
<li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='images/slider2.jpg'><img src='images/slider2.jpg' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                  <div    class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='45'  data-y='30'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'></div>
                  <div    class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='45'  data-y='70'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'></div>
                  <div    class='tp-caption sfb  tp-resizeme ' data-x='45'  data-y='360'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'></div>
                  <div    class='tp-caption Title sft  tp-resizeme ' data-x='45'  data-y='130'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'>
                   </div>
                  <div    class='tp-caption Title sft  tp-resizeme ' data-x='45'  data-y='400'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;font-size:11px'></div>
                </li>
              </ul>
              <div class="tp-bannertimer"></div>
            </div>
          </div>
         
        </div>
        <aside class="col-xs-12 col-sm-12 col-md-3">
          <div class="RHS-banner">
            <div class="add"><a href="#"><img alt="banner-img" src="images/beddings.jpg" style="width: 100%"></a></div>
            <div class="add"><a href="#"><img alt="banner-img" src="images/tshirt3.jpg" style="width: 100%"></a></div>
          </div>
        </aside>
      </div>
    </div>
  </div>