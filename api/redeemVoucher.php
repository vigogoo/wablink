<?php
include('connect.php');
$response = array();

//$order_id = '40001037';
$order_id = $_POST['order_id'];
$sql = "update order_details set status = 2 where order_details_id = ? ";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
}
$stmt->bind_param('s', $order_id);
if($stmt->execute()){
    $data = array(
        'message' => 'Voucher was Redeemed successfully!',
		'sucess'=> 1
    );
}else{
    $data = array(
        'message'=> $conn->error(),
		'sucess'=> 0
    );
    echo 'error';
}
array_push($response, $data);
echo json_encode($response);
