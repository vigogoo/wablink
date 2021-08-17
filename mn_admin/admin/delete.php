<?php


include "header.php";


if(isset($_GET['id']))

{


  $sql = "DELETE FROM item WHERE item_id='$_GET['id']'";
  $sql = "DELETE FROM item_size WHERE item_id='$_GET['id']'";

     $mysqli->query($sql);

	 echo 'Deleted successfully.';

}


?>