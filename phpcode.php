<?php
$getdata = file_get_contents("data.json");
$json_a = json_decode($getdata,true);

//Creating the emailid list 
$emailids = Array();
foreach($json_a as $u) $emailids[] = $u['email'];
$list = implode(",",$emailids);
echo("Email id list :  ");
print_r($list);
echo'<br/>';
echo'<br/>';

//Sorting the data by descending order of field 'Age'
$sort = array();
foreach ($json_a as $key => $row)
{
	$sort[$key] = $row['age'];
}
array_multisort($sort, SORT_DESC, $json_a);

//Adding a new field on each record called 'Name' with first and last name joined
foreach ( $json_a as $key=>$value){
	$json_a[$key]['Name']=$value['first_name'].' '.$value['last_name'];
}
echo "<pre>";
print_r( $json_a );
echo "</pre>";
?>