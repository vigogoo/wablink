<?php

include('connect.php');

$phone = $_REQUEST['phone'];
$password = md5($_REQUEST['password']);
$type = $_REQUEST['type'];
/*$phone = '111111';
$password = 'pauuz';*/

$response = array();

if($type == 'merchant'){
$sql = "select telephone, business_name, bid from business where (email = ? || telephone = ?) and password = ?";	
}else if($type == 'normal_user'){
	$sql = "select name, contact, customer_id from customer where (email = ? || contact = ?) and password = ?";
}

/* Prepare statement */
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
}

$stmt->bind_param('sss', $phone, $phone, $password);

$stmt->execute();

if ($stmt->errno) {
		 $data = array(
            'message' => 'There was a problem',
            'success' => '0',
        );
}else{
	$stmt->store_result();
$stmt->bind_result($vals1, $vals2, $vals3);

	$counterval1=0;
	while($stmt->fetch()){
		if($type == 'normal_user'){
					 $data = array(
					'message' => 'user logged in',
					'success' => '1',
					'name' => $vals1,
					'phone' => $vals2,
					'user_id' => $vals3,
					'type' => $type
				);
				  }else if($type == 'merchant'){
					 $data = array(
					'message' => 'user logged in',
					'success' => '1',
					'phone' => $vals1,
					'name' => $vals2,
					'user_id' => $vals3,
					'type' => $type
				);
			}
				$counterval1++;
	}

if($counterval1==0){
	$data = array(
            'message' => 'Wrong username or password',
            'success' => '0',
        );
	}
}
    

array_push($response, $data);
echo json_encode($response);
?>