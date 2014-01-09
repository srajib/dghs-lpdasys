<?php
/*$host = "localhost";
$user = "root";
$pass = "";
$db = "hss";*/

$host = '103.247.238.164';	
$user = 'root';
$pass = 'M1$DB@2012';
$db = 'dghs_hrm_main';

mysql_connect($host,$user,$pass) or die("Connection failed");
mysql_select_db($db) or die("Database not found");
?>