<?php
include "header.php";
if(isset($_REQUEST['cid'])){
  $item_id=$_REQUEST['cid'];
}else{
  exit();
}
?>
    <div class="col-md-9">
<?php
$sel=mysqli_query($conn,"SELECT * from item where item_id='$item_id'");
$val=mysqli_fetch_assoc($sel);
?>
      <div class="content-wrapper">
        <div class="content-inner">
          <div class="page-header">
  <div class="header-links hidden-xs">
    <a href="?logout"><i class="icon-signout"></i> Logout</a>
  </div>
  <h3><i class="icon-bar-chart"></i>  <?php 
  echo $val['item_name'];
  /*
  echo  $val['crane_name']." ".$val['license_number'].", load: ".$val['max_load']."kg, height: ".$val['max_height']."ft, radius: ".$val['max_radius']."ft, Hiring cost: ".$val['cost']." <br/><i class='icon-user'></i> Owned by: ".$val['fullname']." ".$val['telephone']." ".$val['email'];
  */
  ?></h3>
</div>
       
          <div class="main-content" style="padding-top:10px">
		  <div class="row" style="margin-bottom:10px;text-align:center">
		   <?php 
		   $selx= mysqli_query($conn,"SELECT * from item_photo where item_id='$val[item_id]'");
		   while($valx=mysqli_fetch_assoc($selx)){					
							?>            
             <a style="margin-left:10px"  href="#" onClick="load_preview('<?php echo  $valx['photo_name']; ?>')"> 
			  <img onClick="load_preview('<?php echo  $valx['photo_name']; ?>')"  src="<?php echo $site_name; ?>/images/products/<?php echo str_replace(".","_thumb.",$valx['photo_name']);  ?>"   style="border:3px solid #CCCCCC;width:150px" />            
			     </a> 
			<?php } ?>
			
		  </div>
            <div class="widget">
              <p><i class="icon-table"></i> ITEM DETAILS &nbsp;&nbsp;&nbsp;</p>
              <div class="widget-content-white glossed">
                <div class="padded">
               <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
					<th>ID</th>
                      <th>NAME</th>
                      <th class="text-center">UNITS</th>
					  <th class="text-center">OLD PRICE</th>
                      <th class="text-center">NEW PRICE</th>
                      <th class="text-center">DISCOUNT %</th>                      
					  <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
$selx=mysqli_query($conn,"SELECT *  from item i inner join item_size s on (i.item_id=s.item_id) where i.item_id='$item_id'");
while($valx=mysqli_fetch_assoc($selx)){
	
	$item_id=$valx['item_id'];	
	$item_name=$valx['item_name'];
	$details=$valx['details'];
	$size=$valx['size'];
	$old_price=$valx['old_price'];
	$new_price=$valx['new_price'];
	$discount=((($old_price-$new_price)/$old_price)*100);
?>     <tr>

                      <td><?php echo $item_id; ?></td>
                      <td><?php echo $item_name; ?></td>
                      <td class="text-center"><?php echo $size; ?></td>
                      <td class="text-center"><?php echo $old_price; ?></td>
                      <td class="text-center"><?php echo $new_price; ?></td>
                      <td class="text-center"><?php echo round($discount,0); ?></td>
					  
					  <td class="text-center">&nbsp;			 
					 </td>
                      
                    </tr>
					<tr><td>&nbsp;</td><th>DETAILS: </th><td colspan="4"><?php echo $details; ?></td><td>&nbsp;</td></tr>

<?php
}
?>					
				 </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<div id="overlay">
			<div id="image_change_div" style="background-color:rgba(0,0,0,0.5)"> 
			
			</div>
			<p style="text-align:center;  position:fixed;left:10px;top:20px;width:50px; background-color:#666666; border-radius:25px;" onClick="close_overlay()"><a onClick="close_overlay()" href="#"><span><i style="color:#eeeeee;font-size:30px" class="icon-remove"></i></span></p>
</div> 
 <style type="text/css">
#overlay{
    position: fixed;
	visibility:hidden;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    opacity: 1;
    z-index: 10000;
}
#image_change_div{
margin:auto;
width:100%;
height:100%;
margin-top:0px;
overflow:visible;
}
</style>

<script type="text/javascript">
 function load_preview(photo_name){
	 //alert(photo_id);return;
	// document.getElementById("ri-grid").style.visibility = "hidden";
	 document.getElementById("overlay").style.visibility = "visible";	
	document.getElementById("image_change_div").innerHTML="<div style='position:relative;height: 100%;  overflow: hidden;'><img style='position:absolute;left:0;right:0;top:40px;margin:auto;max-height:100%' src='<?php echo $site_name; ?>/images/products/"+photo_name+"' /><div>"; 
 }
 
  function close_overlay(){
	 //document.getElementById("ri-grid").style.visibility = "visible";
	 document.getElementById("overlay").style.visibility = "hidden";
	  var elem = document.getElementById('object1');
    elem.parentNode.removeChild(elem);
 }	
 </script>
<?php include "footer.php";?>
