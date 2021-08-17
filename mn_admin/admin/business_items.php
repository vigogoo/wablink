<?php
include "header.php";
?>

<div class="col-md-9">
<?php
$sel=mysqli_query($conn,"SELECT * from business");
$val=mysqli_fetch_assoc($sel);
?>
<div class="content-wrapper">
<div class="content-inner">
<div class="page-header">
<div class="header-links hidden-xs">
<a href="?logout"><i  style="color:#f7f7f7" class="icon-signout"></i> Logout</a>
</div>
<p style="font-size:large"><i class="icon-bar-chart"></i> <?php echo $val['business_name']." ".$val['telephone'];?></p>
</div>

<div class="main-content">
<div class="widget" >
<h3 class="section-title first-title"><i class="icon-table"></i>Products in store &nbsp;&nbsp;&nbsp;&nbsp; 
  <form  method="POST" >
          <select    type="text" name="store" onchange="this.form.submit()" style="padding: 8px;border-radius: 10px;font-family: Arial;font-size: 14px;background: rgba(255, 255, 255, 0.7);">
                 <option>Sort by store:</option>
                
                 <?php 
    $selx=mysqli_query($conn,"SELECT *  from business");
while($valx=mysqli_fetch_array($selx)){ 
    ?>    
         
          
           <option value="<?php echo $valx['bid'];?> ">
            <?php echo $valx['business_name'];?>
          </option> 
            <?php } ?>
          </select>
        </form>

  <a href="<?php echo $site_name; ?>/mn_admin/admin/new_item/" class="btn btn-success btn-xs">Add New Product</a></h3>
<div class="widget-content-white glossed">
  <div class="padded">
 <table class="table table-striped table-bordered table-hover datatable">
    <thead>
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>UNITS</th>
        <th class="text-center">OLD PRICE  </th>
        <th class="text-center">NEW PRICE </th>					  
        <th class="text-center">DISCOUNT </th>
<th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      
<?php 
$store = $_REQUEST['store'];
echo "string";

if($store==""){
$selx=mysqli_query($conn,"SELECT *  from item  i inner join item_size s on(i.item_id=s.item_id) ORDER BY i.item_id DESC"); 
}
else
$selx=mysqli_query($conn,"SELECT *  from item  i inner join item_size s on(i.item_id=s.item_id) WHERE store_name ='$store' ORDER BY i.item_id DESC");

while($valx=mysqli_fetch_array($selx)){	
$item_id=$valx['item_id'];
$item_name=$valx['item_name'];
$size=$valx['size'];
$old_price=$valx['old_price'];
$new_price=$valx['new_price'];
$discount=((($old_price-$new_price)/$old_price)*100);
?>     <tr id="<?php echo $item_id; ?>">
        <td><?php echo $item_id; ?></td>
        <td><?php echo $item_name; ?></td>
        <td><?php echo $size; ?></td>
        <td class="text-center"><?php echo $old_price; ?></td>
        <td class="text-center"><?php echo $new_price; ?></td>

       <td class="text-center"><?php echo round($discount,0);  ?>%</td>

<td class="text-center">
<a style="margin-bottom:5px" href="<?php echo $site_name; ?>/mn_admin/admin/view_item_details/?cid=<?php echo $item_id; ?>" class="btn btn-primary btn-xs"><i class="icon-archive"></i> View</a>
&nbsp;
<a style="margin-bottom:5px" href="<?php echo $site_name; ?>/mn_admin/admin/edit_item.php?cid=<?php echo $item_id; ?>" class="btn btn-success btn-xs" ><i class="icon-edit"></i> Edit</a>
          &nbsp;
<!--a  style="margin-bottom:5px"  class="btn btn-danger btn-xs" onclick="deleteComment(<?php echo $item_id; ?>)"><i class=" icon-warning-sign"></i> Delete</a-->
<!--input type="button" value="Delete" onClick="deleteComment(<?php echo $item_id; ?>);"-->
<button class="btn btn-danger btn-sm remove">Delete</button>
</td>
       
      </tr>
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

<?php include "footer.php";?>
<script type="text/javascript">

    $(".remove").click(function(){

        var id = $(this).parents("tr").attr("id");


        if(confirm('You are about to delete an item from Miniprice,Do you want to continue?'))

        {

            $.ajax({

               url: '/delete.php',

               type: 'GET',

               data: {id: id},

               error: function() {

                  $("#"+id).remove();

                    alert("Record removed successfully");
               },

               success: function(data) {

                    $("#"+id).remove();

                    alert("Record removed successfully");  

               }

            });

        }

    });


</script>
<script type="text/javascript">
function deleteComment(id) {
var strconfirm = confirm("Are you sure you want to delete this item? this will remove all the records about this product.");
if (strconfirm == true) {
window.location.href = "?dltCrane&item_id="+id;
}
}
</script>
