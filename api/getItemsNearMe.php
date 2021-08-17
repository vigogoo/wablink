<?php
//include('connect.php');
include('Utilities.php');

date_default_timezone_set('Africa/Kampala');

$servername = "localhost";
$username = "justdeal_justsms";
$password = "justsms2017";
$dbname = "justdeal_main";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
//end connection

$util = new Utilities();

$json=array();
if(isset($_REQUEST['userId'], $_REQUEST['longitude'], $_REQUEST['latitude'])){
	$userId = addslashes($_REQUEST['userId']);
    $longitude = addslashes($_REQUEST['longitude']);
    $latitude = addslashes($_REQUEST['latitude']);
	
	$today1= new DateTime();
   	$today = $today1->format('Y-m-d H:i:s');
    
	if($userId && $userId!='0'){
		
		$start=0;
  		$end=40;
		$page=1;
  		$start+=($page*40)-40;
  		//6371 kilometers
  		// 3959 miles
		//get listing
		$sql = "select t1.item_id, t1.sub_category_id, t2.sub_category_name as subcat_name, t2.category_id, t3.category_name as cat_name, t1.item_name, t1.details, t1.expiry_date, item_size.old_price, item_size.new_price, t4.longitude as lon, t4.latitude as lat, t4.email, t4.telephone, t4.address, ( 6371 * ASIN(SQRT( POWER(SIN((?-abs(t4.latitude)) * pi()/180 / 2),2) + COS(? * pi()/180 ) * COS( 
	abs(t4.latitude) *  pi()/180) * POWER(SIN((?-t4.longitude)*pi()/180 / 2), 2) )) )
	as distance, t4.business_name from item t1 
		inner join item_size on(t1.item_id=item_size.item_id) 
		INNER JOIN sub_category t2 on(t1.sub_category_id= t2.sub_category_id)
		INNER JOIN category t3 on(t2.category_id= t3.category_id)
		INNER JOIN business t4 on (t1.bid= t4.bid)
		ORDER BY distance asc limit $start,$end";
		
	   	$stmt4 = $mysqli->prepare($sql);
		$ddi='ddd';
		$stmt4->bind_param($ddi,$latitude, $latitude,$longitude);
		$stmt4->execute();
		
		if ($stmt4->errno) {
		  //echo "FAILURE!!! " . $stmt4->error;
		  $json['listing_status']="empty";
		}else{
			
		$stmt4->store_result();
		$stmt4->bind_result($id, $sub_cat_id, $subcat_name, $cat_id, $cat_name, $name, $details, $expiry_date, $old_price, $new_price, $lon, $lat, $email, $telephone, $address, $distance, $business_name);
		$i=0;
		$image_display;
		while($stmt4->fetch()){
		$sql2 = mysqli_query($mysqli, "select * from item_photo  where item_id ='$id'");
        if ($sql2) {
			$img_count=0;
            while ($row2 = mysqli_fetch_array($sql2)) {
                $pic = $row2['photo_name'];
                if($img_count==0){$image_display= 'http://justcreativemedia.com/justdeals/images/products/'.$pic;}
			   $img_count++;
            }
        } else {
           	$image_display= 'http://justcreativemedia.com/justdeals/images/products/default.jpg' ;
        }
			$outArr1 =array('itemid'=>$id, 'sub_cat_id'=>$sub_cat_id, 'subcat_name'=>$subcat_name, 'cat_id'=>$cat_id, 'cat_name'=>$cat_name, 'item_name'=>$name, 'details'=>$details, 'date_created'=>$expiry_date, 'old_price'=>$old_price, 'new_price'=>$new_price, 'lon'=>$lon, 'lat'=>$lat, 'email'=>$email, 'telephone'=>$telephone, 'address'=>$address, 'image_display'=>$image_display, 'distance'=>(number_format((float)($distance/1000), 4, '.', ''))."KM", 'business_name'=>$business_name);
			$json['listing'][]=$outArr1;
			$i++;
			
			}
		if($i>0){
			$json['listing_status']="ok";
		}else{
		  $json['listing_status']="empty";
		}// end of listing
		
		}
		$stmt4->close();
		
		
		//now get sliders
		$slider = $util->getSliderImages();
   //print_r($slider);
    $sliderImages = array();
   $sliderLength = count($slider);
   $j=0;
			for($j =0;$j < $sliderLength; $j++ ){
				$dataSlider = array(
				  'slider_images' => $slider[$j],
				  'success' => '0'
				);
			array_push($sliderImages,$dataSlider);
			}
			//array_push($response,$sliderImages);
			//array_push($response,$sliderI = array( 'Slider_Images' => $sliderImages));
			$json['Slider_Images']=$sliderImages;
			
			if($j>0){
				$json['slider_status']="ok";
			}else{
				$json['slider_status']="empty";
			}
			
		
		
		$json['status']='ok';
}else{ 
   		$json['status']='missing1';
   	}	   
}else{ 
  $json['status']= "missing2";
}
   
   echo json_encode($json);	

?>