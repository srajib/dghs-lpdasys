<?php
  include('configuration.php');
  $org_code = $_POST['org_code'];

$sql = "SELECT organization.org_code,
            organization.org_name,
            organization.organization_id
        FROM
            organization
        WHERE
           organization.org_code='$org_code'";
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
