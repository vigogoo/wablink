<?php
include'connect.php';
$String ="create view denis as select count(Item_name) from cart group by Item_name";
mysql_query($String);

$query="select sum(Total) as number from denis";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
	
	echo $row['number']." Items";


?>