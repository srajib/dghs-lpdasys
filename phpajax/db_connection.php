<?php

/**
 * Database connection configuration
 * 
 */

//local connection
$dbhost='test.dghs.gov.bd';	
$dbname='lpdasys';	
$dbuser='root';
$dbpass='mistestdb';

mysql_select_db($dbname,mysql_connect($dbhost, $dbuser, $dbpass))or die(mysql_errno());

$test='i am hot';
?>
