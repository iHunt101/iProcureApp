<?php
	$year = $_GET['year'];
	$data_field = 'ABC Amount';
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Top Agencies based on ABC Total, <?php echo $year; ?></h3>
  </div>
  <div class="panel-body">
		<table class="table table-bordered table-condensed">
		<thead>
			<tr>
				<th class="center">Rank</th>
				<th>Agency Name</th>
				<th><?php echo $data_field; ?></th>
			</tr>
		</thead>
		<tbody>
		<?php
			$x = 1;
			foreach($system->all_agency_by_abc($year) as $row){
				$number = $x++;
				$total_abc = $row['total_abc'];

		?>
		<tr>
			<td class="center"><?php echo $number; ?></td>
			<td><?php echo $row['orgname']; ?></td>
			<td class="right"><?php echo number_format($row['total_abc'],2); ?></td>
		</tr>
			<?php
				$array[] = '{"year":'.$number.','.'"income":'.$total_abc.','.'"expenses":'.$total_abc.','.'"title":'.'"'.$row['orgname'].'"'.'}'; 
			?>	
		<?php } ?>
		<?php
		 $row = $system->top_agency_by_abc_sum($year,10);
		 $grand_total = $row['total_abc'];		
		?>
		<tr>
			<td></td>
			<td class="right">Grand Total</td>
			<td class="right"><?php echo number_format($row['total_abc'],2); ?></td>
		</tr>
		</tbody>
		</table>
		



	
  </div>
</div>