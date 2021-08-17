<?php

include('connect.php');
include('Utilities.php');

$response = array();
$imageList = array();
$util = new Utilities();

$user_id = $_REQUEST['user_id'];
$sql = "select * from order_details where customer_id = '$user_id'";

$result1 = $conn->query($sql);
if ($result1) {
	  $i=0;
while($row = $result1->fetch_assoc()){
	$order_id = $row['order_details_id'];
    $sql2 = "select ordered_item.*,item.*,item.item_id as theId, business.* from ordered_item left outer join item on (ordered_item.item_id = item.item_id) left join business on(item.bid = business.bid)  where order_details_id = '$order_id'";

    $res2 = $conn->query($sql2);
if ($res2) {
	$image_display;
    
	while ($row2 = $res2->fetch_assoc()) {
        $id = $row2['theId'];
		$item_name = $row2['item_name'];
		$business_name = $row2['business_name'];
        $business_tel = $row2['telephone'];
        
        $sql2 = mysqli_query($conn, "select * from item_photo  where item_id ='$id'");
        if ($sql2) {
			$img_count=0;
            while ($row2 = mysqli_fetch_array($sql2)) {
                $pic = $row2['photo_name'];
                $dataImages = array(
			   'image'=> 'http://justcreativemedia.com/justdeals/images/products/'.$pic ,
			'item_name' => $item_name);
			   
			   if($img_count==0){$image_display= 'http://justcreativemedia.com/justdeals/images/products/'.$pic;}
			   $img_count++;
			 array_push($imageList,$dataImages);
            }
        } else {
            $dataImages = array(
			   'image'=> 'http://justcreativemedia.com/justdeals/images/products/default.jpg' ,
			'item_name' => $item_name);
			 array_push($imageList,$dataImages);
        }
       
    }
}/*else{
	$response['status']="empty";
}
 */   


    $data = array(
		'business_name' => $business_name,
        'business_tel' => $business_tel,
        
        'order_details_id' => $row['order_details_id'],
        'customer_id' => $row['customer_id'],
        'location' => $row['location'],
		'verification_code' => $row['verification_code'],
        'images' => $imageList,
        'time' => $util->formatDate($row['time']),
		'status' => $row['status']
    );
    unset($imageList);
    $imageList = array();
    $response['listing'][]=$data;
	//array_push($response, $data);
	
	$i++;
    
}
		if($i>0){
			$response['status']="ok";
		}else{
		  $response['status']="empty";
		}// end of categories
}else{
//echo "FAILURE!!! " . $stmt4->error;
  $response['status']="empty";
}

echo json_encode($response);
?>
