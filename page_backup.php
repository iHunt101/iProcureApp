<?php include('header.php'); ?>
  <body>
 <?php
	$page = $_GET['page'];
 ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 main_con">
						<?php include($page.'.php'); ?>
				</div>	
			</div>
		</div>
  </body>
<?php include('script.php'); ?>  
</html>
