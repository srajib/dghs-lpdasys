<?php
/*$host = "localhost";
$user = "root";
$pass = "";
$db = "hss";*/

$host = "localhost";
$user = "root";
$pass = "";
$db = "hss";

mysql_connect($host,$user,$pass) or die("Connection failed");
mysql_select_db($db) or die("Database not found");
?>