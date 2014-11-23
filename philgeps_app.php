<div class="panel panel-default">   
   <div class="panel-heading">
    <h3 class="panel-title">Procurement Growth Monitor</h3>
  </div>
  <div class="panel-body">
  <div class="heading_grey">Growth in Procurement Budget</div>
  <div id="graph"></div>	
	<table class="table table-bordered table-condensed no_margin">
		<thead>
			<tr>
				<th class="center">Year</th>
				<th class="center">Agency APP</th>
				<th class="center">Bidded Amount</th>
				<th class="center">APP Utilization %</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$x = 1;
			$ave = 0;
			$total_data_count = 0;
			$first_data_count = 0;
			$count = $system->year_count();
			foreach($system->year_list_asc() as $row){
					$number = $x++;
					$year_data = $row['year'];
					$year_data_base = $row['year'] - 1;
				
					 $last_year = $system->last_year(); 
					$row1 = $system->sum_request_by_year($year_data);
					$total_abc = $row1['total_abc'];
					$total_ca = $row1['total_ca'];
	 ?>
				<td class="center"><?php echo $year_data; ?></td>
				<td class="center">
					<?php echo number_format($row1['total_abc'],2); ?>	
				</td>
				<td class="center">
					<?php echo number_format($row1['total_ca'],2); ?>
				</td>
				<td class="center">
					<?php if($total_ca == ''){ ?>
							0.00
					<?php }else{ ?>
						<?php echo number_format(($total_abc / $total_ca),2); ?> %
					<?php } ?>
				</td>
	
			</tr>
		<?php } ?>	
		</tbody>
		</table>
		<hr class="hr">
		<a href="ga_page.php?page=philgeps_menu" class="btn btn-success btn-block"><i class="fa fa-arrow-left"></i> Back</a>
		
		<?php
			$array[] = '{"year":'.$year_data.','.'"income":'.$total_abc.','.'"expenses":'.$total_ca.'}'; 
		?>	
		<?php include('app_graph.php'); ?> 
		
		
