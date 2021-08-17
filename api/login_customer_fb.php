<?php
include('connect.php');

$json=array();

if(isset($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['fbID'], $_REQUEST['gender'], $_REQUEST['gcm'])){
     $name = addslashes(urldecode($_REQUEST['name'])); 
	 $email = addslashes(urldecode($_REQUEST['email'])); 
	 $fbID = addslashes(urldecode($_REQUEST['fbID'])); 
	 $gender = addslashes(urldecode($_REQUEST['gender'])); 
	 $gcm = addslashes(urldecode($_REQUEST['gcm']));
	 $type = 'normal_user';
	 
	 if($fbID && $email && $name){
		 
		$sql = "select name, contact, customer_id, email from customer where fbtt_id=?";
		
		/* Prepare statement */
		$stmt = $conn->prepare($sql);
		if ($stmt === false) {
			trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
		}
		$stmt->bind_param('s', $fbID);
		$stmt->execute();
		$stmt->store_result();
        
		$stmt->bind_result($vals1, $vals2, $vals3, $vals4);
$j=0;
while ($stmt->fetch()) { 
        $data = array(
            'message' => 'user logged in',
            'success' => '1',
            'name' => $vals1,
            'phone' => $vals2,
            'user_id' => $vals3,
			'email' => $vals4,
            'type' => $type,
			'status' => 'ok'
        	);
			$j++;
    } 

	if($j>0){
			$ins= "UPDATE customer SET  gcm=? WHERE fbtt_id=? ";
				$stmt2 = $conn->prepare($ins);
				$stmt2->bind_param('ss',$gcm, $fbID);
				$success = $stmt2->execute();
				
				if ($success) {
				//$json['status']="ok";
				}else{
				//$json['status']="failed";
				$data = array(
				'message' => 'Facebook login failed on external server.',
				'success' => '0',
				'status' => 'failed'
					);
				}
			
	}else{
		
			$ins= "INSERT INTO customer set  name=? , gcm=?, fbtt_id=?, email=?, sex=?, contact='unknown', password='unknown', time=NOW() ";
			$stmt2 = $conn->prepare($ins);
			if ($stmt2 === false) {
				trigger_error('Wrong SQL: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
			}
			//$stmt = $conn->prepare($ins);
			$stmt2->bind_param('sssss', $name, $gcm, $fbID, $email, $gender);
			$success = $stmt2->execute();
			if($success) {
		  		$json['status']="ok";
		  		$id = mysqli_insert_id($conn); // last inserted id
		 	
				$sel3= "select customer_id, name, contact, email from customer where customer_id=? ";
				$stmt3 = $conn->prepare($sel3);
				$stmt3->bind_param('i',$id);
				$stmt3->execute();
				$stmt3->store_result();
        
				$stmt3->bind_result($vals1, $vals2, $vals3, $vals4);
			
			$k=0;
			while ($stmt3->fetch()) { 
				$k++;
					$data = array(
						'message' => 'user logged in',
						'success' => '1',
						'name' => $vals2,
						'phone' => $vals3,
						'user_id' => $vals1,
						'email' => $vals4,
						'type' => $type,
						'status' => 'ok'
						);
			} 

			if($k>0){
				//$json['status']='ok';
			}else{
				//$json['status']="failed";
				$data = array(
				'message' => 'Facebook login failed on external server on insertion.',
				'success' => '0',
				'status' => 'failed'
					);
			}
			
			
			
		}else{
			trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
			//$json['status']="failed";
			$data = array(
				'message' => 'Facebook login failed on external server.',
				'success' => '0',
				'status' => 'failed'
					);
		}
	}
	
	
 }else{
		//$json['status']="failed";
		$data = array(
				'message' => 'Facebook login failed on null',
				'success' => '0',
				'status' => 'failed'
					);
	} 
}else{
 		$data = array(
		'message' => 'Facebook login failed missing',
		'success' => '0',
		'status' => 'empty'
			);
	//$json['status']="empty";
}

array_push($json, $data);
echo json_encode($json); 
	
?>