<?php
	$year = $_GET['year'];
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Top Agencies with FAP-funded Contracts  Total, <?php echo $year; ?></h3>
  </div>
  <div class="panel-body">

<?php 
	
?>

 <div class="panel panel-default">   
  <div class="panel-body no_padding">
	<table class="table table-bordered table-condensed no_margin">
		<thead>
			<tr>
				<th class="center">Rank</th>
				<th>Agency Name</th>
				<th>Contract Amount</th>

			</tr>
		</thead>
		<tbody>
		<?php
			$x = 1;
			
			
			foreach($system->top_agency_by_abc_pop($year) as $row){
					$number = $x++;
					$total_abc = $row['approved_budget'];
					$total_ca = $row['contract_amt'];
					$org_id = $row['org_id'];
					
					$agency_row = $system->selected_agency($org_id);
		?>
		<tr>
			<td class="center"><?php echo $number; ?></td>
			<td>
				<p><?php echo $agency_row['org_name']; ?></p>
				<p><?php echo $row['tender_title']; ?></p>
				<p><span class="color_red">Funding&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row['funding_source']; ?></p>
				<p><span class="color_red">Contractor : <?php echo $row['awardee']; ?></p>
			</td>
			<td class="right">&#8369  <?php echo number_format($row['contract_amt'],2); ?></td>

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
		</tr> -->
		</tbody>
		</table>
		<hr class="hr">
		<a href="ga_page.php?page=philgeps_menu" class="btn btn-success btn-block"><i class="fa fa-arrow-left"></i> Back</a>
		

		
  </div>
</div>
  </div>
</div>