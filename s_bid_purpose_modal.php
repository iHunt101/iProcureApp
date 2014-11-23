<div class="modal fade" id="s_bid_purpose" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">View Bid Purpose</h4>
      </div>
      <div class="modal-body">
		
			
				<form id="bid_purpose_form" role="form" method="GET" action="s_page.php">
					<div class="form-group">
							<label class="report_label">Bid Purpose</label>
							<input type="hidden" name="page" class="form-control" value="s_bid_purpose" required>
							<input type="text" name="search" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Year</label>
						<select name="year" class="form-control" required>
							<?php foreach($system->year_list() as $row){ ?>		
								<option><?php echo $row['year']; ?></option>
							<?php } ?>
						</select>
					</div>
					<button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
				</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>