<?php
/*$host = "localhost";
$user = "root";
$pass = "";
$db = "hss";*/

$host = 'localhost';	
$user = 'root';
$pass = '';
$db = 'dghs_hrm_main_live2';

mysql_connect($host,$user,$pass) or die("Connection failed");
mysql_select_db($db) or die("Database not found");
?>