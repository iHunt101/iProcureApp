<?php 
	$agency_id = $_GET['agency_id'];
	$year = $_GET['year'];
	$row = $system->selected_agency($agency_id);
?>
	<script>
			jQuery(document).ready(function(){
					$('#messsage').modal('hide'); 
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('body').removeAttr('style');
			})		
	</script>				
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $row['org_name']; ?>, <?php echo $year; ?></h3>
  </div>
  <div class="panel-body">
    <div class="heading_grey">Ref ID</div>
	<div class="row">
		<div class="col-lg-3">
			<select class="form-control id" multiple size="8">
				<?php foreach($system->agency_infra_projects($year,$agency_id) as $row){ ?>
					<option value="<?php echo $row['ref_id']; ?>"><?php echo $row['ref_no']; ?></option>
				<?php } ?>
			</select>
		</div>
<script>
 	jQuery(document).ready(function(){
		jQuery(".id").on('change',function(e){
			e.preventDefault();
			var id = $(".id").val();
				$.ajax({
					type: "POST",
					url: "deliv_info.php",
					data: {id: id},
					success: function(html){
							$(".deliv_info").html(html);
					}
				});
			
				return false;
	});
	}); 
</script>		
<script>
 	jQuery(document).ready(function(){	
 		$(".id option:nth-child(1)").attr("selected", true); 	
		$(".id option:nth-child(1)").change();		
	});
</script>
		<div class="col-lg-9 deliv_info"></div>
		
	</div>
  </div>
</div>