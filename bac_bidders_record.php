<?php 
	$year = $_GET['year'];
	$business_name = explode(',',$_GET['business_name']);

?>
<?php 
	
	foreach($business_name as $business_name){
	$bir_row = $system->search_in_bir($business_name);
	$dti_row = $system->search_in_dti($business_name);
	$philgeps_row = $system->search_in_philgeps($business_name);
	
	$current_date = date('Ymd');
	 $bir_date = date("Ymd", strtotime($bir_row['date_valid']));
	 $dti_date = date("Ymd", strtotime($dti_row['date_valid']));
	 $philgeps_date = date("Ymd", strtotime($philgeps_row['date_valid']));
	
	if($current_date > $bir_date){
		$bir_date_status = '<span class="color_red blink_me">(Expired)</span>';
	}else{
		$bir_date_status = '';
	}
	
	if($current_date > $dti_date){
		$dti_date_status = '<span class="color_red blink_me">(Expired)</span>';
	}else{
		$dti_date_status = '';
	}
	
	if($current_date > $philgeps_date){
		$philgeps_date_status = '<span class="color_red blink_me">(Expired)</span>';
	}else{
		$philgeps_date_status = '';
	}
	
	
	
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $business_name; ?></h3>
  </div>
  <div class="panel-body">
		<table class="table table-bordered table-condensed">
			<tbody>
				<tr>
					<td class="col-lg-9">TIN No.</td><td class="col-lg-3"><?php echo $bir_row['tin']; ?></td>
				</tr>
				<tr>
					<td>DTI Reg No.</td><td><?php echo $dti_row['reg_no']; ?></td>
				</tr>
				<tr>
					<td>DTI Registration Validity</td><td><?php echo $dti_row['date_valid']; ?> <?php echo $dti_date_status; ?></td>
				</tr>
				<tr>
					<td>DTI Business Coverage</td><td><?php echo $dti_row['coverage']; ?></td>
				</tr>
				<tr>
					<td>PhilGeps Registration No.</td><td><?php echo $philgeps_row['reg_no']; ?></td>
				</tr>	
				<tr>
					<td>PhilGeps Registration Validity</td><td><?php echo $philgeps_row['date_valid']; ?> <?php echo $philgeps_date_status; ?></td>
				</tr>	
				<tr>
					<td>BIR Tax Clearance No.</td><td><?php echo $bir_row['tax_clearance_number']; ?></td>
				</tr>	
				<tr>
					<td>BIR Tax Clearance Validity</td><td><?php echo $bir_row['date_valid']; ?> <?php echo $bir_date_status; ?> </td>
				</tr>					
			</tbody>
		</table>	
  </div>
</div>
<?php } ?>