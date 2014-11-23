<?php include('header.php'); ?>
  <body>
 <?php
	$page = $_GET['page'];
 ?>
		<div class="container">
					<div class="row">
						<div class="col-lg-12 main_con">
							<!-- <img src="images/header.jpg" class="img-responsive header_banner img-thumbnail"> -->
							<?php include($page.'.php'); ?>
							<!-- <img src="images/footer.jpg" class="img-responsive footer_banner img-thumbnail"> -->							
						</div>
					</div>
		</div>
  </body>
<?php include('script.php'); ?>  
</html>



