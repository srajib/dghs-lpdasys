<?php

/**
 * Database connection configuration
 * 
 */

//local connection
$dbhost='localhost';	
$dbname='lpdasys';	
$dbuser='root';
$dbpass='';

mysql_select_db($dbname,mysql_connect($dbhost, $dbuser, $dbpass))or die(mysql_errno());

$test='i am hot';
?>
