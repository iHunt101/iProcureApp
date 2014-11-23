<?php 
	$agency_id = $_GET['agency_id'];
	$year = $_GET['year'];
	$row = $system->selected_agency($agency_id);
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Procurement Awards for <?php echo $row['org_name']; ?>, <?php echo $year; ?></h3>
  </div>
  <div class="panel-body">
		<!-- award  -->
		
		<?php 
				foreach($system->classification_list() as $row){
				$type = $row['classification']; 
		?>
		<div class="heading_grey">
			Procurement Awards for <span class="capital"><?php echo $type; ?></span>
			<!-- <div class="pull-right color_yellow bold">&#8369 <?php /* echo $system->agency_procurement_total_award($agency_id,$year,$type); */ ?></div> -->
		</div>
		<table class="table table-bordered table-condensed">
			<thead>			
				<tr>
					<th class="col-lg-2 center">Awardee</th>
					<th class="col-lg-10 center">Particulars</th>

				</tr>
			</thead>
			<tbody>
					<?php
						foreach($system->agency_procurement_award($agency_id,$year,$type) as $ap_row){ 
					?>
						<tr>
							<td><?php echo $ap_row['awardee']; ?></td>
							<td>
								<?php echo $ap_row['tender_title']; ?>
								<p><span class="color_red">Contract Amount : &#8369 <?php echo number_format($ap_row['contract_amt'],2); ?></span></p>
								<p><span class="color_red">Date of Award  : <?php echo $ap_row['closing_date']; ?></span></p>
								<p><span class="color_red">End of Contract: <?php echo $ap_row['contract_enddate']; ?></span></p>
							</td>
						</tr>
					<?php } ?>	
			</tbody>
		</table>
		<?php } ?>
  
  
  
		<hr class="hr">
		<a href="a_page.php?page=a_home" class="btn btn-success btn-block"><i class="fa fa-arrow-left"></i> Back</a>
	</div>	
</div>	