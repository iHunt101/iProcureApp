<div class="modal fade" id="s_gppb_lib" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Search GPPB Library</h4>
      </div>
      <div class="modal-body">
				<form role="form" method="POST">
					<div class="form-group">
						<label>Search Keyword</label>
						<input type="text" name="search" class="form-control" required>
					</div>

					<button type="submit" name="memo" class="btn btn-success"><i class="fa fa-search"></i> Search GPPB Memo</button>
					<button type="submit" name="opinion" class="btn btn-success"><i class="fa fa-search"></i> Search GPPB Opinion</button>
					<hr>
					<a href="s_page.php?page=s_gppb_lib&type=all&search=all&page_no=1" class="btn btn-success"><i class="fa fa-search"></i> View All Records</a>
				</form>
				
				<?php 
					if(isset($_POST['memo'])){
						$search = $_POST['search'];
						$type = 'Memo';
						$url = 's_page.php?page=s_gppb_lib'.'&type='.$type.'&search='.$search;
				?>
					<script>window.location = '<?php echo $url; ?>'; </script>
				<?php } ?>
				
				<?php 
					if(isset($_POST['opinion'])){
						$search = $_POST['search'];
						$type = 'Opinion';
						$url = 's_page.php?page=s_gppb_lib'.'&type='.$type.'&search='.$search;
				?>
					<script>window.location = '<?php echo $url; ?>'; </script>
				<?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>