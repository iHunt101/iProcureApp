<?php include('header.php'); ?>
  <body>
 <?php
	 $page = $_GET['page']; 
 ?>
		<div class="container">
					<?php include('banner.php'); ?>
					<div class="row">
						<div class="col-lg-12">
								<?php include($page.'.php'); ?>
						</div>
					</div>
					<?php include('footer.php'); ?>
		</div>
  </body>
<?php include('script.php'); ?>  
</html>



