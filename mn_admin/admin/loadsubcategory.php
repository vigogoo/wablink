 <select  name="sub_category" class="form-control" > 
<?php
include("../../connect.php");
include("security.php");
if(isset($_REQUEST['cat'])){
$cat=$_REQUEST['cat'];
$sel=mysqli_query($conn,"SELECT * from sub_category where category_id='$cat'");

while($val=mysqli_fetch_assoc($sel)){
?>
	
	<option value="<?php echo $val['sub_category_id'];?>"><?php echo $val['sub_category_name'];?></option>
	
	
<?php	
}
}
?>
 </select>