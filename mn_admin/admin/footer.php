<div style="background:#dbf4b9; margin-bottom:0px; text-align:center; padding:5px; ">
	 <img style="border-radius:25px;width: 200px" src="<?php echo $site_name; ?>/logo.png"  /> 
	 
  </div>

<script type="text/javascript">

function PlaySound(soundObj) {
var sound = document.getElementById(soundObj);
sound.Play();
}

</script>
  <script type="text/javascript">
function loadUpdates(){
  $('#newOrders').load('<?php echo $site_name; ?>/mn_admin/admin/getOrders.php').fadeIn("slow");
  $('#clearedOrders').load('<?php echo $site_name; ?>/mn_admin/admin/unClearedOrders.php').fadeIn("slow");
  $('#soldItems').load('<?php echo $site_name; ?>/mn_admin/admin/soldItems.php').fadeIn("slow");
  $('#totalSales').load('<?php echo $site_name; ?>/mn_admin/admin/totalSales.php').fadeIn("slow");
}
setInterval(function ()
{
loadUpdates();
}, 10000); 


setInterval(function ()
{	
  $('#newOrders2').load('<?php echo $site_name; ?>/mn_admin/admin/newOrders.php').fadeIn("slow");
}, 20000);

function getOrderDetails(id){
	//alert(id);
  $('#overlayM').load('<?php echo $site_name; ?>/mn_admin/admin/orderDetails.php?id='+id);
}

function overlay(value) {
	el = document.getElementById(value);
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}
</script>

<script src="<?php echo $site_name; ?>/mn_admin/admin/js/jquery.min.js"></script>
<script src="<?php echo $site_name; ?>/mn_admin/admin/js/jquery-ui.min.js"></script>

<script src='<?php echo $site_name; ?>/mn_admin/admin/865b8229b0ce41d6b0c8e0fc7416f9f2.js'></script>

<script src='<?php echo $site_name; ?>/mn_admin/admin/67b4d81b44effbc5e221a119f719782b.js'></script>

</body>
</html>

