<?php 
include('dbcon.php');
include('class.php');

 $id = implode('',$_POST['id']);
$row = $system->selected_bid_info($id);
/* echo $row['width']; */
?>

<form class="form-horizontal" id="form" role="form">
  <div class="form-group">
    <label  class="col-sm-3 control-label">Project</label>
    <div class="col-sm-9">
		<?php echo $row['bid_title']; ?>
		<input type="hidden" name="ref_id" value="<?php echo $id; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">ABC</label>
    <div class="col-sm-9">
		&#8369 <?php echo number_format($row['approved_budget'],2); ?>
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Winning Bidder</label>
    <div class="col-sm-9"><?php echo $row['awardee']; ?></div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Contract Cost</label>
    <div class="col-sm-9">
		&#8369 <?php echo number_format($row['budget'],2); ?>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Duration </label>
    <div class="col-sm-9">
      <?php echo $row['contract_duration']; ?> 
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Project Type </label>
		<div class="col-sm-9">
			<select class="form-control project_type" name="project_type" required>
				<option><?php echo $row['project_type']; ?></option>
				<?php
					foreach($system->project_type_list() as $pt_row){
				?>
					<option><?php echo $pt_row['project_type']; ?></option>
				<?php } ?>
			</select>
		</div>
    </div>
	
<script>
 	jQuery(document).ready(function(){
		jQuery(".project_type").on('change',function(e){
			e.preventDefault();
			var id = $(".project_type").val();
				$.ajax({
					type: "POST",
					url: "project_type.php?id=<?php echo $id; ?>",
					data: {id: id},
					success: function(html){
							$(".project_type_div").html(html);
					}
				});
			
				return false;
	});
	}); 
</script>
<script>
 	jQuery(document).ready(function(){	
 		$(".project_type option:nth-child(1)").attr("selected", true); 	
		$(".project_type option:nth-child(1)").change();		
	});
</script>
	<div class="project_type_div"></div>
	<hr class="hr">
	<a href="a_page.php?page=a_home" class="btn btn-success btn-block"><i class="fa fa-arrow-left"></i> Back</a>
  </div>
</form>



