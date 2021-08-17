<?php
  include('connect.php');
 
 $sql = "select * from item";
 $result = $conn->query($sql);
 $response = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $data = array(
	     'itemid' => $row['	item_id'],
		 'item_name' => $row['item_name'],
		 'details' => $row['details'],
	     'sub_category_id' => $row['sub_category_id'],
	     'category_id' => $row['category_id'],
		 'bid' => $row['bid']
	   );
    }
} else {
    echo "0 results";
}
$conn->close();
array_push($response,$data);
echo json_encode($response);

?>