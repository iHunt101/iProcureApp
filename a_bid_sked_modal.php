<div class="modal fade" id="a_bid_sked" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">View Agency Stats <i class="fa fa-calendar"></i></h4>
      </div>
      <div class="modal-body">
			
			
				<form role="form" method="GET" action="a_page.php">
					<div class="form-group">
						<label>Agency</label>
							<input type="hidden" name="page" value="bid_calendar">
						<select name="agency_id" class="form-control" required>
								<option></option>
							<?php foreach($system->agency_list() as $row){ ?>		
								<option value="<?php echo $row['org_id']; ?>"><?php echo $row['org_name']; ?></option>
							<?php } ?>
						</select>
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