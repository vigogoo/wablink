<?php
include'connect.php';
$query="select sum(unitP) as total  from cart ";
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	
	echo $row['total'];
}

?>