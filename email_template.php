<?php
function email_template($subject, $body, $table){
	$link="http://www.siyabongaafrica.org/";
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<link href="<?php echo $link; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $link; ?>css/style-main.css" rel="stylesheet" type="text/css">
<link href="<?php echo $link; ?>css/responsive.css" rel="stylesheet" type="text/css">
<link  href="<?php echo $link; ?>js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $link; ?>css/colors/theme-skin-blue.css" rel="stylesheet" type="text/css">
<!-- external javascripts -->
<script src="<?php echo $link; ?>js/jquery-2.2.4.min.js"></script>
<script src="<?php echo $link; ?>js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="<?php echo $link; ?>js/jquery-plugin-collection.js"></script>
</head>
<body class="">
<div style="background-color: #fff" id="wrapper">
  <!-- Start main-content -->
  <div style="padding: 30px; border: 5px dotted #f7941e; margin:20px;  padding-top: 0px" class="main-content">
<div class="row">
<div class="col-md-12">
<h3 style="text-align: center;" class="text-theme-colored"><img style="max-width: 200px" src="http://justdealsug.com/deals.png" alt=""></h3>
<hr/>
<h4 style="text-align: center; color: #333"><?php echo $subject; ?></h4>
</div>
</div>
<div class="row">
<div class="col-md-12">
<p style="margin-top: 20px; color: #333"><?php echo $body; ?></p>
 <table style="color: #333" class="table table-striped  table-colored table-info">   
  <tbody>  
 <?php echo $table; ?>
  </tbody>
     </table>
</div>

</div>


<hr/>
<footer>

<p style="padding: 40px; color: #333"><b>Yours In Service:<br/>Just Deals Team</b></p>
<div class="col-md-12">
 <span style="color: #999">&copy; 2017 Just Deals</span>  <span style="padding-left: 100px; font-size: 11px"><a target="_blank" href="http://justcreativemedia.com">
 <!--<img style="max-width: 30px" src="<?php echo $link; ?>img/logo_small.png">-->
 &nbsp;Just Creative Media Inc</span>

</div>
</footer>
</div>
</div>
</body>
</html>
<?php }

//call this for the siyabonga email Template
function get_email_template($subject, $body, $table){
  ob_start();                  
email_template($subject, $body, $table);
 $data=ob_get_contents();
 ob_end_clean();

return $data;
}



/*echo get_email_template("New Ambassadar Aplication","I would like to become Siyabonga Ambassadar","<tr><td>Name</td><td>John Bakla</td></tr><tr><td>Name</td><td>John Bakla</td></tr><tr><td>Name</td><td>John Bakla</td></tr>");*/


?>