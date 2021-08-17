<?php
$site_name="/wablinks";

//include "data_encryption.php";


function get_time_stamp($datetime){

	$time = date('h:i A', strtotime($datetime));
	$dayMonth = date('d-M', strtotime($datetime));
	$year = date('Y', strtotime($datetime));
	$date = date("d-M-Y");// current date
if($date == date("d-M-Y", strtotime($datetime))){
	$date = $time;
}else{
	if($year == date("Y")){
	   $date=$dayMonth." ".$time;
    }else{
       $date=date('d-M-Y', strtotime($datetime))." ".$time;
    }
}

return $date;
}

 ?>