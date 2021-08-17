<?php

include('connect.php');
include('Utilities.php');

$util = new Utilities();
$items = $_POST['items'];
$name = 'name';
$contact = $_POST['number'];
$location = 'kampala';
$email = 'email@gamil.com';
$status = '1';
$customer_id = $_POST['user_id'];
$verificationCode = $util->generateCode();
//echo $verificationCode;
while(isCodeAvailable($verificationCode,$conn) == true){
    $nuVcode = $util->generateCode();
    $verificationCode = $nuVcode;
}
//echo $verificationCode;

$success_count=0;
        
$objItem = json_decode($items);
$sql = mysqli_query($conn, "insert into order_details set customer_id= '$customer_id',location='$location',time= null, status='$status','mobile app', verification_code='$verificationCode', 	contact='$contact' ");
if ($sql) {
    foreach ($objItem->item as $value) {

        $item_price = $value->item_price;
        $item_quantity = $value->item_quantity;
        $item_id = $value->item_id;
        $instructions = $value->instructions;
        $cost = $item_quantity * $item_price;

		$sql2 = mysqli_query($conn, "select * from order_details order by order_details_id desc limit 1");
        if ($sql2) {
            while ($row = mysqli_fetch_array($sql2)) {
                $order_details_id = $row['order_details_id'];
                $sql3 = mysqli_query($conn, "insert into ordered_item set item_price='$item_price', cost='$cost', item_id='$item_id', quantity='$item_quantity', order_details_id='$order_details_id', instructions='$instructions' ");
                if ($sql3) {
                    //echo "Success";
					$success_count++;
                } else {
                    //echo mysqli_error($conn);
                }
            }
        } else {
            //echo mysqli_error($conn);
        }
		
		
    }
	if($success_count!=0){
		$data = array(
            'message' => 'Your order was successful, please wait for a confirmation text or call',
            'success' => '1'
        );
	}else{
		$data = array(
            'message' => 'Your order failed, please try again!',
            'success' => '0'
        );
	}
	echo json_encode($data);
}

function isCodeAvailable($vCode,$conn){
    
    $queryCheck = mysqli_query($conn, "select * from order_details");
    while($che = mysqli_fetch_array($queryCheck)){
        if($che['verification_code'] == $vCode){
            return true;
        }
    }
    return false;
}
?>