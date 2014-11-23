<?php include('header.php'); ?>
  <body>
 <?php
	$page = $_GET['page'];
 ?>
		<div class="container">
					
					<div class="row">
						<!--<div class="col-lg-3">-->
						<?php include('banner.php'); ?>
							<div class="panel panel-default no_margin">
							<div class="panel-body panel_menu">
									<!-- modal -->
									<?php include('g_bid_sked_modal.php'); ?>
									<?php include('g_top_abc_modal.php'); ?>
									<?php include('g_all_abc_modal.php'); ?>
									<?php include('g_agency_performance_modal.php'); ?>
									<!-- end modal -->
									<ul class="nav nav-pills nav-stacked sidebar_nav gp_hov">
										<li><a href="gp_page.php?page=about_p1">About Procurement </a></li>
										<li><a href="not_yet_implemented.php">The Procurement Law </a></li>
										<li><a href="not_yet_implemented.php">Procurement Process </a></li>
										<li><a href="not_yet_implemented.php">Procurement Legalities </a></li>
										<li><a href="gp_page.php?page=gp_home"> Know Agency Procurements </a></li>
										<li><a href="gp_page.php"> Find Ongoing Projects </a></li>
										<li><a href="not_yet_implemented.php"> Procurement Trivia </a></li>
										<li><a href="g_page.php?page=g_home"><i class="fa fa-arrow-left"></i> Back</a></li>
									</ul>
									<hr class="hr">
										<button class="btn btn-success type_btn">Know a Trivia</button> <font color="red"> <b><span id="typed"></b> </font> </span>
											
							</div>
							
							</div>
							
						<!--</div>-->
						<div class="col-lg-9">
							<?php include($page.'.php'); ?>
						</div>
						<?php include('footer.php'); ?>
					</div>
					
		</div>
  </body>
<?php include('script.php'); ?>  
</html>



 <?php
   $message = "In just six months, the government purchased a total of 10,100 tons of bond paper, or 2.3 tons every hour.";
   
   $text = substr($message, 0, 100);
   $text = urlencode($text);
   $file  = 'filename';
   $file = "audio/" . $file . ".mp3";
   $mp3 = file_get_contents("http://translate.google.com/translate_tts?tl=en&q=$text");
   file_put_contents($file, $mp3);
?>
  <script>
	function play(){
       var audio = document.getElementById("audio");
       audio.play();
        } 
   </script>
   
		<audio class="hidden" id="audio" controls="controls">
			<source src="<?php echo $file; ?>" type="audio/mp3" />
		</audio>
		

<script>
jQuery(document).ready(function(){
$('.type_hr').hide();
$('.p_2').hide();
jQuery(".type_btn").click(function(e){
$(this).hide();

    
        $("#typed").typed({
            strings: ["In just six months, the government purchased a total of 10,100 tons of bond paper, or 2.3 tons every hour."],
            typeSpeed: 0001,
            backDelay: 500,
            loop: false,
            // defaults to false for infinite loop
            loopCount: false,
            callback: function(){  },
            resetCallback: function() {  }
        });
			
				$('.type_hr').show();
				$('.p_2').show();
				play();
				 
			});
		});
	

    </script>	

