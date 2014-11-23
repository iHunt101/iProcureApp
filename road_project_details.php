 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Length </label>
    <div class="col-sm-9">
		<input class="form-control" value="<?php echo $row['length']; ?>" name="length" type="text" required>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Width </label>
    <div class="col-sm-9">
		<input class="form-control" value="<?php echo $row['width']; ?>" name="width" type="text" required>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Finish </label>
    <div class="col-sm-9">
		<input class="form-control" name="finish" value="<?php echo $row['finish']; ?>" type="text" required>
    </div>
  </div>
  
        <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Pavement Thickness </label>
    <div class="col-sm-9">
		<input class="form-control" type="text" name="pavement_thickness" value="<?php echo $row['pavement_thickness']; ?>" required>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Cost / Km </label>
    <div class="col-sm-9">
		<input class="form-control" name="cost_km"  value="<?php echo $row['cost_km']; ?>" type="text" required>
    </div>
  </div>
  
    <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">status </label>
    <div class="col-sm-9">
		<input class="form-control" name="status" value="<?php echo $row['status']; ?>" type="text" required>
    </div>
  </div>
  
    <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label ">Target Due Date</label>
    <div class="col-sm-9">
		<input class="form-control date_picker" name="target_due_date" value="<?php echo $row['target_due_date']; ?>" type="text" required>
    </div>
  </div>
  
    <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label ">Extension Date </label>
    <div class="col-sm-9">
		<input class="form-control date_picker" name="extension_date" value="<?php echo $row['extension_date']; ?>" type="text" required>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label ">Actual Due Date</label>
    <div class="col-sm-9">
		<input class="form-control date_picker" name="actual_due_date" value="<?php echo $row['actual_due_date']; ?>" type="text" required>
    </div>
  </div>
  
    <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label ">Slippage</label>
    <div class="col-sm-9">
		<input class="form-control" name="slippage" type="text" value="<?php echo $row['slippage']; ?>" required>
    </div>
  </div>
  
      <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label ">Performance Rating </label>
    <div class="col-sm-9">
		<input class="form-control" name="performance_rating" value="<?php echo $row['performance_rating']; ?>" type="text" required>
		<input name="action" value="road" type="hidden" required>
    </div>
  </div>
  
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label "></label>
    <div class="col-sm-9">
		<button  type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Save</button>
    </div>
  </div>
  
  <?php 
	 $message = 'Data Successfully Save';	
	 include('message_modal.php'); 
  ?>
  					<script>
						jQuery(document).ready(function(){
								jQuery("#form").submit(function(e){
										e.preventDefault();
										var formData = jQuery("#form").serialize();
										$.ajax({
											type: "POST",
											url: "update_data.php",
											data: formData,
											success: function(html){
												$("#message").modal("show");
												/* $('.main_con').html(html); */	
												var delay = 2000;
												setTimeout(function(){ $('#message').modal("hide"); }, delay);
	
											}
										});
											return false;
								});
						});
					</script>