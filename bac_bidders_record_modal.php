<div class="modal fade" id="bac_bidders_record" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">View Bid Purpose</h4>
      </div>
      <div class="modal-body">
<script>
jQuery(document).ready(function($){
    $('#modal_form .add-box').click(function(){
        var n = $('.text_box_con').length + 1;
        var box_html_test = $('<div class="row text_box_con"><div class="col-xs-9"><input class="form-control" type="text" name="business_name[]"/></div></div>');
        box_html_test.hide();
        $('#modal_form .text_box_con:last').after(box_html_test);
        box_html_test.fadeIn('slow');
        return false;
    });
});
</script>			
			
				<form id="modal_form" role="form" method="POST">
					<div class="form-group">
							<label class="report_label">Business Name</label>
							<input type="hidden" name="page" value="bac_bidders_record">
							<div class="row text_box_con">
								<div class="col-xs-9">
									<input type="text" name="business_name[]" class="form-control" required>
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
					<button name="submit" type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
				</form>
				
					<?php 
						if(isset($_POST['submit'])){
							$year = $_POST['year'];
							$business_name = implode(",",$_POST['business_name']);
							$url = '?page=bac_bidders_record&year='.$year.'&business_name='.$business_name;
					?>		
						<script> window.location = 'bac_page.php<?php echo $url; ?>'; </script>
					<?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>