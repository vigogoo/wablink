<?php

include('connect.php');
$response = array();

$search1 = $_REQUEST['search'];
$bid = $_REQUEST['bid'];
$search = '%'.$search1.'%';
$sql = "select item.*,order_details.*,ordered_item.*,order_details.order_details_id as order_id,customer.* from order_details inner join ordered_item on (order_details.order_details_id = ordered_item.order_details_id) inner join item on (ordered_item.item_id = item.item_id) left join customer on (order_details.customer_id = customer.customer_id) where order_details.verification_code like '$search' and item.bid = '$bid'";

$result1 = $conn->query($sql);
if($result1->num_rows > 0){
    
while ($row = $result1->fetch_array(MYSQLI_ASSOC)) {
    
    $data = array(
        'success' => 1,
        'order_id' => $row['order_id'],
        'code_status' => $row['status'],
        'vouchercode' => $row['verification_code'],
        'customer_name'=> $row['name'],
        'contact' => $row['contact']
    );
    array_push($response, $data);
}

}else{
	$data = array(
        'success' => 0,
        'message' => 'wrong'
    );
	array_push($response, $data);
}


echo json_encode($response);
?>