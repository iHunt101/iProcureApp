<?php 
	$agency_id = $_GET['agency_id'];
	$year = $_GET['year'];
	$row = $system->selected_agency($agency_id);
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Procurement Report for <?php echo $row['org_name']; ?>, <?php echo $year; ?></h3>
  </div>
  <div class="panel-body">
		<div class="heading_grey">General Summary</div>
		<table class="table table-bordered table-condensed">
			<thead>
				<tr>
					<th class="col-lg-4"></th>
					<th class="col-lg-4 center">Request</th>
					<th class="col-lg-4 center">Award</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$total_abc = 0;
				$total_ca = 0;
				foreach($system->classification_list() as $row){
				$type = $row['classification']; 
				$row1 = $system->agency_procurement_total($agency_id,$year,$type);
				$total_abc += $row1['total_abc'];
				$total_ca += $row1['total_ca'];
			?>	
				<tr>
					<td><?php echo $type; ?></td>
					<td class="right">&#8369 <?php echo number_format($row1['total_abc'],2);  ?></td>
					<td class="right">&#8369 <?php echo number_format($row1['total_ca'],2); ?></td>
				</tr>
				
			<?php } ?>

				<tr>
					<td></td>
					<td class="right">&#8369 <?php echo number_format($total_abc,2); ?></td>
					<td class="right">&#8369 <?php echo number_format($total_ca,2); ?></td>
				</tr>
			</tbody>
		</table>
		<hr class="hr">
		<a href="gp_page.php?page=gp_home" class="btn btn-success btn-block"><i class="fa fa-arrow-left"></i> Back</a>
  </div>
</div>


		