<?php

include('connect.php');


$response = array();

$bid = $_REQUEST['bid'];
//$bid = 1;

$sql = "select item.*,order_details.*,ordered_item.*,order_details.order_details_id as order_id, order_details.time as ordered_time, order_details.status as code_status, customer.* from ordered_item inner join order_details on (ordered_item.order_details_id= order_details.order_details_id) inner join item on (ordered_item.item_id = item.item_id) inner join customer on (order_details.customer_id = customer.customer_id) where item.bid = '$bid' ";

$result1 = $conn->query($sql);
if ($result1) {
	  $i=0;
		while($row = $result1->fetch_assoc()){
				$data = array(
			'order_id' => $row['order_id'],
			'vouchercode' => $row['verification_code'],
			'customer_name'=> $row['name'],
			'time'=> $row['ordered_time'],
			'status'=> $row['code_status'],
			'contact' => $row['contact']
		);
		//array_push($response, $data);
		$response['listing'][]=$data;
	
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