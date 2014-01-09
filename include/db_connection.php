<?php

/**
 * Database connection configuration
 * 
 */

//local connection
$dbhost='103.247.238.164';	
$dbname='dghs_hrm_main';	
$dbuser='root';
$dbpass='M1$DB@2012';

mysql_select_db($dbname,mysql_connect($dbhost, $dbuser, $dbpass))or die(mysql_errno());

?>
