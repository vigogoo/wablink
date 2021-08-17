<?php
  include("../../../connect.php");
   include("ImageManipulator.php");
  session_start();
  if(isset($_REQUEST['crane_id'])){
	  $crane_id=$_REQUEST['crane_id'];
  }else{
  	var_dump($_REQUEST);
      echo "<h1 style='color:red'>Photo not foundx</h1>";
	  return;
  }
  
  
  //get id of the next photo to be edited;
  $sel=mysqli_query($conn,"SELECT count(*) total from item_photo where item_id = '$crane_id'");
  $val=mysqli_fetch_assoc($sel);
  $count=$val['total'];
    $nextid="";
	$nextphoto="";
  //reached limit
  $reachedLimit=false;
  
  if($count < 5){
	$reachedLimit=false;
	$_SESSION['reachedLimit']=false;
  }else{
	 $reachedLimit=true; 
	 $_SESSION['reachedLimit']=true;
	 $sely = mysqli_query($conn,"SELECT * from item_photo where item_id = '$crane_id' order by update_time asc");
	 $valy = mysqli_fetch_assoc($sely);	
	 $nextid=$valy['photo_id'];
	 $nextphoto=$valy['photo_name'];	
  }
  
  $next_value=time()."".rand(100, 1000);
?>

<?php

// If you want to ignore the uploaded files, 
// set $demo_mode to true;

$demo_mode = false;
$upload_dir = "../../../images/products/";//where to upload images
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
	$max_width="1300";
	$width = getWidth($source_img);
			$height = getHeight($source_img);
			//Scale the image if it is greater than the width set above
			if ($width > $max_width){
				$scale = $max_width/$width;
				$uploaded = resizeImage($source_img,$width,$height,$scale);
			}else{
				$scale = 1;
				$uploaded = resizeImage($source_img,$width,$height,$scale);
			}
			
$im = new ImageManipulator($source_img);
$centreX = round($im->getWidth() / 2);
$centreY = round($im->getHeight() / 2);

$x1 = $centreX - 190;
$y1 = $centreY - 160;

$x2 = $centreX + 190;
$y2 = $centreY + 160;
//$thmb=str_replace(".","_thumb.",$new_image);
$im->crop($x1, $y1, $x2, $y2); // takes care of out of boundary conditions automatically
$im->save($upload_dir.str_replace(".","_thumb.",$new_image));

	
	//insert file information into db table
	$time=time();
	if($reachedLimit){
	 mysqli_query($conn,"UPDATE item_photo set update_time='$time',photo_name='$new_image' where photo_id='$nextid'");
	 $oldfile=$upload_dir.$nextphoto;
	 unlink($oldfile);//delete previous file
	 unlink($upload_dir.str_replace(".","_thumb.",$nextphoto));//delete previous thumb
	}else{
		mysqli_query($conn,"INSERT into item_photo set update_time='$time',photo_name='$new_image',item_id='$crane_id'");
	}
	$last_id = mysqli_insert_id($conn);
	$_SESSION['photo_id']=$last_id;
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

function compress($source, $destination, $quality) { 
$info = getimagesize($source); 
if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source);
 elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source); 
 elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source); 
 imagejpeg($image, $destination, $quality); 
 return $destination; 
 } 
 
 
 function resizeImage($image,$width,$height,$scale) {
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);	
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$image); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$image,90); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$image);  
			break;
    }
	
	//chmod($image, 0777);
	return $image;
}


//You do not need to alter these functions
function getHeight($image) {
	$size = getimagesize($image);
	$height = $size[1];
	return $height;
}
//You do not need to alter these functions
function getWidth($image) {
	$size = getimagesize($image);
	$width = $size[0];
	return $width;
}

 ?> 