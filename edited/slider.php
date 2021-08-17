
	<div style="width: 98% ;  margin:auto">
	<div class="row">



 <!-- Slider rev_slider_4-->
  <div style="max-height: 400px;  " id="magik-slideshow" class="magik-slideshow col-md-12">
    <div style="" class="container">
      <div class="row">


<div  class="col-md-2">
    <div class="header_category">
<div id="boss-menu-category" class="box">
  <div class="boss_heading"><div class="box-heading"><span>Categories</span></div></div>
  <div class="box-contents">
    <ul class="box-category boss-menu-cate">
	      <?php 
		  $sel=mysql_query("SELECT * from category") or die (mysql_error());
		 
		  while($val=mysql_fetch_array($sel)){
			  $catId = $val['category_id'];
			  $catName = $val['category_name'];
			  
		  
		  ?>
		  
				
				<li>
			<div class="nav_title">
				<p class="plus visible-xs">+</p>				<a class="title" href="index.php?category_id=<?php echo $catId; ?>">
				<img  src="image/cache/catalog/bt_superdeal/icon2-20x25.png" />
				<span style="font-size: 12px"><?php echo $catName;?></span></a>
						<div class="nav_submenu" style="width:250px;">
								
								<div class="nav_sub_submenu">
					<ul><?php
					$select=mysql_query("SELECT * from sub_category where category_id= '$catId'") or die (mysql_error());
		  while ($vale=mysql_fetch_array($select)){
			  $subId=$vale['sub_category_id'];
			  $subName=$vale['sub_category_name'];
			
					?>
					 
												<li  style="width:198px;">
							<a href="index.php?sub_category_id=<?php echo $subId; ?>"><?php echo $subName; ?></a>
													</li>
												<?php 
												
		  }?>
												
											</ul>
				</div>
				
			</div></div>
		</li>
		<?php 
		
		  }?>
	  		
	  	      </ul>
  </div>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
		loadtopmenu();
	});
	$("#boss-menu-category .boss_heading").click(function(){
		$('#boss-menu-category').toggleClass('opencate');
		loadtopmenu();
	});
	function loadtopmenu(){
		var menuheight = $('#boss-menu-category .box-content').outerHeight();
		var topcate = $('#boss-menu-category').offset().top;
		$('.boss-menu-cate .nav_title').each(function(index, element) {
			var liheight = $(this).outerHeight();
			var subheight = $(this).next('.nav_submenu').outerHeight();
			var topheight = $(this).offset().top - topcate -55;
			if((subheight < menuheight)&&(subheight < topheight)){
				var bottomh = topheight - subheight + liheight + 14;
				$(this).next('.nav_submenu').css('top', bottomh + 'px');
			}else{
				$(this).next('.nav_submenu').css('top', '0px');
			}
		});
	}
  </script>
</div>
</div>  </div>


        <div  class="col-md-7 wow  animated">
          <div  id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
            <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
              <ul>
                <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='images/baner-01.jpg'><img src='images/baner-01.jpg' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>

                  <div    class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='45'  data-y='30'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>Exclusive of designer</div>
                  <div    class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='45'  data-y='70'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap; background-color: #fff'>Handbags & Purses</div>
                  <div    class='tp-caption sfb  tp-resizeme ' data-x='45'  data-y='360'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="view-more">View More</a> <a href='#' class="buy-btn">Buy Now</a></div>
                 
                </li>
                <li style="color:#fff" data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='images/baner-02.jpg' class="black-text"><img src='images/baner-02.jpg'  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                  <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='45'  data-y='30'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;color:#fff'>Super Hot</div>
                  <div    class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='45'  data-y='70'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;color:#fff'>Go Lightly</div>
                  <div    class='tp-caption sfb  tp-resizeme ' data-x='45'  data-y='360'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="view-more">View More</a> <a href='#' class="buy-btn">Buy Now</a></div>
                 
                </li>
              </ul>
              <div class="tp-bannertimer"></div>
            </div>
          </div>
        </div>
        <aside  class="col-md-3 wow animated">
          <div  class="RHS-banner">
            <div class="add"><a href="#"><img style="max-height: 332px" alt="banner-img" src="images/baner-03.jpg"></a>
              <div class="overlay"><a class="info" href="#">Learn More</a></div>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>




	</div>
	</div>