<script type="text/javascript">
function add_to_cart(id){
  $('#my_shopping_cart').load("add_to_cart.php?item_id="+id);
  /*$.get("add_to_cart.php?item_id="+id, function(data, status){
        //alert("Data: " + data + "\nStatus: " + status);
            });*/
}

function delete_from_cart(id){
  $('#my_shopping_cart').load("delete_from_cart.php?item_id="+id);
  /*$.get("add_to_cart.php?item_id="+id, function(data, status){
        //alert("Data: " + data + "\nStatus: " + status);
            });*/
}
</script>

<script type="text/javascript" src="jscroll/jquery.jscroll.js"></script>

<script type="text/javascript">
  // autoTrigger on scroll until after the third request is loaded
$('#product_special_1').jscroll({
    autoTriggerUntil: 3,
    nextSelector: 'a.jscroll-next:last',
    loadingHtml: '<p style="text-align:center"><img src="example_loading.gif" alt="Loading" /> Loading...<p>'
});
</script>

<script src="lazyload/jquery.lazyload.js"></script>
  <script type="text/javascript">
$("img.lazy").lazyload({
    effect : "fadeIn"
});
  </script>

<script type="text/javascript">
      $(".alert").fadeOut(7000, function() {       

        $(this).remove(); 
    }); 
</script>


<footer class="footer wow bounceInUp animated" >
   
    <div class="footer-middle container" style="padding-top: 50px">
      <div class="row">
        <div class="col-md-3 col-sm-4">
          <div class="footer-logo"><a href="index.php" title="Logo"><img src="images/logo.png" alt="logo" style="max-height:70px; max-width:70px;" ></a></div>
          <p style="color: #FFFFFF">Bridging Businesses to Customers Online. </p>
          <div class="payment-accept">
            <div style="color: #ccc;"><span style="padding-right: 10px; border-bottom: 1px solid #fdd922;"><a href="#"> Things to do</a></span> <span style="border-bottom: 1px solid #fdd922;"><a href="#"> Great discounts </a></span><br> <span style="padding-right: 10px; border-bottom: 1px solid #fdd922;"><a href="#"> Eat for free </a></span> <span style="border-bottom: 1px solid #fdd922;"><a href=""> Travel for less </a></span> <br><span style="border-bottom: 1px solid #fdd922;"><a href="#"> Buy free!</a></span> </div>
          </div>
        </div>
        <div class="col-md-2 col-sm-4">
          <h4>Get To Know Us</h4>
          <ul class="links">
            
			<li class="first" style="color: #FFFFFF"><a href="about_us.php" title="" style="color: #FFFFFF">About Us</a></li>
            <li class="last" style="color: #FFFFFF"><a href="contact_us.php" title="Contact Us" style="color: #FFFFFF">Contact Us</a></li>
           
            
          </ul>
        </div>
        <div class="col-md-2 col-sm-4">
          <h4>We Are Here For You</h4>
          <ul class="links">
            <li class="first" style="color: #FFFFFF"><a title="Your Account" href="login.php" style="color: #FFFFFF">Your Account</a></li>
           
            <li class="last" style="color: #FFFFFF"><a title=" Additional Information" href="register.php" style="color: #FFFFFF">Register with Us</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-4">
          <h4>Information</h4>
          <ul class="links">
            <li style="color: #FFFFFF"><a href="how-to-buy.php" title="How to buy" style="color: #FFFFFF">How to Buy</a></li>
            <li style="color: #FFFFFF"><a href="terms_of_use.php" title="Search Terms" style="color: #FFFFFF">Terms of Use</a></li>
           
			<li><a href="faq.php" title="FAQs" style="color: #FFFFFF">FAQs</a></li>
            
            <li class="last" style="color: #FFFFFF"><a href="return_policy.php" title="Return policy" style="color: #FFFFFF">Return policy</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-4">
          <h4 >Contact us</h4>
          <div class="contacts-info">
            <address style="color: #FFFFFF">
            <i class="add-icon" style="color: #FFFFFF">&nbsp;</i>Kabarole Fort Portal<br>&nbsp;
            </address>
            <div class="phone-footer" style="color: #FFFFFF"><i class="phone-icon">&nbsp;</i> + 256 779 97109</div>
            <div class="email-footer"> <i class="email-icon">&nbsp;</i> <a href="#" style="color: #FFFFFF">info@yieldharvest.com</a> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
         <div class="col-sm-5 col-xs-12 coppyright" style="color: #FFFFFF"> &copy; <?php echo date("Y") ?> Yield Harvest. All Rights Reserved.  </div>
          <div class="col-sm-7 col-xs-12 company-links">
            <ul class="links">
              <li style="color:#FFFFFF;" style="color: #FFFFFF">Designed by <a href="#" style="color: #FFFFFF">Berryzyl</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer --> 
</div>
<!-- JavaScript --> 

</body>

</html>
