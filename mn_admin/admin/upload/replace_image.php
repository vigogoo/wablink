<?php
  include("../../../connect.php");
    include("../../../config.php");
  session_start();

if(isset($_REQUEST['nextpic'])){//move to next photo by updating the update time of the current photo
   $pic=$_REQUEST['nextpic'];
   $time=time();
  mysqli_query($conn,"UPDATE item_photo set update_time='$time' where photo_name='$pic'");
 // header("Location:".$_SERVER['PHP_SELF']);
//echo var_dump($_REQUEST); exit();
}


  if(isset($_REQUEST['crane_id'])){
	  $_SESSION['crane_id']=$_REQUEST['crane_id'];
    $item_id=$_SESSION['crane_id'];
  }else{
      echo "<h1 style='color:red'>Photo not found</h1>";
	  return;
  }
  
  
  //get id of the next photo to be edited;
  $sel=mysqli_query($conn,"SELECT count(*) total from item_photo where item_id = '$item_id'");
  $val=mysqli_fetch_assoc($sel);
  $count=$val['total'];
    $nextid="";
	$nextphoto="";
  //reached limit
  $reachedLimit=false;
  
  if($count < 4){
	$reachedLimit=false;
	$_SESSION['reachedLimit']=false;
  }else{
	 $reachedLimit=true; 
	 $_SESSION['reachedLimit']=true;
	 $sely = mysqli_query($conn,"SELECT * from item_photo where item_id = '$item_id' order by update_time asc");
	 $valy = mysqli_fetch_assoc($sely);	
   //var_dump($valy); exit();
	 $nextid=$valy['photo_id'];
	 $nextphoto=$valy['photo_name'];	
  }
  //var_dump($_SESSION); exit();
?>
<!-- Add Dropzone -->
<link rel="stylesheet" type="text/css" href="<?php echo $site_name; ?>/mn_admin/admin/upload/css/dropzone.css" />
<script type="text/javascript">
function createPhotoThumb(){
    //alert('Image uploaded successfully. You can upload a maximum of 5 images');	
	document.getElementById('imageForm').innerHTML= '<META http-equiv="refresh" content="0;URL=<?php echo $site_name; ?>/mn_admin/admin/upload/crop/upload_thumb.php?crane_id=<?php echo $nextid; ?>"><img src="load.gif" />';
}
</script>

<script type="text/javascript" src="js/dropzone.js"></script>
<style type="text/css"> 
body{
color:#666666;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>
</head>
<body style="">
<div>
<div  id="imageForm"  class="image_upload_div" style="background-color:#F7F7F7; max-width: 600px; margin: auto;">

	<form action="upload2.php?crane_id=<?php echo $item_id; ?>" class="dropzone" style="background-color:#F7F7F7;">
	
    </form>
</div> 	
<?php 
if($reachedLimit){ 
?>
<p align="center">
<img src="<?php echo $site_name.'/images/products/'.$nextphoto;?>" style="max-height:300px;" /><br/><br/>
<?php //if($_SESSION['photo_limit']>1){?>
<a class="button" href="?nextpic=<?php echo $nextphoto; ?>&crane_id=<?php echo $item_id; ?>">Next photo</a>
<?php //} ?>
</p>
<?php 
} 
?>
<style type="text/css">
  ::-webkit-scrollbar {
    width: 10px;
  background-color:#red;
  }
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.9); 
    border-radius: 5px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 5px;
    -webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.9); 
}

  </style>
</body>
</html>  

    
    
    
    
    

