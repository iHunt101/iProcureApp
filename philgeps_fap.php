<?php 
	$year =  $_GET['year'];
?>

 <div class="panel panel-default">   
  <div class="panel-heading">
		Nationwide Contracted FAP-funded Projects
  </div>
  <div class="panel-body">
	<table class="table table-bordered table-condensed no_margin">
		<thead>
			<tr>
				<th class="center">Rank</th>
				<th>Agency Name</th>
				<th>ABC Amount</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$x = 1;
			
			
			foreach($system->top_agency_by_abc_pop_con($year) as $row){
					$number = $x++;
					$total_abc = $row['total_abc'];
					$total_ca = $row['total_ca'];
					$org_id = $row['org_id'];
					
					$agency_row = $system->selected_agency($org_id);
		?>
		<tr>
			<td class="center"><?php echo $number; ?></td>
			<td>
				<?php echo $agency_row['org_name']; ?>
				<p><span class="">Funding Source: <?php echo $row['funding_source']; ?></p>
			</td>
			<td class="right">
				 <p>ABC Amount</p>	
				 &#8369  <?php echo number_format($row['total_abc'],2); ?>
				<p>Contract</p>
				 &#8369  <?php echo number_format($row['total_ca'],2); ?>
			</td>

		</tr>
			<?php
				$array[] = '{"year":'.$number.','.'"income":'.$total_abc.','.'"expenses":'.$total_abc.','.'"title":'.'"'.$agency_row['org_name'].'"'.'}'; 
			?>	
		<?php } ?>
		<?php
		 $row = $system->top_agency_by_abc_sum_test($year);
		 $grand_total_abc = $row['total_abc'];		
		 $grand_total_ca = $row['total_ca'];		
		 $savings = $row['total_abc'] - $row['total_ca'];		
		?>
		<!-- <tr>
			<td></td>
			<td class="right">Grand Total</td>
			<td class="right">&#8369 <?php echo number_format($row['total_abc'],2); ?></td>
			<td class="right">&#8369 <?php echo number_format($row['total_ca'],2); ?></td>
			<td class="right">&#8369 <?php echo number_format($savings,2); ?></td>
		</tr> -->
		</tbody>
		</table>
		<hr class="hr">
		<a href="ga_page.php?page=philgeps_menu" class="btn btn-success btn-block"><i class="fa fa-arrow-left"></i> Back</a>
		
			</div>
		</div>
	</div>
	
