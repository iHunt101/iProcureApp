<?php 
	$agency_id = $_GET['agency_id'];
	$year = $_GET['year'];
	$row = $system->selected_agency($agency_id);
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $row['org_name']; ?> Annual Record</h3>
  </div>
  <div class="panel-body">
	<div class="heading_grey">
		<strong>A. Consolidated Transaction</strong>
	</div>	
		<div class="annual_graph_bg"><div id="annual_graph1"></div></div>	
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th class="col-lg-3 center">Month</th>
					<th class="col-lg-3 center">Bid Request</th>
					<th class="col-lg-3 center">Bid Award</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$x = 1;
				while($x <= 12){
				$no = $x++;
				$date = $year.'/'.$no.'/1';
				$month_name = date("M", strtotime($date));
			
			?>
				<tr>
					<td class="center"><?php echo $month_name; ?></td>	
					<td class="center"><?php echo $request_count = $system->agency_request_by_month($no,$year,$agency_id); ?></td>	
					<td class="center"><?php echo $award_count = $system->agency_award_by_month($no,$year,$agency_id); ?></td>	
	
				</tr>

				
			<?php
				$array1[] = '{"data":"'.$month_name.'",'.'"italy":'.$request_count.','.'"germany":'.$award_count.'}'; 
			?>	
			<?php } ?>	
				<tr>	
					<td class="right">Total</td>
					<td class="center"><?php echo $request_total =  $system->agency_request_total_count($year,$agency_id); ?></td>
					<td class="center"><?php echo $award_total = $system->agency_award_total_count($year,$agency_id); ?></td>
				</tr>
			</tbody>
		</table>
		<?php include('annual_graph1.php'); ?>	
	
		
		<strong>Consolidated Rating <?php echo number_format(($award_total / $request_total) * 100 , 2); ?> %</strong>
		
		<hr class="hr">
		
		<div class="heading_grey">
			<strong>B. Consolidated Financial</strong>
		</div>	
		
		<div class="annual_graph_bg"><div id="annual_graph2"></div></div>
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th class="col-lg-3 center">Month</th>
					<th class="col-lg-3 center">ABC Amount</th>
					<th class="col-lg-3 center">Contract Amount</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$x = 1;
				while($x <= 12){
				$no = $x++;
				$date = $year.'/'.$no.'/1';
				$month_name = date("M", strtotime($date));
						$abc = $system->agency_abc_by_month($no,$year,$agency_id);
						$ca = $system->agency_ca_by_month($no,$year,$agency_id);
			?>
				<tr>
					<td class="center"><?php echo $month_name; ?></td>	
					<td class="right"><?php echo  number_format($system->agency_abc_by_month($no,$year,$agency_id),2); ?></td>	
					<td class="right"><?php echo  number_format($system->agency_ca_by_month($no,$year,$agency_id),2); ?></td>	
				</tr>
				<?php 
					if($abc == ''){
						$abc = 0;
					}
					if($ca == ''){
						$ca = 0;
					}
				?>
				<?php
					$array2[] = '{"data":"'.$month_name.'",'.'"italy":'.$abc.','.'"germany":'.$ca.'}'; 
				?>
			<?php } ?>	
				<tr>	
					<td class="right">Total</td>
					<td class="right"><?php echo $abc_total =  $system->agency_abc_total($year,$agency_id); ?></td>
					<td class="right"><?php echo $ca_total = $system->agency_ca_total($year,$agency_id); ?></td>
				</tr>
			</tbody>
		</table>
		<?php include('annual_graph2.php'); ?>
		<strong>Accomplishment <?php echo number_format(($ca_total / $abc_total) * 100,2); ?> %</strong>
		<hr class="hr">
		<a class="btn btn-success btn-block" href="a_page.php?page=a_home"><i class="fa fa-arrow-left"></i> Back</a>
  </div>
</div>



		