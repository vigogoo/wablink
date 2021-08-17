<?php
function clean_data($data){
$data=trim($data);
$data=stripslashes($data);//
$data=mysql_real_escape_string($data);
$data=htmlspecialchars($data);
return $data;
}
?>