<?php 

	$year = $_GET['year'];
	/* error_reporting(0); */
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Procurement Mode</h3>
  </div>
  <div class="panel-body">
	<div class="heading_grey">
	<?php $pb_total =  $system->pb_total_count($year); ?>
	<?php $other_total = $system->other_total_count($year); ?>
		<strong>A. Consolidated Transaction</strong>
		<!-- <div class="pull-right">
			<strong class="color_yellow">Consolidated Rating =  <?php echo number_format(($pb_total / $other_total) * 100,2); ?> %</strong>
		</div> -->
	</div>	
		<!-- <div class="annual_graph_bg"><div id="annual_graph1"></div></div>	  -->
		<script>
				$(document).ready(function() 
					{ 
						$("#myTable").tablesorter( {sortList: [[0,0], [1,0]]} ); 
					} 
				); 
		</script>
		

		
		<table class="table table-condensed table-bordered" id="myTable">
			<thead>
				<tr>
					<th class="col-lg-4 center">Government Agency</th>
					<th class="col-lg-4 center">Public Bidding</th>
					<th class="col-lg-4 center">Alternatives</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach($system->agency_type_list() as $row){
					 $agency_type = $row['government_organization_type'];
				?>
				<tr>
					<td class="center"><?php echo $agency_type; ?></td>
					<td class="center"><?php echo $pb_count = $system->agency_type_pb($agency_type); ?></td>
					<td class="center"><?php echo $other_count = $system->agency_type_other($agency_type); ?></td>
				</tr>
			<?php
				$array1[] = '{"data":"'.$agency_type.'",'.'"italy":'.$pb_count.','.'"germany":'.$other_count.'}'; 
			?>	
				<?php } ?>
				<!-- <tr>
					<td class="right">Total</td>
					<td class="center"><?php echo $pb_total; ?></td>
					<td class="center"><?php echo $other_total; ?></td>
				</tr> -->
			</tbody>
		</table>
	

	<hr>
		
	<!-- <div class="heading_grey">
	<?php /* $abc_total =  $system->agency_type_abc_total($year); */ ?>
	<?php /* $ca_total = $system->agency_type_ca_total($year); */ ?>
		<strong>A. Consolidated Transaction</strong>
		<div class="pull-right">
			<strong class="color_yellow">Consolidated Rating =  <?php echo number_format(($abc_total / $ca_total) * 100,2); ?> %</strong>
		</div>
	</div>	 -->
	<!--	<div class="annual_graph_bg"><div id="annual_graph2"></div></div>	 --> 
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
					foreach($system->agency_type_list() as $row){
					$agency_type = $row['government_organization_type'];
					$abc = $system->agency_type_abc($year,$agency_type);
					$ca = $system->agency_type_ca($year,$agency_type);
				?>
				<tr>
					<td class="center"><?php echo $agency_type; ?></td>
					<td class="right"><?php echo number_format($system->agency_type_abc($year,$agency_type),2); ?></td>
					<td class="right"><?php echo number_format($system->agency_type_ca($year,$agency_type),2); ?></td>
				</tr>
			<?php
				$array2[] = '{"data":"'.$agency_type.'",'.'"italy":'.$abc.','.'"germany":'.$ca.'}'; 
			?>	
				<?php } ?>
				<!-- <tr>
					<td class="right">Total</td>
					<td class="right"><?php echo number_format($abc_total,2); ?></td>
					<td class="right"><?php echo number_format($ca_total,2); ?></td>
				</tr> -->
			</tbody>
		</table>
		<?php  include('pm_graph2.php');  ?>
		
  </div>
</div>


