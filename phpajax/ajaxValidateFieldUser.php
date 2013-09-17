<?php
include('db_connection.php');


	/* RECEIVE VALUE */
$validateValue=$_GET['fieldValue'];
$validateId=$_GET['fieldId'];

$validateError= "This Organization already taken Laptop";
$validateSuccess= "This Organization have not taken any laptop yet";

/* RETURN VALUE */
$arrayToJs = array();
$arrayToJs[0] = $validateId;

$sql= mysql_query("SELECT lpda_laptop.id from lpda_laptop where laptop_org_code='".$validateValue."'");
$num= mysql_num_rows($sql);

if($num != 1){ // validate??
$arrayToJs[1] = true; // RETURN TRUE
echo json_encode($arrayToJs); // RETURN ARRAY WITH success
}
else{
for($x=0;$x<1000000;$x++){
if($x == 990000){
$arrayToJs[1] = false;
echo json_encode($arrayToJs); // RETURN ARRAY WITH ERROR
}
}

}
	
	

?>