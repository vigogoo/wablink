<?php
 include("../../connect.php");
  session_start();
  if(isset($_REQUEST['category'])){
    $_SESSION['category']=$_REQUEST['category'];
    header("Location:index.php");
  }elseif(!isset($_SESSION['category'])){
     echo "No category";
	 return;
  }else{
    $category=$_SESSION['category'];
	$sel=mysql_query("select * from last_edited where category='$category'")or die(mysql_error());
	$val=mysql_fetch_array($sel);
	$lastimage=$val['photo_name'];
	//get the id of the last photo
	$selx=mysql_query("select * from photo where photo_name='$lastimage' && category='$category'")or die(mysql_error());
	$valx=mysql_fetch_array($selx);
	$lastid=$valx['photo_id'];
	//get id of the next photo to be edited;
	$sely=mysql_query("select * from photo where photo_id > '$lastid' && category='$category' order by photo_id asc")or die(mysql_error());
	$valy=mysql_fetch_array($sely);
	if($valy){
	$nextid=$valy['photo_id'];
	$nextphoto=$valy['photo_name'];
	}else{
	  $sely=mysql_query("select * from photo where category='$category' order by photo_id asc")or die(mysql_error());
	  $valy=mysql_fetch_array($sely);
	  $nextid=$valy['photo_id'];
	  $nextphoto=$valy['photo_name'];
	}
	/*$ext= explode(".", $lastimage);//explode the image name
	$last_value=$ext[0];//the name of the image without the extension
	if($last_value==21){
	$next_value=1;
	}else{
	$next_value=$last_value+1;
	}*/
	$next_value=time()."".rand(100, 1000);
  }
?>
<?php

// If you want to ignore the uploaded files, 
// set $demo_mode to true;

$demo_mode = false;
$upload_dir = '../../images/'.$category."/";//where to upload images
$new_image=$next_value.".jpg";//image name
$allowed_ext = array('jpg','jpeg','png','gif','JPG','PNG');


if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
	exit_status('Error! Wrong HTTP method!');
}


if(array_key_exists('file',$_FILES) && $_FILES['file']['error'] == 0 ){
	
	$file = $_FILES['file'];

	if(!in_array(get_extension($file['name']),$allowed_ext)){
		exit_status('Only '.implode(',',$allowed_ext).' files are allowed!');
	}	

	if($demo_mode){
		
		// File uploads are ignored. We only log them.
		
		$line = implode('		', array( date('r'), $_SERVER['REMOTE_ADDR'], $file['size'], $file['name']));
		file_put_contents('log.txt', $line.PHP_EOL, FILE_APPEND);
		
		exit_status('Uploads are ignored in demo mode.');
	}
	
	
	// Move the uploaded file from the temporary 
	// directory to the uploads folder:
	
	if(move_uploaded_file($file['tmp_name'], $upload_dir.$new_image)){
	//after uploading the image, compress it to reduce space consumtion
	$source_img      = $upload_dir.$new_image; 
    $destination_img = $upload_dir.$new_image; 
	$fsx=filesize($source_img);
	//$d = compress($source_img, $destination_img, 10);
	if($fsx >= 2000000){
	   $d = compress($source_img, $destination_img, 10);
	}
	elseif($fsx >= 1000000){
	   $d = compress($source_img, $destination_img, 20);
	}
	elseif($fsx >= 100000){
	   $d = compress($source_img, $destination_img, 30);
	}
	elseif($fsx >= 10000){
	   $d = compress($source_img, $destination_img, 40);
	}	
	else{
	   $d = compress($source_img, $destination_img, 60);
	}
	//insert file information into db table
	$time=time();
	mysql_query("update last_edited set photo_name='$new_image' where category='$category'")or die(mysql_error());
	 mysql_query("update photo set update_time='$time',photo_name='$new_image' where photo_id='$nextid' && category ='$category'")or die(mysql_error());
	 $oldfile=$upload_dir.$nextphoto;
	 unlink($oldfile);//delete previous file
	/*$selx=mysql_query("Select * from photo where category='$category' && photo_name='$new_image'")or die(mysql_error());
	$valx=mysql_fetch_array($selx);	
	if($valx){
	  mysql_query("update photo set update_time='$time' where photo_name='$new_image'")or die(mysql_error());
	}else{
	    mysql_query("insert into photo set update_time='$time',photo_name='$new_image',title='$category',comment='Classic photo', category='$category'")or die(mysql_error());
	}*/
		exit_status('File was uploaded successfuly!');
	}
	
}

exit_status('Something went wrong with your upload!');


// Helper functions

function exit_status($str){
	echo json_encode(array('status'=>$str));
	exit;
}

function get_extension($file_name){
	$ext = explode('.', $file_name);
	$ext = array_pop($ext);
	return strtolower($ext);
}
?>

<?php 

function compress($source, $destination, $quality){ 
$info = getimagesize($source); 
if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source);
 elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source); 
 elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source); 
 imagejpeg($image, $destination, $quality); 
 return $destination; 
 } 

 ?> 