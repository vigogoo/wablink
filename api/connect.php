<?php 
  $host = "localhost";
  $user = "justdeal_justsms";
  $password = "justsms2017";
  $database ="justdeal_main";
  
  /*$host = "localhost";
  $user = "root";
  $password = "";
  $database ="justdeal_main";*/
  
  //$conn = mysqli_connect($host,$user,$password,$database);
  $conn = new mysqli($host, $user, $password, $database);
  if(!$conn){
	  echo mysqli_error($conn);
  }
?>