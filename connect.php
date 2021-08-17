<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(NONE);

define("DB_HOST", 'localhost');
define("DB_USERNAME", 'root');
define("DB_PASSWORD", '');
define("SUPPORT_EMAIL", 'sales@wablinks.ug');
define("DB_NAME", "wablinks");
define("SITE_NAME", "wablinks");
 $conn=mysqli_connect("localhost","root","","wablinks") ;
 //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$con=mysql_connect("localhost","root","","wablinks");
mysql_select_db("wablinks",$con);
?>