<?php 
	$agency_id = $_GET['agency_id'];
	$year = $_GET['year'];
	$row = $system->selected_agency($agency_id);
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Procurement Request for <?php echo $row['org_name']; ?>, <?php echo $year; ?></h3>
  </div>
  <div class="panel-body">

<?php 
	foreach($system->classification_list() as $row){
	$type = $row['classification']; 
?>

	
		<div class="heading_grey">
			 Procurement Requests for <span class="capital"><?php echo $type; ?></span>
			<!-- <div class="pull-right color_yellow bold">&#8369 <?php echo $system->agency_procurement_total($agency_id,$year,$type); ?></div> -->
		</div>
		<table class="table table-bordered table-condensed">
			<thead>			
			<tr>
				<th class="col-lg-2 center">Ref No</th>
				<th class="col-lg-8 center">Particulars</th>
				<th class="col-lg-2	center">ABC</th>
			</tr>
			</thead>
			<tbody>
			<?php
			
			foreach($system->agency_procurement($agency_id,$year,$type) as $ap_row){ ?>
				<tr>
					<td><?php echo $ap_row['ref_no']; ?></td>
					<td>
						<?php echo $ap_row['tender_title']; ?>
						<p><span class="color_red">Opening of Bids : <?php echo $ap_row['closing_date']; ?></span></p>
					</td>
					<td class="right">&#8369  <?php echo number_format($ap_row['approved_budget'],2); ?></td>
				</tr>
			<?php } ?>	
			</tbody>
		</table>
		<?php } ?>
		<hr class="hr">
		<a href="a_page.php?page=a_home" class="btn btn-success btn-block"><i class="fa fa-arrow-left"></i> Back</a>
	</div>	
</div>	