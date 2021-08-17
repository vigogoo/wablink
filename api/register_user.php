<?php

include('connect.php');
$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$password =  md5($_REQUEST['password']);
$response = array();

$check = "select * from customer where contact = ? or email = ?";

$stmt = $conn->prepare($check);
if ($stmt === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
}

$stmt->bind_param('ss', $phone, $email);

$stmt->execute();
$i=0;
while($stmt->fetch()){
	$i++;
}

if ($i > 0) {
    $data = array(
        'message' => 'Phone number or email already exists, Sign in to continue',
        'success' => '0'
    );
} else {
    //"insert into customer values(null,'$name','$phone','$email','M','$password','location','address')"
    $sql = "insert into customer set name=?, contact=?, email=?, sex='M', password=?, location='location', address='address'";
    $stmt2 = $conn->prepare($sql);
    if ($stmt2 === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
    }

    $stmt2->bind_param('ssss',$name,$phone,$email,$password);
    $stmt2->execute();
     $data = array(
            'message' => 'User Succesfully registered',
            'success' => '1'
        );
}

array_push($response, $data);
echo json_encode($response);
?>