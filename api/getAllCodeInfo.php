<?php

include('connect.php');
include('Utilities.php');

$response = array();
$util = new Utilities();

 $order_details_id = $_REQUEST['order_id'];
//$order_details_id  = 40001099;
$sql = "select order_details.status, order_details.time, ordered_item.*,item.*, business.business_name, business.telephone as business_phone, ordered_item.item_id as my_item_id from order_details inner join ordered_item on(order_details.order_details_id= ordered_item.order_details_id) left outer join item on (ordered_item.item_id = item.item_id) left join business on(item.bid = business.bid)  where order_details.order_details_id = '$order_details_id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$image_display;
    
    while($row = $result->fetch_assoc()) {
	
     $id = $row['my_item_id'];
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
            'item_id' => $id,
            'status' => $row['status'],
            'time' => $row['time'],
            'quantity' => $row['quantity'],
            'business_name' => $row['business_name'],
            'business_phone' => $row['business_phone'],
            'cost'=> $row['cost'],
            'item_name' => $row['item_name'],
            'desc' => $row['details'],
            'image' => $image_display  
        );
        unset($imageList);
    $imageList = array();
    array_push($response, $data);
}


}

echo json_encode($response);
?>