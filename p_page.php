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
							<div class="panel-body panel_menu">
									<!-- modal -->

										<?php include('p_view_annual_national_modal.php'); ?>
										<?php include('p_procurement_mode_modal.php'); ?>
									<!-- end modal -->

									<ul class="nav nav-pills nav-stacked sidebar_nav pm_hov">
										<li><a href="not_yet_implemented.php">Data Mine For Policy Issues</a></li>
										<li><a href="not_yet_implemented.php">Data Mine For Performance Analysis</a></li>
										<li><a href="home.php"><i class="fa fa-arrow-left"></i> Back to Main Menu</a></li>

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
   $message = "In one year, if the bond purchased by the government is placed end-to-end, it will reach Batanes to Jolo and vice versa 5,000 times.";
   
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
            strings: ["In one year, if the bond purchased by the government is placed end-to-end, it will reach Batanes to Jolo and vice versa 5,000 times."],
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

