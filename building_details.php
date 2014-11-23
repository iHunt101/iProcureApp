 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">No. of Storey </label>
    <div class="col-sm-9">
		<input class="form-control" type="text" name="no_of_storey" value="<?php echo $row['no_of_storey']; ?>" required>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Floor Area </label>
    <div class="col-sm-9">
		<input class="form-control" type="text" name="floor_area" value="<?php echo $row['floor_area']; ?>" required>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Type of Foundation </label>
    <div class="col-sm-9">
		<input class="form-control" type="text"  name="type_of_foundation" value="<?php echo $row['type_of_foundation']; ?>" required>
    </div>
  </div>
  
    <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Finish </label>
    <div class="col-sm-9">
		<input class="form-control" type="text" name="finish" value="<?php echo $row['finish']; ?>" required>
    </div>
  </div>
  

  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Cost per Sq.m </label>
    <div class="col-sm-9">
		<input class="form-control" type="text" name="cost_per_sq_m" value="<?php echo $row['cost_per_sq_m']; ?>" required>
    </div>
  </div>
  
    <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Status </label>
    <div class="col-sm-9">
		<input class="form-control" type="text" name="status" value="<?php echo $row['status']; ?>" required>
    </div>
  </div>
  
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label ">Target Due Date</label>
    <div class="col-sm-9">
		<input class="form-control date_picker" name="target_due_date" value="<?php echo $row['target_due_date']; ?>" type="text" type="text" required>
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
		<input class="form-control date_picker" name="actual_due_date" value="<?php echo $row['actual_due_date']; ?>"  type="text" required>
    </div>
  </div>
  
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label ">Slippage</label>
    <div class="col-sm-9">
		<input class="form-control" type="text" name="slippage" value="<?php echo $row['slippage']; ?>" required>
    </div>
  </div>
  
     <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label ">Performance Rating</label>
    <div class="col-sm-9">
		<input class="form-control" type="text" name="performance_rating" value="<?php echo $row['performance_rating']; ?>" required>
		<input name="action" value="building" type="hidden" required>
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
  