<?php
$connect = mysql_connect("localhost","root","");
mysql_select_db("lpdasys",$connect); 

 $org_code = $_POST['org_code'];

$sql = "SELECT lpda_organization.org_code,
            lpda_organization.org_name,
            lpda_organization.organization_id
        FROM
            lpda_organization
        WHERE
           lpda_organization.org_code='$org_code'";
$result = mysql_query($sql) or die(mysql_error() . "<br /><br />Code:<b>get_cc_list:1</b><br /><br /><b>Query:</b><br />___<br />$sql<br />");

$data = array();

while ($row = mysql_fetch_array($result)) {
    $data[] = array(
        'text' => $row['org_name'],
        'value' => $row['org_name']
    );
}
$json_data = json_encode($data);
print_r($json_data);
?>
