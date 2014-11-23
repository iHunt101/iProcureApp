<?php include('header.php'); ?>
  <body>
 <?php
	$page = $_GET['page'];
 ?>
		<div class="container">
					<div class="row">
						<div class="col-lg-3">
							<div class="panel panel-default">
							<div class="panel-body panel_menu">
									<!-- modal -->

										<?php include('p_view_annual_national_modal.php'); ?>
										<?php include('p_procurement_mode_modal.php'); ?>
									<!-- end modal -->

									<ul class="nav nav-pills nav-stacked sidebar_nav">
										<li><a href="#annual_national" data-toggle="modal">Set Location Map </a></li>
										<li><a href="#procurement_mode" data-toggle="modal">Select Procuring Entity</a></li>
										<li><a href="page.php?page=home"><i class="fa fa-arrow-left"></i> Back to Main Menu</a></li>
									</ul>
									
							</div>
							
							</div>
						</div>
						<div class="col-lg-9">
							<?php include($page.'.php'); ?>
						</div>
					</div>
		</div>
  </body>
<?php include('script.php'); ?>  
</html>



