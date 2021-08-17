<?php 

 include('connect.php');
 include('Utilities.php');
 
   $item_id =  $_POST['item_id'];
   $util = new Utilities();
 $response = array();
 $imageList = array();
 $otherItems = array();
 
 $category_id=0;
 //get category id
	$sqlc = "select category_id from item where item.item_id = '$item_id'"; 
 	$resultc = $conn->query($sqlc);
	if($resultc){
	 while($rowc = $resultc->fetch_assoc()){
		 $category_id=$rowc['category_id'];
	
		}//end while for cat
	}//end if
	
 $sqlOtheritems = "select item_size.size, item_size.old_price, item_size.new_price, item.*,item.item_id as itemId,business.*,business.bid as bizzId from item inner join item_size on(item.item_id=item_size.item_id) left outer join business on (item.bid = business.bid)  where item.category_id='$category_id' and item.item_id!= '$item_id' order by item.date_created desc limit 3"; 
 $result2 = $conn->query($sqlOtheritems);//where item.category_id = '$category_id' 

    
	//others
	 if($result2){
	 	 // output data of each row
	$image_display;
    while($row2 = $result2->fetch_assoc()){
		$id = $row2['itemId'];
		$sql2 = mysqli_query($conn, "select * from item_photo  where item_id ='$id'");
        if ($sql2) {
			$img_count=0;
            while ($row3 = mysqli_fetch_array($sql2)) {
                $pic = $row3['photo_name'];
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
		
			  $data2 = array(
	     'itemid' => $id,
		 'item_name' => $row2['item_name'],
		 'details' => $row2['details'],
	     'sub_category_id' => $row2['sub_category_id'],
	     'category_id' => $row2['category_id'],
		 'bid' => $row2['bizzId'],
		 'lat' => $row2['latitude'],
		 'lng' => $row2['longitude'],
		 'images' => $imageList,
		 'image_display'=> $image_display,
		 'old_price' => $row2['old_price'],
		 'new_price' => $row2['new_price'],
		 //'size' => $row2['size'],
		 'business_name' => $row2['business_name'],
		 'date_created' => $row2['expiry_date'],//$util->formatDate($row2['date_created']),
		 'address' => $row2['address'],
		 'success' => '1'
	   );
	     unset($imageList);
             $imageList = array();
		 array_push($otherItems,$data2);
	 }
	 
	 //array_push($response,array('otherItems' => $otherItems));
	 
	 
 }//end of others
 
 
 
$sql = "select item_size.size, item_size.old_price, item_size.new_price, item.*,item.item_id as itemId,business.*,business.bid as bizzId from item inner join item_size on(item.item_id=item_size.item_id) left outer join business on (item.bid = business.bid) 
  where item.item_id = '$item_id'"; 
 $result = $conn->query($sql);
 
 if ($result) {
	 $category_id ;
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
		 'business_name' => $row['business_name'],
		 'date_created' => $row['expiry_date'],//$util->formatDate($row['date_created']),
		 'address' => $row['address'],
		 'otherItems' => $otherItems,
		 'success' => '1'
	   );
	     unset($imageList);
             $imageList = array();
	   array_push($response,$data);
	}
	
 }else{
	 echo $conn->error();
 }
$conn->close();
echo json_encode($response);


?>