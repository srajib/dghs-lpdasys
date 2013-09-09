<?php
include('configuration');

$div_id = $_POST['div_id'];

$sql = "SELECT 
            lpda_district.district_bbs_code,
            lpda_district.old_district_id,
            lpda_district.district_name
        FROM
            lpda_district
        WHERE
            lpda_district.division_id =$div_id
        ORDER BY
            lpda_district.district_name";
$result = mysql_query($sql) or die(mysql_error() . "<br /><br />Code:<b>get_district_list:1</b><br /><br /><b>Query:</b><br />___<br />$sql<br />");

$data = array();
$data[] = array(
    'text' => "Select District",
    'value' => 0
);
while ($row = mysql_fetch_array($result)) {
    $data[] = array(
        'text' => $row['district_name'],
        'value' => $row['old_district_id']
    );
}
$json_data = json_encode($data);

print_r($json_data);
?>
