<div class="modal fade" id="s_reference_number" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Track Reference Number</h4>
      </div>
      <div class="modal-body">
		<script>
jQuery(document).ready(function($){
    $('#reference_form .add-box').click(function(){
        var n = $('.text_box_con').length + 1;
        var box_html_test = $('<div class="row text_box_con"><div class="col-xs-9"><input class="form-control" type="text" name="number[]"/></div></div>');
        box_html_test.hide();
        $('#reference_form .text_box_con:last').after(box_html_test);
        box_html_test.fadeIn('slow');
        return false;
    });
});
</script>	
			
				<form id="reference_form" role="form" method="GET" action="s_page.php">
					<div class="form-group">
						<label>Reference Number</label>
							<div class="row text_box_con">
								<div class="col-xs-9">
									<input type="text" name="number[]" class="form-control" required>
								</div>
								<div class="col-xs-3">
										<center><a class="add-box btn btn-primary btn-block" href="#"><i class="fa fa-plus"></i> Add </a></center>
								</div>
							</div> 
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