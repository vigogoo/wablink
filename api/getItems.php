<?php
include('connect.php');
include('Utilities.php');

date_default_timezone_set('Africa/Kampala');

$util = new Utilities();
 $response = array();
 $imageList = array();
 
 if(isset($_REQUEST['userId'], $_REQUEST['longitude'], $_REQUEST['latitude'], $_REQUEST['sortby'], $_REQUEST['page'], $_REQUEST['catid'])){
	$userId = addslashes($_REQUEST['userId']);
    $longitude = addslashes($_REQUEST['longitude']);
    $latitude = addslashes($_REQUEST['latitude']);
	$sortby = addslashes($_REQUEST['sortby']);
	$page = addslashes($_REQUEST['page']);
	$catid = addslashes($_REQUEST['catid']);

		$start=0;
  		$end=10;
		$start+=($page*10)-10;
  		
 //get subcategories
		$sql1 = "select category_id, category_name, cat_icon from category 
		ORDER BY category_name asc";
		$result1 = $conn->query($sql1);
		
		if ($result1) {
		  $i=0;
		while($rowc = $result1->fetch_assoc()){
			$id= $rowc['category_id'];
			$cat_icon= $rowc['cat_icon'];
			$name= $rowc['category_name'];
			$pic= 'http://justcreativemedia.com/justdeals/images/category/'.$cat_icon;
			$outArr1 =array('id'=>$id, 'name'=>$name, 'photo'=>$pic);
			$response['categories'][]=$outArr1;
			$i++;
			}
		if($i>0){
			$response['categories_status']="ok";
		}else{
		  $response['categories_status']="empty";
		}// end of categories
	}else{
		//echo "FAILURE!!! " . $stmt4->error;
		  $response['categories']="empty";
		}
		
		//choose category
	if($catid=='0'){
		$sql = "select item_size.size, item_size.old_price, item_size.new_price, item.*,item.item_id as itemId, business.*, business.bid as bizzId from item inner join item_size on(item.item_id=item_size.item_id) inner join business on (item.bid = business.bid) order by item.date_created desc limit $start,$end";

	}else{
		$sql = "select item_size.size, item_size.old_price, item_size.new_price, item.*,item.item_id as itemId, business.*,business.bid as bizzId from item inner join item_size on(item.item_id=item_size.item_id) inner join business on (item.bid = business.bid) where item.category_id='$catid' order by item.date_created desc limit $start,$end";

		}
	

 $result = $conn->query($sql);
	
		
if ($result->num_rows > 0) {
    // output data of each row
	$image_display;
    while($row = $result->fetch_assoc()) {
		$id = $row['itemId'];
		$sql2 = mysqli_query($conn, "select * from item_photo  where item_id ='$id'");
        if ($sql2) {
			$img_count=0;
            while ($row2 = mysqli_fetch_array($sql2)) {
                $pic = $row2['photo_name'];
                $dataImages = array(
			   'image'=> 'http://justcreativemedia.com/justdeals/images/products/'.$pic );
			   
			   if($img_count==0){$image_display= 'http://justcreativemedia.com/justdeals/images/products/'.$pic;}
			   $img_count++;
			 array_push($imageList,$dataImages);
            }
        } else {
            $dataImages = array(
			   'image'=> 'http://justcreativemedia.com/justdeals/images/products/default.jpg' );
			 array_push($imageList,$dataImages);
        }
		
       	$data = array(
	     'itemid' => $id,
		 'item_name' => $row['item_name'],
		 'details' => $row['details'],
	         'sub_category_id' => $row['sub_category_id'],
	         'category_id' => $row['category_id'],
		 'bid' => $row['bizzId'],
		 'lat' => $row['latitude'],
		 'lng' => $row['longitude'],
		 'images' => $imageList,
		 'image_display'=> $image_display,
		 'old_price' => $row['old_price'],
		 'new_price' => $row['new_price'],
		 //'size' => $row['size'],
		 'date_created' => $row['expiry_date'],
		 'address' => $row['address'],
         'business_name' => $row['business_name'],
		 'success' => '1'
	   );
	     unset($imageList);
             $imageList = array();
	   //array_push($response,$data);
	   $response['listing'][]=$data;
    }
	$response['listing_status']="ok";
} else {
    $response['listing_status']="empty";
}
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
			$response['Slider_Images']=$sliderImages;
			
			if($j>0){
				$response['slider_status']="ok";
			}else{
				$response['slider_status']="empty";
			}
			
$conn->close();
$response['status']="ok";
	
}else{
	$response['status']="empty";
	$response['slider_status']="empty";
	$response['listing_status']="empty";
	$response['categories_status']="empty";	
}
 
echo json_encode($response);
?>