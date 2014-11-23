<?php
	$year = $_GET['year'];
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Top 10 Agencies on Savings Generated, <?php echo $year; ?></h3>
  </div>

  <div class="panel-body">
    <div class="heading_grey">A. GOP-listed Projects </div>
		<!--graph -->
		<div id="graph"></div>	
		<!-- end graph-->
 


 <div class="panel panel-default">   
  <div class="panel-body no_padding">
	<table class="table table-bordered table-condensed no_margin">
		<thead>
			<tr>
				<th class="center">Rank</th>
				<th>Agency Name</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php
			$x = 1;
			
			
			foreach($system->top_agency_by_abc_test($year,10) as $row){
					$number = $x++;
					$total_abc = $row['total_abc'];
					$total_ca = $row['total_ca'];
					$org_id = $row['org_id'];
					
					$agency_row = $system->selected_agency($org_id);
		?>
		<tr>
			<td class="center"><?php echo $number; ?></td>
			<td><?php echo $agency_row['org_name']; ?></td>
			<td class="right">
			<p>ABC Amount</p>
			&#8369  <?php echo number_format($row['total_abc'],2); ?>
			<p>Contract Amount</p>
			&#8369  <?php echo number_format($row['total_ca'],2); ?>
			<p>Savings</p>
			&#8369  <?php echo number_format($total_abc - $total_ca,2); ?>
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
		<tr>
			<td></td>
			<td class="right">Grand Total</td>
			<td>	
				<p>ABC Total</p>
				&#8369 <?php echo number_format($row['total_abc'],2); ?>
				<p>Contract Total</p>
				&#8369 <?php echo number_format($row['total_ca'],2); ?>
				<p>Savings Total</p>
				&#8369 <?php echo number_format($savings,2); ?>
			</td>
		</tr>
		</tbody>
		</table>
		
		<hr class="hr">
		<a href="ga_page.php?page=philgeps_menu" class="btn btn-success btn-block"><i class="fa fa-arrow-left"></i> Back</a>
  </div>
</div>

	
	
	
	<?php include('top_abc_graph_script.php'); ?>
  </div>
</div>