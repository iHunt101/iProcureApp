<?php include('header.php'); ?>
  <body>
 <?php
	$page = $_GET['page'];
 ?>
		<div class="container">
	
					<div class="row">
							<?php include('banner.php'); ?>
						<!--<div class="col-lg-3">-->
							<div class="panel panel-default">
							<div class="panel-body panel_menu gppb_menu">
									<!-- modal -->
									<?php include('s_bid_sked_modal.php'); ?>
									<?php include('s_bid_purpose_modal.php'); ?>
									<?php include('s_reference_number_modal.php'); ?>
									<?php include('s_track_award_modal.php'); ?>
									<?php include('s_gppb_lib_modal.php'); ?>
									<!-- end modal -->
									
			
									<ul class="nav nav-pills nav-stacked sidebar_nav sb_hov">
										<li><a style="cursor:pointer" onclick="proc('procurement_process')">Procurement Process</a></li>
										<li><a href="#s_bid_purpose" data-toggle="modal">Procurement Legalities</a></li>
										<li><a style="cursor:pointer" onclick="proc('register_philgeps')">Register with PhilGEPS</a></li>
										<li><a href="#s_track_award" data-toggle="modal">View MyAwards</a></li>
										<li><a href="bus_opp.php">Find MyOpportunities</a></li>
										<li><a href="bid_opp.php"> Find MyCompetitors</a></li>
										<li><a href="not_yet_implemented.php">Check MyBid Schedule</a></li>
										<li><a href="not_yet_implemented.php">View In-Demand Products</a></li>
										<!-- <li><a href="not_yet_implemented.php">View MyProfile</a></li> -->
										<li><a href="home.php"><i class="fa fa-arrow-left"></i> Back to Main Menu</a></li> 
										<button class="btn btn-success type_btn">Know a Trivia</button> <font color="red"> <b><span id="typed"></b> </font> </span>
										
									</ul>
									
							</div>
									<div class="panel-body panel_menu gppb_content" style="max-height:400px;overflow:hidden" hidden>
							</div>
						<!--</div>-->
						<div class="col-lg-9">
							<?php include($page.'.php'); ?>
						</div>
					</div>
					<?php include('footer.php'); ?>s
				</div>
			
  </body>
<?php include('script.php'); ?>  
</html>

<?php
   $message = "Everyday, government purchase a total of five tons of snacks for seminars and meetings alone.";
   
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
            strings: ["Everyday, government purchase a total of five tons of snacks for seminars and meetings alone."],
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



