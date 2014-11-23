<?php 
$page = $_GET['page'];
$search = $_GET['search'];
$type = $_GET['type'];

	if($type == 'all' && $search == 'all'){ }else{ }
?>

<?php 
	$x = 1;
	$limit = 10;
	$page_no = $_GET['page_no'];
	$start = $page_no  * $limit; 			
	
	$query = $conn->query("SELECT COUNT(*) as total_count FROM gppb_lib");
	$row =  $query->fetch();
	
	$total_pages = ceil($row['total_count'] / $limit);
	$page_limit = 'LIMIT '.$start.','.$limit;
?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">GPPB Library Adcisory</h3>
  </div>
  <div class="panel-body gppb_lib_div">
  
  <div class="row">
			<div class="col-lg-6">
				<p>Number of Records( 
				<span class="badge bg_red">
				<?php if($type == 'all' && $search == 'all'){
					echo $system->gppb_lib_rowcount();
				}else if($type == 'all' && $search != 'all'){
					echo $system->search_lib_rowcount('Opinion',$search);
				}else{
					echo $system->search_lib_rowcount($type,$search);
				}
				?>
				</span>	)
				</p>
			</div>
			<div class="col-lg-6">
				
<div class="pull-right">				
<form class="form-inline" role="form" method="GET" action="s_page.php">
  <div class="form-group">
    <div class="input-group">
      <input type="hidden" name="page" value="<?php echo $page; ?>" class="form-control">
      <input type="hidden" name="type" value="<?php echo $type; ?>" class="form-control">
      <input type="text" name="search" class="form-control" placeholder="Search">
      <input type="hidden" name="page_no" value="<?php echo $page_no; ?>">
    </div>
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Submit</button>
</form>
</div>
				
				
			</div>
  </div>
 <hr class="hr"> 
<div id="searchtext">
<div class="row">
	<div class="col-lg-4">

	
  <div class="form-group">
    <label  class="col-sm-4 control-label">Page :</label>
    <div class="col-sm-6">
		<select class="form-control page_no">
			<option><?php echo $page_no; ?></option>
			<?php
				while($x <= $total_pages){
			?>
				<option><?php echo $x++; ?></option>
			<?php } ?>
		</select>
    </div>
  </div>
  
  
	

	</div>
	<script>
 	jQuery(document).ready(function(){
		jQuery(".page_no").on('change',function(e){
			e.preventDefault();
			var id = $(".page_no").val();
			window.location = 's_page.php?page=<?php echo $page; ?>&type=<?php echo $type; ?>&search=<?php echo $search; ?>&page_no='+id;
	});
	}); 
</script>
	</div>
	<div class="col-lg-4"></div>
	<div class="col-lg-4"></div>
</div>	
<hr class="hr">
		<table class="table table-bordered table-condensed">
			<thead>
			<tr>
					<th class="center">No</th>
					<th>Subject</th>
			</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				if($type == 'all' && $search == 'all'){
					$query = $system->gppb_lib_list($page_limit);
				}else if($type == 'all' && $search != 'all'){
					$query = $system->gppb_lib_search('Opinion',$search);
				}else{
					$query = $system->gppb_lib_search($type,$search);
				}
					foreach($query as $row ){ 
				
						$word = str_word_count($row['issuance']);
						
						if($word > 15){
							$issuance = substr($row['issuance'], 0, 200).'......(Read More)'; 
						}else{
							$issuance = $row['issuance'];
						}
				?>
				<tr>
					<td class="center">
						<?php if($page_no == 1){ ?>
							<?php echo $no++; ?>
						<?php }else{ ?>
							<?php echo $no++ + $start; ?>
						<?php } ?>
					</td>
					<td><?php echo $issuance; ?></td>
				</tr>
				<?php } ?>
				
			</tbody>
		</table>
</div>
  </div>
</div>