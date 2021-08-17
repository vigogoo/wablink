<?php

class Utilities {

    function getAllpictures($id) {//RETURN ARRAY
//$directory = $folder.'/'.$id.'/';
        $path = '../images/products/' . $id . '/';

        $images = glob($path . "{*.jpg,*.gif,*.png,*.PNG,*.JPEG}", GLOB_BRACE);
        $listImages = array();
        $ImagesList = array();
        foreach ($images as $image) {
            $listImages[] = $image;
        }

        //echo count($images)."</br>";
        if (count($listImages) == 0) {
        } else {
            foreach ($listImages as $image) {
                $str = str_replace('..', '', $image);
                $ImagesList[] = 'http://justcreativemedia.com/justdeals/' . $str;
            }
        }

        return $ImagesList;
    }

    function getSliderImages() {
        //$directory = $folder.'/'.$id.'/';
        $path1 = '../images/slider/';

        $images1 = glob($path1 . "{*.jpg,*.gif,*.png,*.PNG,*.JPEG}", GLOB_BRACE);
        $listImages1 = array();
        $SliderImages1 = array();
        foreach ($images1 as $image1) {
            $listImages1[] = $image1;
        }

        //echo count($images)."</br>";
        if (count($listImages1) == 0) {
        } else {
            foreach ($listImages1 as $image1) {
                $str = str_replace('..', '', $image1);
                $SliderImages[] = 'http://justcreativemedia.com/justdeals/' . $str;
            }
        }

        return $SliderImages;
    }

    function formatDate($date) {
        /*$dateAndTime = explode(" ", $date);
        $dateOnly = $dateAndTime[0];
        $timeOnly = $dateAndTime[1];

        $nuDate = explode("-", $dateOnly);
        $year = $nuDate[0];
        $month = $nuDate[1];
        $day = $nuDate[2];

        return $day . "/" . $month . "/" . $year . " " . $timeOnly;*/
		
		$to= $date; //curr time
$timestamp = strtotime($to); //convert to Unix timestamp
//	$timestamp = $timestamp-3600; //subtract 1 hour (3600 this is 1 hour in seconds)
return date("d-M-Y h:i:s a",$timestamp); //show new date
    }

    function GetDrivingDistance($lat1,$long1, $lat2 , $long2) {
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $lat1 . "," . $long1 . "&destinations=" . $lat2 . "," . $long2 . "&mode=driving&language=pl-PL";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
        $time = $response_a['rows'][0]['elements'][0]['duration']['text'];

        $data = array('distance' => $dist,'time'=>$time);
        return $data;
    }
    
    function generateCode(){
        $alphabet = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $code = array();
        $alphaLenght = strlen($alphabet) - 1;
        for($i = 0; $i < 12;$i++){
            $p = rand(0, $alphaLenght);
            $code[] = $alphabet[$p];
       
        }
        return implode($code);
    }
    
    function formartDistanceValue($distance){
        $valueOnly = explode(" ", $distance);
        $value = str_replace(",", ".", $valueOnly[0]);
        return $value;
    }

	function getpicture($folder,$id){
	$directory = $folder.'/'.$id.'/';
	
		$images = glob($directory . "{*.jpg,*.gif,*.png,*.*}", GLOB_BRACE);
		$listImages=array();
		foreach($images as $image){
			 $listImages=$image;
		}
		
		if(!$listImages)
		{
		$listImages= $folder.'/'.'default.jpg';
		}
		$str= str_replace('..','',$listImages);
		 
		return 'http://justcreativemedia.com/justdeals/'.$str;
		
	}
	
	

}

?>