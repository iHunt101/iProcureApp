<?php 
	$year = $_GET['year'];
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">National Annual Record</h3>
  </div>
  <div class="panel-body">
	<div class="heading_grey">
	<?php $request_total =  $system->national_request_total_count($year); ?>
	<?php $award_total = $system->national_award_total_count($year); ?>
		<strong>A. Consolidated Transaction</strong>
		<div class="pull-right">
			<strong class="color_yellow">Consolidated Rating =  <?php echo number_format(($award_total / $request_total) * 100,2); ?> %</strong>
		</div>
	</div>	
		<div class="annual_graph_bg"><div id="annual_graph1"></div></div>	
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th class="col-lg-4 center">Month</th>
					<th class="col-lg-4 center">Bid Request</th>
					<th class="col-lg-4 center">Bid Award</th>
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
					<td class="center"><?php echo $request_count = $system->national_request_by_month($no,$year); ?></td>	
					<td class="center"><?php echo $award_count = $system->national_award_by_month($no,$year); ?></td>	
				</tr>

				
			<?php
				$array1[] = '{"data":"'.$month_name.'",'.'"italy":'.$request_count.','.'"germany":'.$award_count.'}'; 
			?>	
			<?php } ?>	
				<tr>	
					<td class="right">Total</td>
					<td class="center"><?php  echo $request_total; ?></td>
					<td class="center"><?php echo $award_total; ?></td>
				</tr>
			</tbody>
		</table>
		<?php include('annual_graph1.php'); ?>	
	
		

		
		<hr class="hr">
		<?php $abc_total =  $system->national_abc_total($year); ?>
		<?php $ca_total = $system->national_ca_total($year); ?>
		<div class="heading_grey">
			<strong>B. Consolidated Financial</strong>
			<div class="pull-right">
				<strong class="color_yellow">Accomplishment = <?php echo number_format(($ca_total / $abc_total) * 100,2); ?> %</strong>
			</div>
		</div>	
		
		<div class="annual_graph_bg"><div id="annual_graph2"></div></div>
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th class="col-lg-4 center">Month</th>
					<th class="col-lg-4 center">ABC Amount</th>
					<th class="col-lg-4 center">Contract Amount</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$x = 1;
				while($x <= 12){
				$no = $x++;
				$date = $year.'/'.$no.'/1';
				$month_name = date("M", strtotime($date));
						$abc = $system->national_abc_by_month($no,$year);
						$ca = $system->national_ca_by_month($no,$year);
			?>
				<tr>
					<td class="center"><?php echo $month_name; ?></td>	
					<td class="right"><?php echo  number_format($system->national_abc_by_month($no,$year),2); ?></td>	
					<td class="right"><?php echo  number_format($system->national_ca_by_month($no,$year),2); ?></td>	
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
					<td class="right"><?php echo $abc_total; ?></td>
					<td class="right"><?php echo $ca_total; ?></td>
				</tr>
			</tbody>
		</table>
		<?php include('annual_graph2.php'); ?>
  </div>
</div>



		