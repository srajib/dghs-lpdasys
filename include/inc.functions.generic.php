<?php
/*
*	fetch multiple rows of data and return in a single array
*/
function mysql_fetch_rowsarr($result, $numass=MYSQL_BOTH) {
  $i=0;
  @$keys=array_keys(mysql_fetch_array($result, $numass));
  @mysql_data_seek($result, 0);
    while ($row = mysql_fetch_array($result, $numass)) {
      foreach ($keys as $speckey) {
        $got[$i][$speckey]=$row[$speckey];
      }
    $i++;
    }
  return $got;
}
/*
	Usage:
	==================
	$query="select * from ibank_city";
	$result = mysql_query($query);
	$arr = mysql_fetch_rowsarr($result);
	for($i=0;$i<mysql_num_rows($result);$i++){
		echo $arr[$i]['city_name'];
	}
*/
/***********************************************************/

/*
*	Converts datetime to timestamp
*/
function convertMySQLDatetimetoTimestamp($MySQLDatetime) {          
    list($date, $time) = explode(' ', $MySQLDatetime);
    list($year, $month, $day) = explode('-', $date);
    list($hour, $minute, $second) = explode(':', $time);
    $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
    return $timestamp;
}
/*
	usage:
	==================
	$formated_time=gmdate("H:i A M d, Y", convertMySQLDatetimetoTimestamp($MySQLDatetime));
*/

/***********************************************************/

/*
*	Converts date to timestamp
*/

function convertMySQLDateToTimestamp($MySQLDate) {				
    list($year, $month, $day) = explode('-', $MySQLDate);
    $timestamp = mktime('00','00', '00', $month, $day, $year);
    return $timestamp;
}
/***********************************************************/

/*
*	Return current MySQL datetime
*/

function getDateTime(){
	return date('Y-m-d h:i:s');
}
/***********************************************************/

/*
*	function that returns birthday	
*/
function ageFromBirthDate ($MySQLDate){
	list($year,$month,$day) = explode("-",$MySQLDate);
	$year_diff  = date("Y") - $year;
	$month_diff = date("m") - $month;
	$day_diff   = date("d") - $day;
	if ($day_diff < 0 || $month_diff < 0)
	  $year_diff--;
	return $year_diff;
}
/*
	Usage: 
	==================
	echo "Age is: " . birthday ("1984-07-05");
*/
/***********************************************************/

/*
*	function to print alert message	
	Associated CSS
	div.alert_inside {
		background:#FFFF66;
		width:98%;
		padding: 5px;
		float:left;
		margin-top:10px;color:#fff;
		-moz-border-radius: 5px;
		border-radius: 5px;
	}
*/
function printAlert($valid,$alert){
	if(sizeof($alert)){
		echo "<div class='alert_inside' style='background-color:";
		if($valid)echo "green";
		else echo "red";
		echo "'>";
		for($i=0;$i<sizeof($alert);$i++){
			echo $alert[$i]."<br>";
		}	
		echo "</div>";
	}
	echo "<div class='clear'></div>";	
}
/***********************************************************/

/*
*	Returns the current file name
*/
function getFileName(){
	$full_path=$_SERVER['PHP_SELF'];	
	$temp=explode('/',$full_path);
	return $temp[sizeof($temp)-1];
}

/*
*	Querys whether $a[inputName] has a value, else return value from $_REQUEST[inputName]
*/

function addEditInputField($fieldname){
	global $a;
	if(!strlen($_REQUEST["$fieldname"])){return $a["$fieldname"];}
	else {return $_REQUEST["$fieldname"];}
}


function inputDisabled(){
		echo " disabled='disabled' ";
}

function inputReadonly(){
		echo " READONLY ";
}

/*mysql form generator*/
function connect()
{

global $dbhost;
global $dbuser;
global $dbpass;
global $dbname;
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  mysql_select_db($dbname);
  return $conn;
}

/*
*
	$customQuery should strat with 'where'
*/

function createSelectOptions($dbtableName,$dbtableIdField,$dbtableValueField,$customQuery,$selectedId,$name,$params){
	$q="SELECT * FROM $dbtableName 
		$customQuery 
		ORDER BY $dbtableValueField ASC";
	//echo $q;
	$r=mysql_query($q)or die(mysql_error());
	
	if(mysql_num_rows($r)){
		$a=mysql_fetch_rowsarr($r);
		echo "<select name='$name' $params>";
		echo "<option value=''>select</option>";
		foreach($a as $b){
			echo "<option value='".$b[$dbtableIdField]."' ";
			if($b[$dbtableIdField]==$selectedId){echo " selected='selected' ";}
			echo " >".$b[$dbtableValueField]."</option>";
		}
		echo "</select>";
	}

}

function createMultiSelectOptions($dbtableName,$dbtableIdField,$dbtableValueField,$customQuery,$selectedIdCsv,$name,$params){
	$q="SELECT * FROM $dbtableName 
		$customQuery 
		ORDER BY $dbtableValueField ASC";
	//echo $q;
	$r=mysql_query($q)or die(mysql_error());
	
	$selectedIdCsvArray=explode(',',trim($selectedIdCsv,', '));
	if(mysql_num_rows($r)){
		$a=mysql_fetch_rowsarr($r);
		echo "<select name='$name' $params>";
		foreach($a as $b){
			echo "<option value='".$b[$dbtableIdField]."' ";			
			if(in_array($b[$dbtableIdField],$selectedIdCsvArray)){echo " selected='selected' ";}
			echo " >".$b[$dbtableValueField]."</option>";
		}
		echo "</select>";
	}

}

function myprint_r($my_array) {
    if (is_array($my_array)) {
        echo "<table border=1 cellspacing=0 cellpadding=3 width=100%>";
        echo '<tr><td colspan=2 style="background-color:#333333;"><strong><font color=white>ARRAY</font></strong></td></tr>';
        foreach ($my_array as $k => $v) {
                echo '<tr><td  style="width:40px;background-color:#F0F0F0;">';
                echo '<strong>' . $k . "</strong></td><td>";
                myprint_r($v);
                echo "</td></tr>";
        }
        echo "</table>";
        return;
    }
    echo $my_array;
}

function makeRandomKey(){
	$charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYsdfZ0123456789";
	//if ($useupper) $charset .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//if ($usenumbers) $charset .= "0123456789";
	//if ($usespecial) $charset .= "~@#$%^*()_+-={}|]["; // Note: using all special characters this reads: "~!@#$%^&*()_+`-={}|\\]?[\":;'><,./";
	//if ($minlength > $maxlength) $length = mt_rand ($maxlength, $minlength);
	//else $length = mt_rand ($minlength, $maxlength);
	$length=20;
	for ($i=0; $i<$length; $i++) $key .= $charset[(mt_rand(0,(strlen($charset)-1)))];
	return $key."_".time();
}

function createMySqlInsertString($request, $exception_field){
	$str_k="";
	$str_v="";
	foreach($request as $k=>$v){
		if(!in_array($k,$exception_field)){
			if(!empty($k)){
				$str_k.="$k,";
				$str_v.="'".mysql_real_escape_string(trim($v))."',";
			}
		}
	}
	$str=array();
	$str['k']=trim($str_k,',');
	$str['v']=trim($str_v,',');
	return $str;
}

function createMySqlUpdateString($request, $exception_field){
	$str_k="";
	foreach($_POST as $k=>$v){
		if(!in_array($k,$exception_field)){
			if(!empty($k)){
				$str_k.="$k='".mysql_real_escape_string(trim($v))."',";				
			}
		}
	}
	$str_k=trim($str_k,',');
	return $str_k;
}

function convert_number_to_words($number) {
   
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
   
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
   
    $string = $fraction = null;
   
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
   
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
   
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
   
    return $string;
}

function my_date_diff($start, $end="NOW")
{
        $sdate = strtotime($start);
        $edate = strtotime($end);
		$timeshift="";

        $time = $edate - $sdate;
		//echo "time:$time<br>";
        if($time>=0 && $time<=59) {
                // Seconds
                $timeshift = $time.' seconds ';

        } elseif($time>=60 && $time<=3599) {
                // Minutes + Seconds
                $pmin = ($edate - $sdate) / 60;
                $premin = explode('.', $pmin);
               
                $presec = $pmin-$premin[0];
                $sec = $presec*60;
               
			    if($premin[0]>0){
					$timeshift .= $premin[0].' min ';
				}
				if(round($sec,0)>0){
					$timeshift .= round($sec,0).' sec ';
				}
                //$timeshift = $premin[0].' min '.round($sec,0).' sec ';

        } elseif($time>=3600 && $time<=86399) {
                // Hours + Minutes
                $phour = ($edate - $sdate) / 3600;
                $prehour = explode('.',$phour);
               
                $premin = $phour-$prehour[0];
                $min = explode('.',$premin*60);
               
                $presec = '0.'.$min[1];
                $sec = $presec*60;
				
				if($prehour[0]>0){
					$timeshift .= $prehour[0].' hrs ';
				}
				if($min[0]>0){
					$timeshift .= $min[0].' min ';
				}
				if(round($sec,0)>0){
					$timeshift .= round($sec,0).' sec ';
				}
				

                //$timeshift = $prehour[0].' hrs '.$min[0].' min '.round($sec,0).' sec ';

        } elseif($time>=86400) {
                // Days + Hours + Minutes
                $pday = ($edate - $sdate) / 86400;
                $preday = explode('.',$pday);

                $phour = $pday-$preday[0];
                $prehour = explode('.',$phour*24);

                $premin = ($phour*24)-$prehour[0];
                $min = explode('.',$premin*60);
               
                $presec = '0.'.$min[1];
                $sec = $presec*60;
				
				if($preday[0]>0){
					$timeshift .= $preday[0].' days ';
				}
				if($prehour[0]>0){
					$timeshift .= $prehour[0].' hrs ';
				}
				if($min[0]>0){
					$timeshift .= $min[0].' min ';
				}
				if(round($sec,0)>0){
					$timeshift .= round($sec,0).' sec ';
				}
               
			   
                //$timeshift = $preday[0].' days '.$prehour[0].' hrs '.$min[0].' min '.round($sec,0).' sec ';

        }if($time<0){
			return "End date is earlier than start date";
		}
        return $timeshift;
}

function my_hour_diff($start, $end="NOW")
{
        $sdate = strtotime($start);
        $edate = strtotime($end);
		
        $time = $edate - $sdate;
		
		//echo "time:$time<br>";
		$hours=$time/(60*60);
        return $hours;
}


?>