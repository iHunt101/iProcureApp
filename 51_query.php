<?php


if (isset($_POST['str'])) {
	$str = $_POST['str'];
}else{
	$str = '%';
}
?>
<table class='51data' border="1" width="100%" style="font-size:11px;">
	<tr>
		<th>No <?php echo $_POST['str']; ?></th>
		<th>Agency Name</th>
		<th>Request (P)</th>
		<th>Award</th>
		<th>% EFF</th>
	</tr>


<?php
error_reporting(0);



$organization = '"ec10e1c4-4eb3-4f29-97fe-f09ea950cdf1"';
$bid_info = '"baccd784-45a2-4c0c-82a6-61694cd68c9d"';
$award = '"539525df-fc9a-4adf-b33d-04747e95f120"';


// if (isset($_GET['page'])) {
// 	$page = '15'
// }


$sql = urlencode('SELECT org_name,approved_budget,'.$organization.'.org_id as org_idd,contract_amt FROM ' . $organization . ' 
	INNER JOIN  ' . $bid_info . ' ON (' . $organization . '.org_id = '  . $bid_info . '.org_id )
	INNER JOIN  ' . $award . ' ON (' . $bid_info .'.ref_id =' . $award . ".ref_id) WHERE org_name like '%". $str ."%'  ORDER BY approved_budget desc");


$json_string = file_get_contents("http://philgeps.cloudapp.net:5000/api/action/datastore_search_sql?sql=" . $sql);
$json = json_decode($json_string, true);
$json = $json ['result']['records'];
$num = 1;
$reqtot = 0;
$awardtot = 0;
foreach ($json as $key => $value) {

	$eff = ($value['contract_amt'] / $value['approved_budget']);
	$eff = round($eff * 100,2);
	$reqtot = ($reqtot + $value['approved_budget']);
	$awardtot = ($awardtot + $value['contract_amt']);


	echo "<tr>";
	echo "<td>$num</td>";
	echo "<td>" . $value['org_name'] . "</td>";
	echo "<td style='text-align:right'> ". number_format($value['approved_budget'],2) ."</td>";
	echo "<td style='text-align:right'> ". number_format($value['contract_amt'],2) ."</td>";
	echo "<td style='text-align:right'> $eff </td>";
	echo "</tr>";
	$num = ($num + 1);
}

	$efftot = ($awardtot / $reqtot);
	$efftot = round($efftot * 100,2);
?>

<tr>
	
	<td colspan="2"></td>
		<?php echo "<td style='text-align:right'>" . number_format($reqtot,2) . "</td>"; ?>
		<?php echo "<td style='text-align:right'>" . number_format($awardtot,2) . "</td>"; ?>
		<?php echo "<td style='text-align:right'> $efftot </td>"; ?>
</tr>

</table>

